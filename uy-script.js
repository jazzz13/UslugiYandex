var keyAPI = "hbFWpwACAAABPPb6QEWsXrzh0X6HgHzi0zN7lZMXh8f7hA";
var urlAPI = "http://api.uslugi.yandex.ru";
var urlProxy = "./uy-proxy.php";

function request(){

	var url = urlProxy;

	var params = "?key=" + keyAPI;

	$.ajax(	url + params ); 

}

request();