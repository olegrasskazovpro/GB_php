<?php

$a = 2;
$b = 5;

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

echo "$a + $b = " . sum($a, $b) . "<br>";
echo "$a - $b = " . sub($a, $b) . "<br>";
echo "$a * $b = " . multi($a, $b) . "<br>";
echo "$a / $b = " . div($a, $b) . "<br>";
?>