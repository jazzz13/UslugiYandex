var urlProxy = "./uy-proxy2.php";

var targetDiv, requestButton, fieldsWithValid;

var creditDivForFullData;

var templates = {};

var currentDataRequest = {};

var targetsDesc = {
	ANY : "на любые цели",
	EDUCATION : "на образование",
	GOODS : "на товары",
	TRAVEL : "на путешествие",
	TREATMENT : "на лечение",
	PERSONAL_SUBSIDIARY_PLOT : "на ведение подсобного хозяйства",
	MORTGAGE_FIRST_PAYMENT : "на первый взнос по ипотеке",
	OTHER : "другая, в частности не упомянутая цель или список целей"
};

function start(){
	initElements();
	initTemplates();
	initEvents();
}

function initElements(){
	targetDiv = $("#uy-result");
	requestButton = $("#uy-request-button");
	fieldsWithValid = $("input[valid]");
}

function initTemplates(){

	var rootElement = $("#uy-templates");

	templates.resultSmalInfo = rootElement.find("#uy-template-result-small-info").html();
	templates.resultFullInfo = rootElement.find("#uy-template-result-full-info").html();
}

function initEvents(){
	requestButton.click(initRequest);
	fieldsWithValid.change(verification);
}

function initRequest(){

	if(verification()){
		showLoading();
		requestWithData( buildParams() );
	}

	function showLoading(){
		targetDiv.html("..получение данных..");
	}	
}

function verification(){
	var valid = true;

	fieldsWithValid.each(function(i, item){

		var item = $(item);
		var regExp = new RegExp(item.attr("valid"));
		var value = item.val().trim();

		if(value){

			if(regExp.test(value)){
				item.removeClass("uy-unvalid");
			} else {
				item.addClass("uy-unvalid");
				valid = false;
			}
		}
	});

	return valid;
}


function buildParams(){

	var data = {
		region: "Москва",
		currency: "RUB",
		sum: "100",
		period: "year",
		creditTypeId : creditTypeId,
		limit: "50"
	};

	buildOfTextFailds();
	
	parseIntData();

	buildOfSelectList();

	buildOfRadio();

	buildOfCheckBoxs();

	postProcessing();


	function buildOfTextFailds(){

		var names = ["sum", "period", "region", "min-initial-instalment"];

		$.each(names, function(i, item){

			var textField = $("input[name="+item+"]");

			if(textField.length){
				var value = textField.val().trim();

				if(value){
					data[item] = value;
				}
			}
		});
	}

	function parseIntData(){
		
		var names = ["sum", "period", "min-initial-instalment"];

		$.each(names, function(i, item){

			var value = data[item];

			if(value){
				data[item] = parseInt( value.replace(/ /g, "") );
			}
		});
	}

	function buildOfSelectList(){

		var names = ["bank", "purpose", "advanced-repayment", "dwelling", "period-type"];

		$.each(names, function(i, item){

			var select = $("select[name="+item+"]");

			if(select.length){
				var value = select.val().trim();

				if(value && value!="0"){
					data[item] = value;
				}
			}
		});
	}

	function buildOfRadio(){

		var names = ["proof-of-income", "dwelling-readiness", "vendor-type", "age-type"];

		$.each(names, function(i, item){
			
			var radios = $("input[type=radio][name="+item+"]");

			radios.each(function(j, radio){

				if(radio.checked){
					var value = radio.value;

					if(value && value!="0"){
						data[item] = value;
					}
				}
			});
		});
	}

	function buildOfCheckBoxs(){

		var checkBoxs = $("#uy-form input[type=checkbox]");

		checkBoxs.each(function(i, checkbox){
			
			if(checkbox.checked){
				if(checkbox.name){
					data[checkbox.name] = "true";
				}
			}
		});
	}

	function postProcessing(){

		var value = data["period"];
		var periodType = data["period-type"];

		if(value && periodType){

			if(periodType == "years"){
				value = parseInt(value) * 12;
			}

			data["period"] = value +" months";
		}

		if(!data.period) data.period = "year";
	}

	return data;
}

function requestWithData(data){

	currentDataRequest = data;
	console.log("request:", data);

	$.ajax(urlProxy, {
		dataType: "xml",
		data: data,
		error: function(object){
			console.log(object.responseText);
		},
		success: function(xml){

			posteCredits( getChildrenInXMLByCreditType(xml) );
		} 
	}); 
}

function getChildrenInXMLByCreditType(xml){

	if(isMortgage()){
		return $(xml).find("mortgage");
	} else if(isAutoCredit()){
		return $(xml).find("autocredit");
	} else {
		return $(xml).find("credit");
	}	
}

function isCommonCredit(){
	return creditTypeId == 0;
}

function isMortgage(){
	return creditTypeId == 1;
}

function isAutoCredit(){
	return creditTypeId == 2;
}

function posteCredits(credits){


	targetDiv.empty();

	credits.each(function(i, credit){

		var credit = $(credit);
		var data = {};
		var html = templates.resultSmalInfo;

		data = parseDataFromXml(credit);

		var dataForTmpl = processingData(data);

		targetDiv.append( fillTemplate(html, dataForTmpl) );

		$.data( targetDiv.find(".uy-credit:last-child")[0], "data", data);
	});
	
	if(isCommonCredit()){
		targetDiv.find(".uy-field-firstPay").remove();
	
	} else {
		targetDiv.find(".uy-field-purpose").remove();
	}

	targetDiv.find("a").click(initRequestFullData);
}

function parseDataFromXml(credit){

	var data = {};

	data.id = credit.find("id:eq(0)").text();
	data.name = credit.find("name:eq(0)").text();
	data.bank = credit.find("bank name:eq(0)").text();
	data.link = credit.find("link:eq(0)").attr("href");
	data.purpose = targetsDesc[credit.find("purpose:eq(0)").text()];
	data.restrictions = credit.find("restrictions:eq(0)").text();
	
	data.rate = ( credit.find("rate min-value:eq(0)").length 
		? credit.find("rate min-value:eq(0)").text()
		: credit.find("rate max-value:eq(0)").text() );
	
	data.rate = floatToPercent( data.rate );

	data.firstPay = parseInt( credit.find("min-initial-instalment:eq(0)").text() );
	if(!data.firstPay)
		data.firstPay = 0;

	data.monthPay = monthPayByParams( currentDataRequest.sum, data.rate, currentDataRequest.period );

	data.overPay = ( parseInt( currentDataRequest.period ) * data.monthPay ) - parseInt(currentDataRequest.sum);

	return data;
}

function floatToPercent(f){
	if(parseFloat(f) < 1){
		f = parseFloat(f)*100;
	} 
	return parseFloat( f ).toFixed(1);;
}

function processingData(data){

	data.restrictions = (data.restrictions.trim() ? "есть" : "нет" );
	//data.rate = data.rate + "%"
	data.firstPay = data.firstPay + "%";

	return data;
}

function monthPayByParams(sum, rate, months) {

	var sum = parseInt(sum);
	var rate = parseFloat(rate)/(12*100);
	var months = (months=="year" ? 12 : parseInt(months) );

	var result = parseInt( sum * rate/(1 - Math.pow((1/(1+rate)), months) )  );

	return result;
}

function fillTemplate(tmpl, data){
	
	var result = tmpl;

	$.each(data, function(name, value){

		result = result.replace("$"+name, value);
	});	

	return result;
}

function initRequestFullData(event){
	event.preventDefault();

	requestCredit(this.href);

	creditDivForFullData = $(this).parents("div[credit-id]:eq(0)");
	var smallInfoTable = creditDivForFullData.find(".uy-credit-table:eq(0)");
	var fullInfoDiv = creditDivForFullData.find(".uy-credit-full-info:eq(0)");

	smallInfoTable.hide();
	fullInfoDiv.show();
}

function requestCredit(url){

	console.log(url);

	$.ajax(urlProxy, {
		dataType: "xml",
		data: {
			creditFullInfo: url
		},
		error: function(object){
			console.log(object.responseText);
		},
		success: function(xml){
			postFullCreditInfo( getChildrenInXMLByCreditType(xml) );	
		} 
	}); 
}

function postFullCreditInfo( credit ){

	console.log(credit[0]);

	var smallInfoTable = creditDivForFullData.find(".uy-credit-table:eq(0)");
	var fullInfoDiv = creditDivForFullData.find(".uy-credit-full-info:eq(0)");

	var data = parseFullXmlFromData(credit);
	
	var html = templates.resultFullInfo;

	data = processingData(data);

	html = fillTemplate(html, data);

	fullInfoDiv.empty().html( html );

	fullInfoDiv.find("a.uy-full-info-close").click(function(e){
		e.preventDefault();
		fullInfoDiv.slideUp(function(){
			smallInfoTable.show();
		});
	});	
}

function parseFullXmlFromData(credit){

	var data = parseDataFromXml(credit);
	var rate = getCurRate();

	data.minRate = floatToPercent( rate.find("min-value").text() );
	if(!data.minRate)
		data.minRate = 0;

	data.maxRate = floatToPercent( rate.find("max-value").text() );
	if(!data.maxRate)
		data.maxRate = Infinity;

	data.minSum = parseInt( rate.find("min-sum").text() );
	if(!data.minSum)
		data.minSum = 0;

	data.maxSum = parseInt( rate.find("max-sum").text() );
	if(!data.maxSum)
		data.maxSum = Infinity;

	return data;

	function getCurRate(){

		var smallData = $.data(creditDivForFullData[0], "data");
		var currencys = credit.find("rate currency:contains(RUB)");

		var rate;

		currencys.each(function(i, currency){

			rate = $(currency).parent();
			var regExp = new RegExp( parseInt(smallData.rate) + "" );

			if( regExp.test( rate.find("min-value").text() ) || regExp.test( rate.find("max-value").text() ) ) {

				return false;
			}
			
		});

		return rate;
	}
}

start();














