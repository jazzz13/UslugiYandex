<?php

		// названия полей
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

		// верстка элементов ввода или сами поля
	$controllers = array(
		"sum" => "
			<input name='sum' class='uy-input-text' valid='^[0-9 ]{3,}$' value='100 000'> 
			&nbsp &nbsp рублей",

		"period" => "
			<input name='period' class='uy-input-text' valid='^ *[0-9]+ *$' value='12'> 
			&nbsp &nbsp
			<select name='period-type' class='uy-select uy-select-mini'>
				<option value='months' selected>месяцев</option>
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
			<select name='region' class='uy-select'>
		        <option value='Абакан'>Абакан</option>
	        	<option value='Актобе'>Актобе</option>
	        	<option value='Александров'>Александров</option>
	        	<option value='Алматы'>Алматы</option>
	        	<option value='Анадырь'>Анадырь</option>
	        	<option value='Анапа'>Анапа</option>
	        	<option value='Ангарск'>Ангарск</option>
	        	<option value='Апатиты'>Апатиты</option>
	        	<option value='Аргентина'>Аргентина</option>
	        	<option value='Арзамас'>Арзамас</option>
	        	<option value='Арктика и Антарктика'>Арктика и Антарктика</option>
	        	<option value='Армавир'>Армавир</option>
	        	<option value='Архангельск'>Архангельск</option>
	        	<option value='Астана'>Астана</option>
	        	<option value='Астрахань'>Астрахань</option>
	        	<option value='Африка'>Африка</option>
	        	<option value='Ачинск'>Ачинск</option>
	        	<option value='Балаково'>Балаково</option>
	        	<option value='Балашиха'>Балашиха</option>
	        	<option value='Барнаул'>Барнаул</option>
	        	<option value='Белая Церковь'>Белая Церковь</option>
	        	<option value='Белгород'>Белгород</option>
	        	<option value='Белогорск'>Белогорск</option>
	        	<option value='Бердск'>Бердск</option>
	        	<option value='Бийск'>Бийск</option>
	        	<option value='Биробиджан'>Биробиджан</option>
	        	<option value='Благовещенск'>Благовещенск</option>
	        	<option value='Бразилия'>Бразилия</option>
	        	<option value='Братск'>Братск</option>
	        	<option value='Брест'>Брест</option>
	        	<option value='Брянск'>Брянск</option>
	        	<option value='ВеликиеЛуки'>ВеликиеЛуки</option>
	        	<option value='Видное'>Видное</option>
	        	<option value='Винница'>Винница</option>
	        	<option value='Витебск'>Витебск</option>
	        	<option value='Владивосток'>Владивосток</option>
	        	<option value='Владикавказ'>Владикавказ</option>
	        	<option value='Владимир'>Владимир</option>
	        	<option value='Волгоград'>Волгоград</option>
	        	<option value='Волгодонск'>Волгодонск</option>
	        	<option value='Волжский'>Волжский</option>
	        	<option value='Вологда'>Вологда</option>
	        	<option value='Воронеж'>Воронеж</option>
	        	<option value='Выборг'>Выборг</option>
	        	<option value='Выкса'>Выкса</option>
	        	<option value='Гатчина'>Гатчина</option>
	        	<option value='Геленджик'>Геленджик</option>
	        	<option value='Глазов'>Глазов</option>
	        	<option value='Гомель'>Гомель</option>
	        	<option value='Горно-Алтайск'>Горно-Алтайск</option>
	        	<option value='Гродно'>Гродно</option>
	        	<option value='Грозный'>Грозный</option>
	        	<option value='Гусь-Хрустальный'>Гусь-Хрустальный</option>
	        	<option value='Дзержинск'>Дзержинск</option>
	        	<option value='Димитровград'>Димитровград</option>
	        	<option value='Дмитров'>Дмитров</option>
	        	<option value='Днепропетровск'>Днепропетровск</option>
	        	<option value='Долгопрудный'>Долгопрудный</option>
	        	<option value='Домодедово'>Домодедово</option>
	        	<option value='Донецк'>Донецк</option>
	        	<option value='Дубна'>Дубна</option>
	        	<option value='Египет'>Египет</option>
	        	<option value='Ейск'>Ейск</option>
	        	<option value='Екатеринбург'>Екатеринбург</option>
	        	<option value='Ессентуки'>Ессентуки</option>
	        	<option value='Железногорск'>Железногорск</option>
	        	<option value='Железнодорожный'>Железнодорожный</option>
	        	<option value='Жигулевск'>Жигулевск</option>
	        	<option value='Житомир'>Житомир</option>
	        	<option value='Жодино'>Жодино</option>
	        	<option value='Жуковский'>Жуковский</option>
	        	<option value='Запорожье'>Запорожье</option>
	        	<option value='Зеленоград'>Зеленоград</option>
	        	<option value='Златоуст'>Златоуст</option>
	        	<option value='Иваново'>Иваново</option>
	        	<option value='Ивано-Франковск'>Ивано-Франковск</option>
	        	<option value='Ижевск'>Ижевск</option>
	        	<option value='Израиль'>Израиль</option>
	        	<option value='Иркутск'>Иркутск</option>
	        	<option value='Ишим'>Ишим</option>
	        	<option value='Йошкар-Ола'>Йошкар-Ола</option>
	        	<option value='Казань'>Казань</option>
	        	<option value='Кайеркан'>Кайеркан</option>
	        	<option value='Калининград'>Калининград</option>
	        	<option value='Калуга'>Калуга</option>
	        	<option value='Каменск-Уральский'>Каменск-Уральский</option>
	        	<option value='Каменск-Шахтинский'>Каменск-Шахтинский</option>
	        	<option value='Канада'>Канада</option>
	        	<option value='Караганда'>Караганда</option>
	        	<option value='Карачаевск'>Карачаевск</option>
	        	<option value='Кемерово'>Кемерово</option>
	        	<option value='Керчь'>Керчь</option>
	        	<option value='Киров'>Киров</option>
	        	<option value='Кировоград'>Кировоград</option>
	        	<option value='Кирово-Чепецк'>Кирово-Чепецк</option>
	        	<option value='Кисловодск'>Кисловодск</option>
	        	<option value='Клин'>Клин</option>
	        	<option value='Ковров'>Ковров</option>
	        	<option value='Кокшетау'>Кокшетау</option>
	        	<option value='Коломна'>Коломна</option>
	        	<option value='Комсомольск-на-Амуре'>Комсомольск-на-Амуре</option>
	        	<option value='Королёв'>Королёв</option>
	        	<option value='Кострома'>Кострома</option>
	        	<option value='Краматорск'>Краматорск</option>
	        	<option value='Красногорск'>Красногорск</option>
	        	<option value='Краснодар'>Краснодар</option>
	        	<option value='Красноярск'>Красноярск</option>
	        	<option value='Кременчуг'>Кременчуг</option>
	        	<option value='Кривой Рог'>Кривой Рог</option>
	        	<option value='Крым'>Крым</option>
	        	<option value='Кстово'>Кстово</option>
	        	<option value='Курган'>Курган</option>
	        	<option value='Курск'>Курск</option>
	        	<option value='Кызыл'>Кызыл</option>
	        	<option value='Латвия'>Латвия</option>
	        	<option value='Липецк'>Липецк</option>
	        	<option value='Литваz>Литва</option>
	        	<option value='Луганск'>Луганск</option>
	        	<option value='Луцк'>Луцк</option>
	        	<option value='Львов'>Львов</option>
	        	<option value='Люберцы'>Люберцы</option>
	        	<option value='Магадан'>Магадан</option>
	        	<option value='Магнитогорск'>Магнитогорск</option>
	        	<option value='Майкоп'>Майкоп</option>
	        	<option value='Макеевка'>Макеевка</option>
	        	<option value='Мариуполь'>Мариуполь</option>
	        	<option value='Махачкала'>Махачкала</option>
	        	<option value='Междуреченск'>Междуреченск</option>
	        	<option value='Мексика'>Мексика</option>
	        	<option value='Мелитополь'>Мелитополь</option>
	        	<option value='Миасс'>Миасс</option>
	        	<option value='Минеральные Воды'>Минеральные Воды</option>
	        	<option value='Минск'>Минск</option>
	        	<option value='Могилев'>Могилев</option>
	        	<option value='Москва' selected='selected'>Москва</option>
	        	<option value='Мурманск'>Мурманск</option>
	        	<option value='Муром'>Муром</option>
	        	<option value='Мытищи'>Мытищи</option>
	        	<option value='Набережные Челны'>Набережные Челны</option>
	        	<option value='Назрань'>Назрань</option>
	        	<option value='Нальчик'>Нальчик</option>
	        	<option value='Находка'>Находка</option>
	        	<option value='Невинномысск'>Невинномысск</option>
	        	<option value='Нефтекамск'>Нефтекамск</option>
	        	<option value='Нижневартовск'>Нижневартовск</option>
	        	<option value='Нижнекамск'>Нижнекамск</option>
	        	<option value='Нижний Новгород'>Нижний Новгород</option>
	        	<option value='Нижний Тагил'>Нижний Тагил</option>
	        	<option value='Николаев'>Николаев</option>
	        	<option value='Новгород'>Новгород</option>
	        	<option value='Новокузнецк'>Новокузнецк</option>
	        	<option value='Новомосковск'>Новомосковск</option>
	        	<option value='Новороссийск'>Новороссийск</option>
	        	<option value='Новосибирск'>Новосибирск</option>
	        	<option value='Новоуральск'>Новоуральск</option>
	        	<option value='Новочеркасск'>Новочеркасск</option>
	        	<option value='Ногинск'>Ногинск</option>
	        	<option value='Норильск'>Норильск</option>
	        	<option value='Обнинск'>Обнинск</option>
	        	<option value='Одесса'>Одесса</option>
	        	<option value='Одинцово'>Одинцово</option>
	        	<option value='Озерск'>Озерск</option>
	        	<option value='Омск'>Омск</option>
	        	<option value='Орел'>Орел</option>
	        	<option value='Оренбург'>Оренбург</option>
	        	<option value='Орехово-Зуево'>Орехово-Зуево</option>
	        	<option value='Орск'>Орск</option>
	        	<option value='Павловский Посад'>Павловский Посад</option>
	        	<option value='Павлодар'>Павлодар</option>
	        	<option value='Пенза'>Пенза</option>
	        	<option value='Первоуральск'>Первоуральск</option>
	        	<option value='Переславль'>Переславль</option>
	        	<option value='Пермь'>Пермь</option>
	        	<option value='Петрозаводск'>Петрозаводск</option>
	        	<option value='Петропавловск-Камчатский'>Петропавловск-Камчатский</option>
	        	<option value='Поволжье'>Поволжье</option>
	        	<option value='Подольск'>Подольск</option>
	        	<option value='Полтава'>Полтава</option>
	        	<option value='Прокопьевск'>Прокопьевск</option>
	        	<option value='Псков'>Псков</option>
	        	<option value='Пушкино'>Пушкино</option>
	        	<option value='Пущино'>Пущино</option>
	        	<option value='Пятигорск'>Пятигорск</option>
	        	<option value='Раменское'>Раменское</option>
	        	<option value='Реутов'>Реутов</option>
	        	<option value='Ржев'>Ржев</option>
	        	<option value='Ровно'>Ровно</option>
	        	<option value='Ростов'>Ростов</option>
	        	<option value='Ростов-на-Дону'>Ростов-на-Дону</option>
	        	<option value='Рубцовск'>Рубцовск</option>
	        	<option value='Рыбинск'>Рыбинск</option>
	        	<option value='Рязань'>Рязань</option>
	        	<option value='Салават'>Салават</option>
	        	<option value='Салехард'>Салехард</option>
	        	<option value='Самара'>Самара</option>
	        	<option value='Санкт-Петербург'>Санкт-Петербург</option>
	        	<option value='Саранск'>Саранск</option>
	        	<option value='Сарапул'>Сарапул</option>
	        	<option value='Саратов'>Саратов</option>
	        	<option value='Саров'>Саров</option>
	        	<option value='Сатис'>Сатис</option>
	        	<option value='Сатка'>Сатка</option>
	        	<option value='Саяногорск'>Саяногорск</option>
	        	<option value='Севастополь'>Севастополь</option>
	        	<option value='Северодвинск'>Северодвинск</option>
	        	<option value='Северск'>Северск</option>
	        	<option value='Семей'>Семей</option>
	        	<option value='Сергиев Посад'>Сергиев Посад</option>
	        	<option value='Серпухов'>Серпухов</option>
	        	<option value='Симферополь'>Симферополь</option>
	        	<option value='Смоленск'>Смоленск</option>
	        	<option value='Снежинск'>Снежинск</option>
	        	<option value='Соликамск'>Соликамск</option>
	        	<option value='Солнечногорск'>Солнечногорск</option>
	        	<option value='Сортавала'>Сортавала</option>
	        	<option value='Сочи'>Сочи</option>
	        	<option value='Ставрополь'>Ставрополь</option>
	        	<option value='СтарыйОскол'>СтарыйОскол</option>
	        	<option value='Стерлитамак'>Стерлитамак</option>
	        	<option value='Ступино'>Ступино</option>
	        	<option value='Суздаль'>Суздаль</option>
	        	<option value='Сумы'>Сумы</option>
	        	<option value='Сургут'>Сургут</option>
	        	<option value='Сызрань'>Сызрань</option>
	        	<option value='Сыктывкар'>Сыктывкар</option>
	        	<option value='Таганрог'>Таганрог</option>
	        	<option value='Талдыкорган'>Талдыкорган</option>
	        	<option value='Тамбов'>Тамбов</option>
	        	<option value='Тверь'>Тверь</option>
	        	<option value='Тернополь'>Тернополь</option>
	        	<option value='Тобольск'>Тобольск</option>
	        	<option value='Тольятти'>Тольятти</option>
	        	<option value='Томск'>Томск</option>
	        	<option value='Троицк'>Троицк</option>
	        	<option value='Туапсе'>Туапсе</option>
	        	<option value='Тула'>Тула</option>
	        	<option value='Тында'>Тында</option>
	        	<option value='Тюмень'>Тюмень</option>
	        	<option value='Углич'>Углич</option>
	        	<option value='Ужгород'>Ужгород</option>
	        	<option value='Улан-Удэ'>Улан-Удэ</option>
	        	<option value='Ульяновск'>Ульяновск</option>
	        	<option value='Уссурийск'>Уссурийск</option>
	        	<option value='Усть-Илимск'>Усть-Илимск</option>
	        	<option value='Усть-Каменогорск'>Усть-Каменогорск</option>
	        	<option value='Усть-Кут'>Усть-Кут</option>
	        	<option value='Усть-Катав'>Усть-Катав</option>
	        	<option value='Усть-Лабинск'>Усть-Лабинск</option>
	        	<option value='Усть-Джегуда'>Усть-Джегуда</option>
	        	<option value='Усть-Камчатск'>Усть-Камчатск</option>
	        	<option value='Усть-Чорно'>Усть-Чорно</option>
	        	<option value='Усть-Колманка'>Усть-Колманка</option>
	        	<option value='Усте-Зеленое'>Усте-Зеленое</option>
	        	<option value='Уфа'>Уфа</option>
	        	<option value='Ухта'>Ухта</option>
	        	<option value='Хабаровск'>Хабаровск</option>
	        	<option value='Ханты-Мансийск'>Ханты-Мансийск</option>
	        	<option value='Харьков'>Харьков</option>
	        	<option value='Херсон'>Херсон</option>
	        	<option value='Химки'>Химки</option>
	        	<option value='Хмельницкий'>Хмельницкий</option>
	        	<option value='Чебоксары'>Чебоксары</option>
	        	<option value='Челябинск'>Челябинск</option>
	        	<option value='Череповец'>Череповец</option>
	        	<option value='Черкассы'>Черкассы</option>
	        	<option value='Черкесск'>Черкесск</option>
	        	<option value='Чернигов'>Чернигов</option>
	        	<option value='Черновцы'>Черновцы</option>
	        	<option value='Черноголовка'>Черноголовка</option>
	        	<option value='Чехов'>Чехов</option>
	        	<option value='Чимкент'>Чимкент</option>
	        	<option value='Чита'>Чита</option>
	        	<option value='Шахты'>Шахты</option>
	        	<option value='Щелково'>Щелково</option>
	        	<option value='Электросталь'>Электросталь</option>
	        	<option value='Элиста'>Элиста</option>
	        	<option value='Энгельс'>Энгельс</option>
	        	<option value='Южно-Сахалинск'>Южно-Сахалинск</option>
	        	<option value='Якутск'>Якутск</option>
	        	<option value='Ялта'>Ялта</option>
	        	<option value='Ярославль'>Ярославль</option>
	        </select>",

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
			<input class='uy-input-text' name='min-initial-instalment' valid='^[0-9 ]{1,}$'>
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