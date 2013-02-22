var urlProxy = "./uy-proxy2.php";

var targetDiv, requestButton;

function start(){
	initElements();
	initEvents();
}

function initElements(){
	targetDiv = $("#uy-result");
	requestButton = $("#uy-request-button");
}

function initEvents(){
	requestButton.click(initRequest);
}

function initRequest(){
	showLoading();
	requestWithData( buildParams() );
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
		creditTypeId : creditTypeId
	};

	buildOfTextFailds();
	buildOfSelectList();

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

	function buildOfSelectList(){

		var names = ["bank", "purpose", "advanced-repayment", "dwelling"];

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

	return data;
}

function requestWithData(data){

	$.ajax(urlProxy, {
		dataType: "xml",
		data: data,
		error: function(object){
			console.log(object.responseText);
		},
		success: function(xml){

			if(creditTypeId==1){
				posteCredits( $(xml).find("mortgage") );
			} else if(creditTypeId==2){
				posteCredits( $(xml).find("autocredit") );
			} else {
				posteCredits( $(xml).find("credit") );
			}
		} 
	}); 
}

function posteCredits(credits){

	targetDiv.empty();

	credits.each(function(i,item){

		targetDiv.append( "<div class='uy-credit'>"+ $(item).find("name:eq(0)").text() +"</div>" );
	});
}



start();