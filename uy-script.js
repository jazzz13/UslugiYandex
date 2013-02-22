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
	requestWithData({});
}

function showLoading(){
	targetDiv.html("..получение данных..");
}


function requestWithData(data){

	$.ajax(urlProxy, {
		dataType: "xml",
		data: {
			region: "Москва",
			currency: "RUB",
			sum: "100",
			period: "year"
		},
		error: function(object){
			console.log(object.responseText);
		},
		success: function(xml){
			posteCredits( $(xml).find("credit") );
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