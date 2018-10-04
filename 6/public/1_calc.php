<?php
header("Content-type: text/html; charset=utf-8");
include __DIR__ . '/../engine/config.engine';
include_once ROOT . 'engine/calc.php';

$a = $_GET["num1"];
$b = $_GET["num2"];
$op = $_GET["op"];

if ($_GET){
	if (!check($a, $b)) {
		$result = "В поля нужно ввести целые числа";
	} else {
		$result = calc($a, $b, $op);
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Калькуляторище</title>
	<style>
		form {
			display: flex;
		}

		input, select, span {
			margin: 10px;
		}
	</style>
</head>
<body>
<form action="" method="GET">
	<input type="text" name="num1" placeholder="Введите первое число">
	<input type="text" name="num2" placeholder="Введите второе число">
	<select name="op" id="op">
		<option value="plus">+</option>
		<option value="minus">-</option>
		<option value="multi">*</option>
		<option value="devide">/</option>
	</select>
	<input type="submit" value="РАВНО">
	<span><?= $result ?></span>
</form>
</body>
</html>