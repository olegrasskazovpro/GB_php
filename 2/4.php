<?php

$a = 3;
$b = 5;
$operation = '/';

function mathOperation($a, $b, $operation) {
	switch ($operation) {
		case '+': return sum($a, $b);
		case '-': return sub($a, $b);
		case '*': return multi($a, $b);
		case '/': return div($a, $b);
	}
};

function sum($a, $b){
	return $a + $b;
};

function sub($a, $b){
	return $a - $b;
};

function multi($a, $b){
	return $a * $b;
};

function div($a, $b){
	return $a / $b;
};

echo "$a $operation $b = " . mathOperation($a, $b, $operation);
?>