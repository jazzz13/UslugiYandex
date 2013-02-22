<?php

	$descriptions = array(
		"sum" => "Сумма кредита",
		"period" => "Срок кредита",
		"purpose" => "Цель кредита",
		"region" => "Город",
		"bank" => "Банк",
		"proof-of-income" => "Подтверждение доходов",
		"advanced-repayment" => "Досрочное погашение",
		"min-initial-instalment" => "Первоначальный взнос",
		"dwelling" => "Вид недвижимости",
		"dwelling-readiness" => "Готовность жилья",
		"vendor-type" => "Производитель",
		"age-type" => "Возраст",
		"insurance" => "Страхование"
		);


	$controllers = array(
		"sum" => "
			<input name='sum' class='uy-input-text'> 
			&nbsp &nbsp рублей",

		"period" => "
			<input name='period' class='uy-input-text'> 
			&nbsp &nbsp
			<select name='period-type' class='uy-select uy-select-mini'>
				<option value='month' selected>месяцев</option>
				<option value='years'>лет</option>
			</select>",

		"purpose" => "
			<select name='purpose' class='uy-select'>
				<option value='ANY'>
					на любые цели
				</option>
				<option value='EDUCATION'>
					на образование
				</option>
				<option value='GOODS'>
					на товары
				</option>
				<option value='TRAVEL'>
					на путишествие
				</option>
				<option value='TREATMENT'>
					на лечение
				</option>
				<option value='PERSONAL_SUBSIDIARY_PLOT'>
					на ведение подсобного хозяйства
				</option>
				<option value='MORTGAGE_FIRST_PAYMENT'>
					на первый взнос в ипотеке
				</option>
			</select>",

		"region" => "
			<input name='region' class='uy-input-text'>",

		"bank" => "
			<select name='bank' class='uy-select'>
				<option value='0' selected='selected'>Любой банк</option>
				<option value='61'>Газпромбанк</option>
				<option value='63'>ВТБ24</option>
				<option value='64'>Альфа-Банк</option>
				<option value='65'>ЮниКредит Банк</option>
				<option value='66'>Промсвязьбанк</option>
				<option value='67'>Райффайзенбанк</option>
				<option value='68'>Росбанк</option>
				<option value='82'>Уралсиб</option>
				<option value='83'>Номос-Банк</option>
				<option value='84'>ТрансКредитБанк</option>
				<option value='85'>АК Барс</option>
				<option value='86'>Банк «Санкт-Петербург»</option>
				<option value='87'>Ситибанк</option>
				<option value='88'>Петрокоммерц</option>
				<option value='89'>Возрождение</option>
				<option value='90'>НБ «Траст»</option>
				<option value='91'>БинБанк</option>
				<option value='96'>ОТП Банк</option>
				<option value='98'>Русфинанс Банк</option>
				<option value='99'>Ханты-Мансийский Банк</option>
				<option value='100'>Глобэкс</option>
				<option value='101'>Зенит</option>
				<option value='127'>Татфондбанк</option>
				<option value='128'>Запсибкомбанк</option>
				<option value='129'>Сургутнефтегазбанк</option>
				<option value='130'>Экспресс</option>
				<option value='161'>Нацинвестпромбанк</option>
				<option value='163'>Центркомбанк</option>
				<option value='165'>Трансстройбанк</option>
				<option value='166'>Балтийский Банк Развития</option>
				<option value='167'>АлтайЭнергоБанк</option>
				<option value='168'>Евротраст</option>
				<option value='169'>Банк Жилищного Финансирования</option>
				<option value='171'>Темпбанк</option>
				<option value='173'>РоссельхозБанк</option>
				<option value='174'>Абсолют Банк</option>
				<option value='175'>Нордеа Банк</option>
				<option value='176'>БНП Париба</option>
				<option value='177'>Кредит Европа Банк</option>
				<option value='182'>Мобилбанк</option>
				<option value='183'>Международный Банк Азербайджана</option>
				<option value='184'>Инвестторгбанк</option>
				<option value='185'>НС Банк</option>
				<option value='221'>Московское Ипотечное Агенство</option>
				<option value='241'>Тинькофф Кредитные Системы</option>
				<option value='261'>Национальный Космический Банк</option>
				<option value='281'>Генбанк</option>
				<option value='282'>Охотный Ряд</option>
				<option value='301'>Пушкино</option>
				<option value='321'>Сберкред Банк</option>
				<option value='341'>Евромет</option>
				<option value='361'>Мострансбанк</option>
				<option value='381'>Банк Русский Стандарт</option>
				<option value='841'>Московский Кредитный Банк</option>
				<option value='921'>Международный Акционерный Банк</option>
				<option value='941'>Русский Торговый Банк</option>
				<option value='981'>ИнтрастБанк</option>
				<option value='1021'>Москоммерцбанк</option>
				<option value='3441'>Ренессанс Кредит</option>
				<option value='3461'>РУБЛЕВ</option>
				<option value='3481'>Промсельхозбанк</option>
				<option value='3521'>Тойота Банк</option>
				<option value='3541'>ДжиИ Мани Банк</option>
				<option value='3701'>ЛОКО-Банк</option>
				<option value='3721'>Стройкредит</option>
				<option value='3781'>Клиентский</option>
				<option value='3801'>РосДорБанк</option>
				<option value='3861'>Морской Банк</option>
				<option value='7461'>Русстройбанк</option>
				<option value='7521'>Транспортный</option>
				<option value='9081'>РегионИнвестБанк</option>
				<option value='13021'>БАНК ЦЕРИХ (ЗАО)</option>
				<option value='17241'>Совкомбанк</option>
				<option value='17441'>Инвестиционный союз</option>
				<option value='17481'>Союз</option>
				<option value='17501'>Меткомбанк</option>
				<option value='17521'>Галабанк</option>
				<option value='17522'>Западный</option>
				<option value='17541'>Связной Банк</option>
				<option value='18041'>Анкор Банк</option>
				<option value='18081'>Банк Торгового Финансирования</option>
				<option value='18161'>Русский Ипотечный банк</option>
				<option value='18181'>Таврический</option>
				<option value='18221'>Огни Москвы</option>
				<option value='18222'>Национальный стандарт</option>
				<option value='18361'>Российский Капитал</option>
				<option value='18362'>Бенефит-Банк</option>
				<option value='18481'>БЦК-Москва</option>
				<option value='18641'>Канский</option>
				<option value='18781'>ФОНДСЕРВИСБАНК</option>
				<option value='18801'>ИнтерПрогрессБанк</option>
				<option value='18821'>Банк24.ру</option>
				<option value='19041'>Унифин</option>
				<option value='19101'>БФГ-Кредит</option>
				<option value='19121'>Объединенный Банк Промышленных Инвестиций</option>
				<option value='19141'>Саммит Банк</option>
				<option value='19161'>Дил-Банк</option>
				<option value='19162'>Москомприватбанк</option>
				<option value='19163'>София</option>
				<option value='19164'>ОПМ-Банк</option>
				<option value='19181'>Народный кредит</option>
				<option value='19182'>МАСТ-Банк</option>
				<option value='19221'>РосЕвроБанк</option>
				<option value='19261'>Газстройбанк</option>
				<option value='19262'>БТА-Казань</option>
				<option value='20282'>Прадо-Банк</option>
				<option value='21001'>Коммерческий банк развития</option>
				<option value='23083'>Еврокоммерц</option>
				<option value='23441'>Сбербанк России</option>
				<option value='23468'>ИпоТек Банк</option>
				<option value='23525'>ПромСервисБанк</option>
				<option value='23989'>Мосстройэкономбанк</option>
				<option value='25057'>Балтика</option>
				<option value='26705'>Компания Розничного Кредитования</option>
				<option value='26706'>Донактивбанк</option>
				<option value='27173'>ПВ-Банк</option>
				<option value='27409'>ДельтаКредит</option>
				<option value='27900'>АйСиАйСиАй Банк Евразия</option>
				<option value='29124'>Росэнергобанк</option>
				<option value='31321'>Кредит-Москва</option>
				<option value='32502'>Меткомбанк</option>
				<option value='32683'>Межтрастбанк</option>
				<option value='32685'>Банк ИТБ</option>
				<option value='32747'>Юниаструм Банк</option>
				<option value='32755'>Инвестбанк</option>
				<option value='33526'>Агропромкредит</option>
				<option value='33527'>Мастер-Банк</option>
				<option value='34201'>Открытие</option>
				<option value='34221'>Восточный экспресс банк</option>
				<option value='34589'>Автоторгбанк</option>
				<option value='34645'>Солид Банк</option>
				<option value='35403'>ВЕСТА</option>
				<option value='35406'>Примсоцбанк</option>
				<option value='35409'>Промсбербанк</option>
				<option value='35444'>Банк Хоум Кредит</option>
				<option value='35568'>Руснарбанк</option>
				<option value='36966'>Мособлбанк</option>
				<option value='37108'>Азиатско–Тихоокеанский Банк</option>
				<option value='37249'>Металлинвестбанк</option>
				<option value='39157'>Софрино</option>
				<option value='39158'>Роспромбанк</option>
				<option value='39168'>ФлексБанк</option>
				<option value='39170'>Юникорбанк</option>
				<option value='39219'>Мой банк</option>
				<option value='39246'>АК Банк</option>
				<option value='39248'>Внешпромбанк</option>
				<option value='39694'>Финам</option>
				<option value='39698'>ТЭМБР-Банк</option>
				<option value='39908'>Навигатор</option>
				<option value='40062'>КБК-Банк</option>
				<option value='40063'>МБФИ</option>
				<option value='40084'>Финансовый стандарт</option>
				<option value='40085'>Гринфилдбанк</option>
				<option value='40242'>АФ Банк</option>
				<option value='40243'>Первобанк</option>
				<option value='40348'>Окский</option>
				<option value='40622'>Пойдём!</option>
				<option value='40624'>Национальный Корпоративный Банк</option>
				<option value='41430'>Коммерческий Банк «Европейский экспресс»</option>
				<option value='42011'>Банкирский Дом</option>
				<option value='42172'>Банк Проектного Финансирования</option>
				<option value='42652'>Балтинвестбанк</option>
				<option value='42910'>Транснациональный Банк</option>
				<option value='43267'>БКС Банк</option>
				<option value='43480'>Таурус Банк (ЗАО)</option>
				<option value='43481'>Альта-Банк</option>
				<option value='43851'>Софрино Банк</option>
				<option value='45173'>Алеф-Банк</option>
				<option value='47035'>Агросоюз</option>
				<option value='47340'>Смартбанк</option>
				<option value='47342'>Монолит</option>
				<option value='48277'>КИТ Финанс Инвестиционный банк</option>
				<option value='48596'>Банк Советский</option>
				<option value='48863'>Уральский банк реконструкции и развития</option>
				<option value='50346'>РосинтерБанк</option>
				<option value='52126'>Первый Чешско-Российский Банк</option>
				<option value='54763'>Плюс Банк</option>
				<option value='55383'>Кроссинвестбанк</option>
				<option value='55388'>Региональный банк развития</option>
				<option value='55474'>Национальный Залоговый Банк</option>
				<option value='55893'>Банк Москвы</option>
				<option value='55906'>Анталбанк</option>
				<option value='55964'>Легион</option>
				<option value='56830'>МИЛБАНК</option>
				<option value='56845'>Банк Метрополь</option>
				<option value='57926'>2ТБанк</option>
				<option value='58428'>Спецсетьстройбанк</option>
			</select>",

		"proof-of-income" => "
			<label>
				<input type='radio' class='uy-radio' name='proof-of-income' value='0' checked>
				не важно
			</label>
			<br>
			<label>
				<input type='radio' class='uy-radio' name='proof-of-income' value='false'>
				без справок
			</label>
			<br>
			<label>
				<input type='radio' class='uy-radio' name='proof-of-income' value='true'>
				со справками
			</label>",

		"advanced-repayment" => "
			<select name='advanced-repayment' class='uy-select'>
				<option selected value='0'>не важно</option>
				<option  value='WHOLE'>только полностью</option>
				<option  value='PARTIAL'>только частично</option>
				<option  value='PARTIAL_AND_WHOLE'>частично и полностью</option>
				<option  value='NO'>нет возможности</option>
			</select>",

		"min-initial-instalment" => "
			<input class='uy-input-text' name='min-initial-instalment'>
			&nbsp &nbsp рублей",

		"dwelling" => "
			<select name='dwelling' class='uy-select'>
				<option value='0'>не важно</option>
				<option value='FLAT'>квартира</option>
				<option value='HOUSE'>индивидуальный дом</option>
				<option value='GARAGE'>гараж</option>
				<option value='LAND'>земельный участок</option>
				<option value='GARDEN_APARTMENT_WITH_LAND'>садовый домик с земельным участком</option>
			</select>",

		"dwelling-readiness" => "
			<label>
				<input type='radio' name='dwelling-readiness' class='uy-radio' value='0' checked>
				не важно
			</label>
			<br>
			<label>
				<input type='radio' name='dwelling-readiness' class='uy-radio' value='READY'>
				готовое
			</label>
			<br>
			<label>
				<input type='radio' name='dwelling-readiness' class='uy-radio' value='UNDER_CONSTRUCTION'>
				строящееся
			</label>",

		"vendor-type" => "
			<label>
				<input type='radio' class='uy-radio' name='vendor-type' value='0' checked>
				не важно
			</label>
			<br>
			<label>
				<input type='radio' class='uy-radio' name='vendor-type' value='FOREIGN'>
				иностранный
			</label>
			<br>
			<label>
				<input type='radio' class='uy-radio' name='vendor-type' value='DOMESTIC'>
				отечественный
			</label>",

		"age-type" => "
			<label>
				<input type='radio' class='uy-radio' name='age-type' value='0' checked>
				не важно
			</label>
			<br>
			<label>
				<input type='radio' class='uy-radio' name='age-type' value='NEW'>
				новый
			</label>
			<br>
			<label>
				<input type='radio' class='uy-radio' name='age-type' value='USED'>
				подержанный
			</label>",

		"insurance" => "
			<label>
				<input type='checkbox' class='uy-checkbox' name='without-kasko'>
				без КАСКО
			</label>	
			<br>
			<label>
				<input type='checkbox' class='uy-checkbox' name='without-life-insurance'>
				без страхования жизни
			</label>"
		);
?>