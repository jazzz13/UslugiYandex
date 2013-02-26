<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel='stylesheet' type='text/css' href='./uy-style.css'>

<a href='?formCreditId=0'>обычный</a>
<a href='?formCreditId=1'>ипотека</a>
<a href='?formCreditId=2'>авто</a>

<?php 

	include "./uy-fields-content.php";
	

	$formStructureCollection = array(
		array(	// набор полей для обычного кредита
			"sum",
			"period",
			"purpose",
			"region",
			"bank",
			"proof-of-income",
			"advanced-repayment"
			),
		array(	// набор полей для ипотеки
			"sum",
			"period",
			"min-initial-instalment",
			"dwelling",
			"dwelling-readiness",
			"region",
			"bank",
			"advanced-repayment"
			),
		array(	// набор полей для авто-кредита
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
		<button id='uy-request-button'>Показать кредиты</button>
	</div>
	<br>
	
	<div id='uy-result'>
		Результаты запроса
	</div>

	<div id='uy-templates'>
		<div id='uy-template-result-small-info'>
			<div class='uy-credit' credit-id='$id'>  
				<div class='uy-credit-name'>  
					<a href='$link'>  
						$name  
					</a>  
				</div>  
				<div class='uy-credit-bank'>  
					Банк: $bank  
				</div>  
				<table class='uy-credit-table'>  
					<tr class='uy-credit-table-tr-first'>  
						<td class='uy-field-purpose'>
							Цель кредита  
						</td>  
						<td>
							Обеспечение  
						</td>  
						<td>
							Процентная ставка  
						</td>  
						<td class='uy-field-firstPay'>
							Первый взнос  
						</td>  
						<td>
							Ежемесячный платеж  
						</td>  
						<td>
							Переплата  
						</td>  
					</tr>  
					<tr class='uy-credit-table-tr-second'>  
						<td class='uy-field-purpose'>
							$purpose  
						</td>  
						<td>
							$restrictions  
						</td>  
						<td>
							$rate  
						</td>  
						<td class='uy-field-firstPay'>
							$firstPay  
						</td>  
						<td>
							$monthPay  
						</td>  
						<td>
							$overPay  
						</td>  
					</tr>  
				</table>  
			</div>
		</div>

		<div id='uy-template-result-full-info'>
		</div>
	</div>

</div>

<script src='./jquery-1.9.1.min.js'></script>
<script>var creditTypeId = <?php echo $formCreditId;?>;</script>
<script src="./uy-script.js"></script>




