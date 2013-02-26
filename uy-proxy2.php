<?php

header('Content-Type: text/xml; charset=utf-8');

$apiKey = "hbFWpwACAAABPPb6QEWsXrzh0X6HgHzi0zN7lZMXh8f7hA";


if(isset($_GET["creditFullInfo"])){
	print YaGet( $_GET["creditFullInfo"]."?key=".$apiKey );

	exit();
}

$baseURLAPI = "http://api.uslugi.yandex.ru";

$urlCommonCredits = "/1.0/banks/credits/search";
$urlMortgages = "/1.0/banks/mortgages/search";
$urlAutoCredits = "/1.0/banks/autocredits/search";


$creditTypeId = 0;

if(isset($_GET["creditTypeId"])){
	$creditTypeId = (int)$_GET["creditTypeId"];
}

$defaultParams = "";

/*
if(Empty($_GET["currency"])) {
	$defaultParams .= "currency=RUB&";
}
if(Empty($_GET["region"])) {
	$defaultParams .= "region=Москва&";
}
if(Empty($_GET["sum"])) {
	$defaultParams .= "sum=10&";
}
if(Empty($_GET["period"])) {
	$defaultParams .= "period=year&";
}  
*/

$totalURL = $baseURLAPI;

if($creditTypeId==1){
	$totalURL .= $urlMortgages;
} else if($creditTypeId==2){
	$totalURL .= $urlAutoCredits;
} else {
	$totalURL .= $urlCommonCredits;
}

$totalURL .= "?key=".$apiKey."&".$_SERVER["QUERY_STRING"];

$totalURL .= $defaultParams;

print YaGet( $totalURL );

function YaGet($url) {

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	//curl_setopt($ch, CURLOPT_REFERER , "http://" .$_SERVER['HTTP_HOST'] );
	curl_setopt($ch, CURLOPT_REFERER , "http://smartcredits.ru");
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

?>