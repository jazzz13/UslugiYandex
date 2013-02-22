<?php

header('Content-Type: text/xml; charset=utf-8');

function YaGet2($url) {

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_REFERER , "http://" .$_SERVER['HTTP_HOST'] ); // http обязательно или сервер выдаст нам бу... 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array($url, 'GET'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$return = curl_exec($ch);
	
	if(curl_errno($ch)){
		$error = 'curl'.curl_errno($ch);
		return $error;
	}

	$http_code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);

	if ($http_code != 200){

		$error = 'http '.$http_code;
		return $error . "<br>".$return;
	} else {

		return $return;
	}
}



$yakey = "hbFWpwACAAABPPb6QEWsXrzh0X6HgHzi0zN7lZMXh8f7hA";

$sum = !Empty($_GET['sum'])?  $_GET['sum']: 500000;
$period= !Empty($_GET['period'])?  $_GET['period']  : "year";
$currency = !empty($_GET['currency'])? $_GET['currency'] : "RUS";

$url_uslugi = 'http://api.uslugi.yandex.ru/1.0/banks/credits/search?'
	.http_build_query(
		array(
			'key'=>$yakey,
			'region'=>'Оренбург',
			'currency'=>$currency,
			'period'=>$period ,
			'sum'=>$sum
		)
	);


print YaGet2( $url_uslugi );

?>