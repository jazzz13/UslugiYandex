(function(){

var targetDiv, requestButton, fieldsWithValid, mainDiv;

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

var paymentSchemeDesc = {
	"ANNUITY" : "аннуитетные платежи, равными долями",
	"DIFFERENTIAL" : "дифференцированные платежи",
	"CLIENT_CHOICE" : "аннуитетные или дифференцированные платежи по выбору клиента"
};

var advancedRepaymentDesc = {
	"ONE_PAYMENT_WHOLE_SUM" : "можно погасить только полностью одним платежом",
	"ONLY_PARTIAL" : "можно погасить только часть суммы",
	"PARTIAL_AND_WHOLE" : "можно погашать и целиком, и частями",
	"NO" : "досрочного погашения нет"
};

var proofIncomeDesc = {
	"NDFL2": "НДФЛ-2",
	"NDFL3": "НДФЛ-3",
	"NDFL4": "НДФЛ-4",
	"FREE_FORM_REFERENCE": "справка в свободной форме",
	"PENSION_FUND_REFERENCE": "справка из пенсионного фонда",
	"BANK_FORM_REFERENCE": "справка по форме банка",
	"PROOF_ADDITIONAL_REVENUE": "документальное подтверждение дополнительного дохода"
};

var otherProofIncomeDesc = {
	"APPLICATION_FORM" : "заявление-анкета",
	"PASSPORT": "паспорт",
	"PASSPORT_ALL_PAGES_COPY": "копия всех страниц паспорта",
	"MILITARY_ID": "военный билет",
	"CERTIFIED_COPY_OF_WORK_RECORD": "заверенная копия трудовой книжки",
	"MARRIAGE_CERTIFICATE": "свидетельство о браке (разводе, смерти супруга), брачный контракт (при наличии)",
	"SPOUSE_PASSPORT": "паспорт супруги(га) (для заемщиков, состоящих в браке)",
	"INN": "ИНН",
	"PENSION_INSURANCE_CERTIFICATE": "страховое свидетельство государственного пенсионного страхования",
	"INTERNATIONAL_PASSPORT": "загранпаспорт",
	"DRIVING_LICENSE": "водительское удостоверение",
	"TEMPORARY_REGISTRATION_CERTIFICATE_COPY": "копия свидетельства о временной регистрации (если применимо)",
	"ACADEMIC_CREDENTIALS": "дипломы об образовании",
	"ASSET_OWNERSHIP_DOCUMENTS": "документы о собственности на активы",
	"CHILDREN_DOCUMENTS": "свидетельства о рождении/паспорта несовершеннолетних детей",
	"CREDIT_HISTORY_DOCUMENTS": "документы, подтверждающие кредитную историю",
	"PLEDGE_DOCUMENTS": "документы по предоставляемому залогу",
	"DETOXIFICATION_CENTER_CERTIFICATE": "правка из наркологического центра заемщика (созаемщика)",
	"PSYCHONEUROLOGICAL_CENTER_CERTIFICATE": "справка из психоневрологического диспансера заемщика (созаемщика)",
	"SIC": "СИК (социальный индивидуальный код)",
	"PNN": "РНН (регистрационный номер налогоплательщика)",
	"REG_BOOK_OR_ADDR_BUREAU_SPRAVKA": "книга регистрации граждан либо справка из адресного бюро",
	"OTHER_DOCUMENTS": "другие документы"
};

var guaranteeNeedDesc = {
	"NOT_REQUIRED" : "не требуется",
	"OBLIGATORY" : "обязательно",
	"OPTIONAL" : "возможно",
	"REQUIRED_IF_COUNTERPART_IS_ABSENT" : "требуется при отсутствии залога"
};

var pledgeNeedDesc = {
	"NOT_REQUIRED" : "не требуется",
	"OBLIGATORY" : "обязательно",
	"OPTIONAL" : "возможно",
	"REQUIRED_IF_COUNTERPART_IS_ABSENT" : "требуется"
};

var registrationDesc = {
	"NOT_REQUIRED" : "не требуется",
	"INTERIM" : "временная",
	"INTERIM_REGION" : "временная в регионе обращения",
	"PERMANENT" : "постоянная",
	"PERMANENT_REGION" : "постоянная в регионе обращения"
};

var applicationPendencyDesc = {
	"SAME_DAY" : "день в день",
	"LESS_2_DAYS" : "до 2-х дней",
	"LESS_3_DAYS" : "до 3-х дней",
	"LESS_WEEK" : "до недели",
	"MORE_WEEK" : "больше недели"
};

var paymentMethodsDesc = {
	"EPS" : "электронные платежные системы",
	"ATM" : "банкоматы",
	"CLEARING_BASIS_PAYMENT" : "безналичный платеж/перевод",
	"BANK_OFFICE" : "кассы банка",
	"RUSSIAN_POST" : "отделения ФГУП «Почта России»",
	"ACCOUNTING_DPT" : "бухгалтерия по месту работы",
	"PAYMENT_TERMINAL" : "платежные терминалы"
};

function start(){
	initElements();
	initTemplates();
	initEvents();
}

function initElements(){

	mainDiv = $("#uslugi-yandex");
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
}

function showLoading(){
	
	targetDiv = $("<div id='uy-result'> ..получение данных.. </div>");
	mainDiv.append(targetDiv);
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

		var names = ["sum", "period", "min-initial-instalment"];

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

		var names = ["bank", "purpose", "advanced-repayment", "dwelling", "period-type", "region"];

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

	$.ajax(uyUrlProxy, {
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

	if(credits.length==0){

		targetDiv.html( uyHtmlNotResult );
		return;
	} else {
		
		targetDiv.html( uyHtmlHeadResult );
	}

	var credits = sortCredits(credits);

	credits = deleteRepeats(credits);

	credits.each(function(i, credit){

		var credit = $(credit);
		var data = {};
		var html = templates.resultSmalInfo;

		data = parseDataFromXml(credit);

		var dataForTmpl = processingData(data);

		targetDiv.append( fillTemplate(html, dataForTmpl) );

		$.data( targetDiv.find(".uy-credit:last-child")[0], "data", data);
	});

	clearTrash(targetDiv);

	targetDiv.find(".uy-credit-name a").click(initRequestFullData);
}

function clearTrash(targetDiv){

	if(isCommonCredit()){
		targetDiv.find(".uy-field-firstPay").remove();
	
	} else {
		targetDiv.find(".uy-field-purpose").remove();
	}
}

function parseDataFromXml(credit){

	var data = {};

	data.id = credit.find("id:eq(0)").text().trim();
	data.name = credit.find("name:eq(0)").text();
	data.bank = credit.find("bank name:eq(0)").text();
	data.idBank = credit.find("bank id:eq(0)").text().trim();
	data.link = credit.find("link[rel=self]:eq(0)").attr("href");

	data.purpose = targetsDesc[credit.find("purpose:eq(0)").text()];
	if(!data.purpose)
		data.purpose = "";

	data.restrictions = credit.find("restrictions:eq(0)").text();
	
	data.minRate = floatToPercent( credit.find("rate min-value:eq(0)").text() );

	data.maxRate = floatToPercent( credit.find("rate max-value:eq(0)").text() );

	data.rate = data.minRate ? data.minRate : data.maxRate;

	data.firstPay = parseInt( credit.find("min-initial-instalment:eq(0)").text() );
	if(!data.firstPay)
		data.firstPay = 0;

	data.monthPay = monthPayByParams( currentDataRequest.sum, data.rate, currentDataRequest.period );

	data.overPay = ( parseInt( currentDataRequest.period ) * data.monthPay ) - parseInt(currentDataRequest.sum);

	data.outLink = credit.find("link[rel=www]:eq(0)").attr("href");

	return data;
}

function floatToPercent(f){
	if(parseFloat(f) < 1){
		f = parseFloat(f)*100;
	} 
	return parseFloat( f ).toFixed(1);;
}

function processingData(data){

	if(outLinks && outLinks[data.id]){
		data.outLink = outLinks[data.id];
	} else {
		if(!data.outLink)
			data.outLink = "#";
	}

	data.fullRestrictions = data.restrictions; 

	data.restrictions = (data.restrictions.trim() ? "есть" : "нет" );
	//data.rate = data.rate + "%"
	data.firstPay = data.firstPay + "%";

	if(!data.advancedRepaymentFee)
		data.advancedRepaymentFee = "отсутствует";

	if(data.guaranteeNeed){
		data.guaranteeNeed = guaranteeNeedDesc[data.guaranteeNeed];
		if(!data.guaranteeNeed){
			data.guaranteeNeed = "";	
		}
	}

	if(data.pledgeNeed){
		data.pledgeNeed = pledgeNeedDesc[data.pledgeNeed];
		if(!data.pledgeNeed){
			data.pledgeNeed = "";	
		}
	}

	req("citizenship");
	req("homePhone");
	req("mobilePhone");
	req("jobPhone");

	if(!data.applicationPendency)
		data.applicationPendency = " не указано ";

	if(!data.additionalInfo)
		data.additionalInfo = " не указано ";

	if(!data.fullRestrictions)
		data.fullRestrictions = " не указано ";

	return data;

	function req(key){
		data[key] = (data[key] && data[key].length ? "обязательно" : "не обязательно" );
	}
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

	$.ajax(uyUrlProxy, {
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

	makeGeneralTable(fullInfoDiv, makeMatrixWithRates(data.rates));

	makeDocumentTable(fullInfoDiv, credit);

	clearTrash(creditDivForFullData);

	fullInfoDiv.find("a.uy-full-info-close").click(function(e){
		e.preventDefault();
		fullInfoDiv.slideUp(function(){
			smallInfoTable.show();
		});
	});	
}

function makeDocumentTable(fullInfoDiv, credit){

	var generalDocumentTitle = "Документы для подтверждения дохода";
	var otherDocumentTitle = "Другие предоставляемые документы";

	var generalTr = fullInfoDiv.find("table tr:contains("+generalDocumentTitle+")");
	var otherTr = fullInfoDiv.find("table tr:contains("+otherDocumentTitle+")");

	credit.find("proof-of-income documents document").each(function(i, doc){

		var doc = $(doc);
		var key = doc.text().trim();

		if(!proofIncomeDesc[key])
			return true;

		var attr = doc.attr("required");
		var req = "обязателен";

		if(attr == "DESIRABLE_ON_DEMAND")
			req = "желательно или по требованию";
		if(attr == "CHOOSINGLY")
			req = "желательно";

		generalTr.after("<tr><td>"+proofIncomeDesc[key]+"</td><td>"+req+"</td></tr>");
	});

	credit.find("other-provided-documents documents document").each(function(i, doc){

		var doc = $(doc);
		var key = doc.text().trim();

		if(!otherProofIncomeDesc[key])
			return true;

		var attr = doc.attr("required");
		var req = "обязателен";

		if(attr == "DESIRABLE_ON_DEMAND")
			req = "желательно или по требованию";
		if(attr == "CHOOSINGLY")
			req = "желательно";

		otherTr.after("<tr><td>"+otherProofIncomeDesc[key]+"</td><td>"+req+"</td></tr>");
	});
}

function makeMatrixWithRates(rates){
	var keys = ["Rate", "Sum", "Period", "Instalment"];
	var mass = [];

	var rates = rates.sort(function(a,b){
		
        return parseFloat(a.minRate)>parseFloat(b.minRate); 
	});

	$.each(rates, function(i, rate){
		
		var subMass = [];

		$.each(keys, function(i, key){

			var value = getRange(rate["min"+key], rate["max"+key], key, rate.intervalMin, rate.intervalMax); 

			subMass.push( value );
		});

		mass.push(subMass);
	});

	return mass;

	function getRange(a, b, key, intervalMin, intervalMax){

		var result = "";
		
		if(key == "Period"){

			if(intervalMin == "DAY"){
				if(a<365)
					a=0;
				else
					a = parseInt(a/365);
			}
			if(intervalMin == "MONTH"){
				if(a<12)
					a=0;
				else
					a = parseInt(a/12);
			}

			if(intervalMax == "DAY"){
				b = parseInt(b/365) + 1;
			}
			if(intervalMax == "MONTH"){
				b = parseInt(b/12) + 1;
			}
		}

		if(a!=0 && b == Infinity){
			if(key == "Period" || key == "Sum" || "Instalment"){
				result = "от " + a;
			} else {
				return a;
			}
		}

		if(a==0 && b < Infinity){
			if(key == "Period" || key == "Sum" || "Instalment"){
				result = "до " + b;
			} else {
				return b;
			}			
		}

		if(a != 0 && b < Infinity){
			result = a+" - "+b;
		}

		if(a == b){
			result = a;
		}

		if(key == "Instalment" || key == "Rate")
			result += " %";

		if(key == "Period")
			result += " г.";

		if(a==0 && b == Infinity)
			result = " - ";

		return result;
	}
}

function makeGeneralTable(div, matrix){

	var table = div.find(".uy-full-result-table-general");

	$.each(matrix, function(i, mass){

		var tr = $("<tr></tr>");

		$.each(mass, function(k, value){

			var td = $("<td>" + value + "</td>");

			tr.append(td);
		});

		table.append(tr);
	});
}

function parseFullXmlFromData(credit){

	var data = parseDataFromXml(credit);
	var rubCurrencys = credit.find("rate currency:contains(RUB)");

	data.rates = [];

	rubCurrencys.each(function(i, currency){
		
		var rate = $(currency).parent();
		var rateObject = {};

		rateObject.minRate = floatToPercent( rate.find("min-value").text() );
		if(!rateObject.minRate)
			rateObject.minRate = 0;

		rateObject.maxRate = floatToPercent( rate.find("max-value").text() );
		if(!rateObject.maxRate)
			rateObject.maxRate = Infinity;

		rateObject.minSum = parseInt( rate.find("min-sum").text() );
		if(!rateObject.minSum)
			rateObject.minSum = 0;

		rateObject.maxSum = parseInt( rate.find("max-sum").text() );
		if(!rateObject.maxSum)
			rateObject.maxSum = Infinity;

		rateObject.minPeriod = parseInt( rate.find("min-period").text() );
		if(!rateObject.minPeriod)
			rateObject.minPeriod = 0;

		rateObject.maxPeriod = parseInt( rate.find("max-period").text() );
		if(!rateObject.maxPeriod)
			rateObject.maxPeriod = Infinity;


		rateObject.intervalMin =  rate.find("min-period").attr("interval") ;
		rateObject.intervalMax =  rate.find("max-period").attr("interval") ;


		rateObject.minInstalment = parseInt( rate.find("min-initial-instalment").text() );
		if(!rateObject.minInstalment)
			rateObject.minInstalment = 0;

		rateObject.maxInstalment = parseInt( rate.find("max-initial-instalment").text() );
		if(!rateObject.maxInstalment)
			rateObject.maxInstalment = Infinity;


		data.rates.push(rateObject);
	});


	data.paymentScheme = paymentSchemeDesc[ credit.find("payment scheme:eq(0)").text() ];
	if(!data.paymentScheme)
		data.paymentScheme = "";

	data.advancedRepayment = advancedRepaymentDesc[ credit.find("advanced-repayment scheme:eq(0)").text() ];
	if(!data.advancedRepayment)
		data.advancedRepayment = "";

	data.advancedRepaymentFee = credit.find("advanced-repayment fee-description:eq(0)").text();

	data.insuranceConditions = credit.find("insurance conditions").text();

	data.guaranteeNeed = credit.find("credit-security guarantee-need").text().trim();

	data.pledgeNeed = credit.find("credit-security pledge-need").text().trim();

	data.additionalInfo = credit.find("additional-info additional-info").text();

	data.debtorMaxAgeMale = credit.find("debtor-requirements debtor[gender=MALE] max-repayment-age").text();

	data.debtorMaxAgeFemale = credit.find("debtor-requirements debtor[gender=FEMALE] max-repayment-age").text();

	data.citizenship = credit.find("debtor-requirements citizenship");

	data.registration = registrationDesc[credit.find("debtor-requirements registration").text().trim()];
	if(!data.registration)
		data.registration = "не требуется";

	data.totalWorkExperience = credit.find("debtor-requirements total-work-experience").text();

	data.lastWorkExperience = credit.find("debtor-requirements last-work-experience").text();

	data.homePhone = credit.find("debtor-requirements home-phone");

	data.mobilePhone = credit.find("debtor-requirements mobile-phone");

	data.jobPhone = credit.find("debtor-requirements job-phone");

	data.applicationPendency = applicationPendencyDesc[credit.find("decision-timing application-pendency").text()];

	data.applicationPendencyComment = credit.find("decision-timing comment").text();

	data.paymentMethods = [];
	credit.find("payment methods method").each(function(i, method){
		var method = $(method);

		data.paymentMethods.push(paymentMethodsDesc[method.text().trim()]);
	}); 
	data.paymentMethods = data.paymentMethods.join(", ");


	return data;
}

function deleteRepeats(credits){

	var ids = {};
	var result = [];

	credits.each(function(i, credit){

		var id = $(credit).find("id:eq(0)").text().trim();	

		if(!ids[id]){
			ids[id] = true;
			result.push(credit);
		}
	});

	return $(result);
}

function sortCredits(credits){
	//var id = credit.find("id:eq(0)").text().trim();
	//var bankId = credit.find("bank id:eq(0)").text().trim();
	return sortCreditsByBanks(credits);
}

function sortCreditsByBanks(credits){
	var result = [];
	var maxRange = 0;

	var bankRanges = commonBankRanges;

	if(isMortgage()){
		bankRanges = mortgageBankRanges;

	} else if(isAutoCredit()){
		bankRanges = autoCreditBankRanges;
	}

	$.each(bankRanges, function(i, range){
		if(range>maxRange)
			maxRange = range;
	});


	for(var i = maxRange; i>=0; i--){

		credits.each(function(j, credit){

			if(i==0){
				result.push(credit);
			} else {

				var bankId = $(credit).find("bank id:eq(0)").text().trim();

				if(bankRanges[bankId] && bankRanges[bankId]==i){
					result.push(credit);
				}
			}
		});
	}

	return $(result);
}

start();


})();