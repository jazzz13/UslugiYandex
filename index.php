<a href='?formCreditId=0'>0</a>
<a href='?formCreditId=1'>1</a>
<a href='?formCreditId=2'>2</a>

<?php 

	include "./uy-fields-content.php";
	

	$formStructureCollection = array(
		array(
			"sum",
			"period",
			"purpose",
			"region",
			"bank",
			"proof-of-income",
			"advanced-repayment"
			),
		array(
			"sum",
			"period",
			"min-initial-instalment",
			"dwelling",
			"dwelling-readiness",
			"region",
			"bank",
			"advanced-repayment"
			),
		array(
			"sum",
			"period",
			"min-initial-instalment",
			"vendor-type",
			"age-type",
			"region",
			"bank",
			"advanced-repayment",
			"insurance"
			),
	);

	$formCreditId = 0;
	
	if($_GET["formCreditId"]) {
		$formCreditId = (int)($_GET["formCreditId"]);
	}


	$selectedFields = $formStructureCollection[$formCreditId];

	function getDescriptionByFieldName($fieldName){
		global $descriptions;
		return $descriptions[ $fieldName ];
	}

	function getControlsByFildName($fieldName){
		global $controllers;
		return $controllers[ $fieldName ];
	}

?>


<link rel='stylesheet' type='text/css' href='./uy-style.css'>
<div id='uslugi-yandex'>
	<div id='uy-form'>
		<table id='uy-form-table'>

<?php
	foreach ($selectedFields as $fieldName) {
		
		echo "<tr><td>";
		echo getDescriptionByFieldName( $fieldName );	
		echo "</td><td>";
		echo getControlsByFildName( $fieldName );
		echo "</td></tr>";	
	}	
?>

		</table>
	</div>
	<br>
	
	<div id='uy-result'>
		Результаты запроса
	</div>
</div>






