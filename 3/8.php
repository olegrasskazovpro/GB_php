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

	$filtVal = startWith($val, 'К'); // first pre-filter $val array

	if (count($filtVal) > 0) {

		$lastIdx = count($filtVal) - 1;

		echoValsWithComma($lastIdx, $filtVal);
		echoLastVal($lastIdx, $filtVal);

	} else {
		continue;
	}
}

function echoValsWithComma ($lastIdx, $filtVal) {
	for ($i = 0; $i < $lastIdx; $i++) {
		$valWithComma = $filtVal[$i];
		if (first($valWithComma, 'К')) {
			echo "$valWithComma, ";
		}
	}
}

function echoLastVal($lastIdx, $filtVal) {
	$last = $filtVal[$lastIdx];
	echo "$last<br>";
}

function startWith($arr, $reg) {

	$newArr = [];

	for ($i = 0; $i < count($arr); $i++) {
		$x = stripos($arr[$i], $reg);
		if ($x === 0) {
			array_push($newArr, $arr[$i]);
		};
	}

	return $newArr;
};