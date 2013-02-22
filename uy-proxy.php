<?php

$host = "api.uslugi.yandex.ru";
$site = "http://smartcredits.ru";

$urlCommonCredits = "/1.0/banks/credits/search";
$urlAutoCredits = "/1.0/banks/autocredits/search";
$urlMortgages = "/1.0/banks/mortgages/search";


header('Content-Type: text/xml; charset=utf-8');

$fp = fsockopen($host, 80, $errno, $errstr, 30);

if (!$fp) {
   	echo "$errstr ($errno)\n";
} else {

	$responce = "";

	$out = "GET ".$urlCommonCredits."?".$_SERVER["QUERY_STRING"]." HTTP/1.1\r\n";
	$out .= "Host: ".$host."\r\n";
	$out .= "Referer: ".$site."\r\n";
	$out .= "Connection: Close\r\n\r\n";

	fwrite($fp, $out);

	while (!feof($fp)) {
	   $responce.=fgets($fp, 128);
	}
	fclose($fp);

	$responce = http_get_begin_xml($responce);
	$responce = http_trim_headers($responce);
	
	echo $responce;
}

function http_get_begin_xml($content) {
	return substr($content, strpos($content, "<?xml"));
}

function http_trim_headers($content)
{
	return trim(substr( $content, 0, strpos($content, "\r\n") ));
}

?>