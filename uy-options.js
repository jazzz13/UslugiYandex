var uyUrlProxy = "/podbor/uy-proxy2.php";

var commonBankRanges = {  // ранг банков обычного кредита
	
	"91" : 1,		//  ид банка в ковычках : число
	"" : 0,
	"" : 0,
	"" : 0,
	"end" : 0
};

var mortgageBankRanges = {  // ранг банков ипотеки
	
	"173" : 1,		//  ид банка в ковычках : число
	"" : 0,
	"" : 0,
	"end" : 0
};

var autoCreditBankRanges = {   // ранг банков авто-кредита
	
	"82" : 1,		//  ид банка в ковычках : число
	"" : 0,
	"" : 0,
	"end" : 0
};

var outLinks = {   // подмена ссылок

	"290401" : "http://vk.com/id2291437",		//  ид кредита в ковычках : ссылка в ковычках
	"" : "",
	"" : "",
	"" : "",
	"" : "",
	"end" : "end"
};


var uyHtmlHeadResult = "<p>Результаты запроса:</p>";
var uyHtmlNotResult = "По заданным параметрам кредитных продуктов нет";