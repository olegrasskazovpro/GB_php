<?php

$a = -3;
$b = 5;

/**
 * если $a и $b положительные, вывести $a - $b;
 * если $а и $b отрицательные, вывести $a * $b;
 * если $а и $b разных знаков, вывести $a + $b;
 * @param Int $a
 * @param Int $b
 * @return Int mixed
 */
$foo = function ($a, $b) {
	if ($a >= 0 && $b >= 0) {
		return $a - $b;
	} else if ($a < 0 && $b < 0) {
		return $a * $b;
	} else if (($a < 0 && $b >= 0) || ($a >= 0 && $b < 0)) {
		return $a + $b;
	} else {
		return 'Нужно ввести число';
	}
};

echo $foo($a, $b);