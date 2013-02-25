var urlProxy = "./uy-proxy2.php";

var targetDiv, requestButton, fieldsWithValid;

var resultTmpl = [
	"<div class='uy-credit' credit-id='$id'>",
		"<div class='uy-credit-name'>",
			"<a href='$link'>",
				"$name",
			"</a>",
		"</div>",
		"<div class='uy-credit-bank'>",
			"Банк: $bank",
		"</div>",
		"<table class='uy-credit-table'>",
			"<tr class='uy-credit-table-tr-first'>",
				"<td>Цель кредита",
				"</td>",
				"<td>Обеспечение",
				"</td>",
				"<td>Процентная ставка",
				"</td>",
				"<td>Первый взнос",
				"</td>",
				"<td>Ежемесячный платеж",
				"</td>",
				"<td>Переплата",
				"</td>",
			"</tr>",
			"<tr class='uy-credit-table-tr-second'>",
				"<td>$purpose",
				"</td>",
				"<td>$restrictions",
				"</td>",
				"<td>$rate",
				"</td>",
				"<td>$firstPay",
				"</td>",
				"<td>Ежемесячный платеж",
				"</td>",
				"<td>Переплата",
				"</td>",
			"</tr>",
		"</table>",
	"</div>"].join("");

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
	initEvents();
}

function initElements(){
	targetDiv = $("#uy-result");
	requestButton = $("#uy-request-button");
	fieldsWithValid = $("input[valid]");
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

function showLoading(){
	targetDiv.html("..получение данных..");
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
			data["period"] = value +" "+ periodType;
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

	if(creditTypeId==1){
		return $(xml).find("mortgage");
	} else if(creditTypeId==2){
		return $(xml).find("autocredit");
	} else {
		return $(xml).find("credit");
	}	
}

function posteCredits(credits){


	targetDiv.empty();

	credits.each(function(i, credit){

		var credit = $(credit);
		var data = {};
		var html = resultTmpl;

		data.id = credit.find("id:eq(0)").text();
		data.name = credit.find("name:eq(0)").text();
		data.bank = credit.find("bank name:eq(0)").text();
		data.link = credit.find("link:eq(0)").attr("href");
		data.purpose = targetsDesc[credit.find("purpose:eq(0)").text()];
		data.restrictions = (credit.find("restrictions:eq(0)").text() 
			? "есть" 
			: "нет" );
		
		data.rate = ( credit.find("rate min-value:eq(0)").length 
			? credit.find("rate min-value:eq(0)").text()
			: credit.find("rate max-value:eq(0)").text );
		
		if(parseFloat(data.rate) < 1){
			data.rate = parseFloat(data.rate)*100;
		} 

		data.rate = parseInt( data.rate );

		data.firstPay =  parseInt(data.rate)*currentDataRequest.sum/100;


		$.each(data, function(name, value){

			html = html.replace("$"+name, value);
		});

		targetDiv.append( html );
	});

	targetDiv.find("a").click(creditLinkClick);

	function creditLinkClick(event){
		event.preventDefault();

		requestCredit(this.href);

		var creditDiv = $(this).parents("div[credit-id]:eq(0)");
	}
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
	var id = credit.find("id:eq(0)").text();
	var creditDiv = targetDiv.find("div[credit-id="+id+"]");

	var data = {};

	creditDiv.append("<div> lol </div>");

}

start();












