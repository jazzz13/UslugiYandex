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
				<div class='uy-credit-full-info'>
				</div>
			</div>
		</div>

		<div id='uy-template-result-full-info'>
			<a href="#" class='uy-full-info-close'>
				скрыть информацию &darr;
			</a>
			<table class='uy-full-result-table uy-full-result-table-general'>
				<tr>
					<td>
						Процент
					</td>
					<td>
						Сумма
					</td>
					<td>
						Срок
					</td>
					<td>
						Первоначальный взнос
					</td>
				</tr>
			</table>

			<table class='uy-full-result-table'>
				<tr class='uy-full-result-tr-header'>
					<td>
						Параметры кредита
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						Цель
					</td>
					<td>
						$purpose
					</td>
				</tr>
				<tr>
					<td>
						Схема расчета
					</td>
					<td>
						$paymentScheme
					</td>
				</tr>
				<tr class='uy-full-result-tr-header'>
					<td>
						Досрочное погашение
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						Возможность досрочного погашения
					</td>
					<td>
						$advancedRepayment
					</td>
				</tr>
				<tr>
					<td>
						Комиссия/штраф за досрочное погашение
					</td>
					<td>
						$advancedRepaymentFee
					</td>
				</tr>
				<tr class='uy-full-result-tr-header'>
					<td>
						Другие предоставляемые документы
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						документы, подтверждающие кредитную историю
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						заявление-анкета
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						паспорт
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						военный билет
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						заверенная копия трудовой книжки
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						свидетельство о браке (разводе, смерти супруга), брачный контракт (при наличии)
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						страховое свидетельство государственного пенсионного страхования
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						дипломы об образовании
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						документы о собственности на активы
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						свидетельства о рождении/паспорта несовершеннолетних детей
					</td>
					<td>
					</td>
				</tr>
				<tr class='uy-full-result-tr-header'>
					<td>
						Страхование
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td>
					</td>
				</tr>
			</table>

			<a href="#" class='uy-full-info-close'>
				скрыть информацию &uarr;
			</a>

		</div>
	</div>

</div>

<script src='./jquery-1.9.1.min.js'></script>
<script>var creditTypeId = <?php echo $formCreditId;?>;</script>
<script src="./uy-script.js"></script>




