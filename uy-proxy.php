<?php

$host = "api.uslugi.yandex.ru";
$site = "http://smartcredits.ru";
$keyAPI = "hbFWpwACAAABPPb6QEWsXrzh0X6HgHzi0zN7lZMXh8f7hA";

$urlCommonCredits = "/1.0/banks/credits/search";
$urlAutoCredits = "/1.0/banks/autocredits/search";
$urlMortgages = "/1.0/banks/mortgages/search";

$startQuery = "?key=".$keyAPI."&";

$fp = fsockopen($host, 80, $errno, $errstr, 30);

if (!$fp) {
   	echo "$errstr ($errno)\n";
} else {

	header('Content-Type: text/xml; charset=utf-8');

	$responce = "";

	$out = "GET ".$urlCommonCredits.$startQuery.$_SERVER["QUERY_STRING"]." HTTP/1.1\r\n";
	$out .= "Host: ".$host."\r\n";
	$out .= "Referer: ".$site."\r\n";
	$out .= "Connection: Close\r\n\r\n";

	fwrite($fp, $out);

	while (!feof($fp)) {
	   $responce.=fgets($fp, 128);
	}
	fclose($fp);

	$responce = getBeginXml($responce);
	$responce = clearEnd($responce);
	
	echo $responce;
}

function getBeginXml($content) {
	return substr($content, strpos($content, "<?xml"));
}

function clearEnd($content){
	return $content;
}

?>