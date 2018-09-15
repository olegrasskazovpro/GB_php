<?php

$arr = [
	'Московская область' => [
		'Москва',
		'Зеленоград',
		'Клин',
	],
	'Ленинградская область' => [
		'Санкт-Петербург',
		'Пушкин',
		'Павловск',
		'Всеволожск',
	],
	'Красноярский край' => [
		'Красноярск',
		'Зеленогорск',
		'Норильск',
	]
];

foreach ($arr as $key => $val) {
	echo "$key:<br>";

	$lastIdx = count($val) - 1;

	for ($i = 0; $i < $lastIdx; $i++) {
		$valWithComma = $val[$i];
		echo "$valWithComma, ";
	}

	$last = $val[$lastIdx];
	echo "$last<br>";
}