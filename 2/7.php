<?php
header("Content-type: text/html; charset=utf-8");
/*
Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты
*/

$h = date('H', time() + 10800);
$m = date('i');

$hWord = getWord($h, 'h');
$mWord = getWord($m);

function getWord($t , $val = '') {
	$last = $t % 10;

    if ($last === 1 && !($t > 10 && $t < 20)) {
        return ($val) ? 'час' : 'минута';
    } else if (($last > 1 && $last < 5) && !($t > 10 && $t < 20)) {
        return ($val) ? 'часа' : 'минуты';
    } else {
        return ($val) ? 'часов' : 'минут';
    }
}

echo "$h $hWord $m $mWord";
?>