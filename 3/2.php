<?php

$i = 0;

do {
	if ($i === 0) {
		echo "$i - это ноль<br>";
	} else {
		if ($i % 2 !== 0) {
			echo "$i - НЕчетное число<br>";
		} else {
			echo "$i - четное число<br>";
		}
	}
	$i++;
} while ($i <= 10);