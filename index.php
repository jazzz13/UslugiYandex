<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel='stylesheet' type='text/css' href='/podbor/uy-style.css'>

<?php 

	include ("./uy-fields-content.php");

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

?>

<div id='uslugi-yandex'>
	<div id='uy-form'>
		<table id='uy-form-table'>

<?php
	foreach ($selectedFields as $fieldName) {
		
		echo "<tr><td>";
		echo $descriptions[ $fieldName ];	
		echo "</td><td>";
		echo $controllers[ $fieldName ];
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
			<div class='uy-credit' credit-id='$id' bank-id='$idBank'>  
				<div class='uy-credit-name'>  
					<a href='$link'>  
						$name  
					</a> 
				</div>  
				<div class='uy-credit-bank'>  
					Банк: $bank  
				</div> 
				<div>
					<a href='$outLink' class='uy-credit-outlink' target='_blank'>
						(перейти на сайт кредита)
					</a>
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
				<tr class='uy-field-purpose'>
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
						Документы для подтверждения дохода
					</td>
					<td>
					</td>
				<tr class='uy-full-result-tr-header'>
					<td>
						Другие предоставляемые документы
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
					<td colspan='2'>
						$insuranceConditions
					</td>
				</tr>
				<tr class='uy-full-result-tr-header'>
					<td>
						Обеспечение кредита
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						Поручительство 
					</td>
					<td>
						$guaranteeNeed
					</td>
				</tr>
				<tr>
					<td>
						Залог
					</td>
					<td>
						$pledgeNeed
					</td>
				</tr>
				<tr class='uy-full-result-tr-header'>
					<td>
						Требования к заемщику
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						Максимальный возраст на момент погашения кредита для мужчин
					</td>
					<td>
						$debtorMaxAgeMale
					</td>
				</tr>
				<tr>
					<td>
						Максимальный возраст на момент погашения для женщин
					</td>
					<td>
						$debtorMaxAgeFemale
					</td>
				</tr>
				<tr>
					<td>
						Гражданство
					</td>
					<td>
						$citizenship
					</td>
				</tr>
				<tr>
					<td>
						Регистрация
					</td>
					<td>
						$registration
					</td>
				</tr>
				<tr>
					<td>
						Общий стаж работы
					</td>
					<td>
						$totalWorkExperience
					</td>
				</tr>
				<tr>
					<td>
						Стаж работы на последнем месте
					</td>
					<td>
						$lastWorkExperience
					</td>
				</tr>
				<tr>
					<td>
						Домашний телефон
					</td>
					<td>
						$homePhone
					</td>
				</tr>
				<tr>
					<td>
						Мобильный телефон
					</td>
					<td>
						$mobilePhone
					</td>
				</tr>
				<tr>
					<td>
						Рабочий телефон
					</td>
					<td>
						$jobPhone
					</td>
				</tr>

				<tr class='uy-full-result-tr-header'>
					<td>
						Сроки принятия решения
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						Срок рассмотрения заявки
					</td>
					<td>
						$applicationPendency
					</td>
				</tr>
				<tr>
					<td colspan='2'>
						$applicationPendencyComment
					</td>
				</tr>

				<tr class='uy-full-result-tr-header'>
					<td>
						Способы оплаты
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						Способы оплаты
					</td>
					<td>
						$paymentMethods
					</td>
				</tr>
				<tr class='uy-full-result-tr-header'>
					<td>
						Дополнительно
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td colspan='2'>
						$additionalInfo
					</td>
				</tr>
				<tr class='uy-full-result-tr-header'>
					<td>
						Ограничения
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td colspan='2'>
						$fullRestrictions  
					</td>
				</tr>
			</table>

			<a href="#" class='uy-full-info-close'>
				скрыть информацию &uarr;
			</a>

		</div>
	</div>

</div>

<script src='/podbor/jquery-1.9.1.min.js'></script>
<script>var creditTypeId = <?php echo $formCreditId;?>;</script>
<script src='/podbor/uy-options.js'></script>
<script src='/podbor/uy-script.js'></script>




