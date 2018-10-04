<?php

function check($a, $b) {
	if ($a !== "0" && $b !== "0") {
		return ((int)$a !== 0 && (int)$b !== 0);
	} else if ($a !== "0" XOR $b !== "0") {
		return ((int)$a !== 0 XOR (int)$b !== 0);
	} else {
		return true;
	}
}

function calc($a, $b, $op){
		if ($op === "plus") {
			return $a + $b;
		} else if ($op === "minus") {
			return $a - $b;
		} else if ($op === "multi") {
			return $a * $b;
		} else {
			if ($b !== "0") {
				return $a / $b;
			} else {
				return "Деление на ноль даст бесконечно большое число";
			}
		}
}