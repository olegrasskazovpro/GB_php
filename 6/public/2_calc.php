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
	<input type="submit" name="op" value="plus">
	<input type="submit" name="op" value="minus">
	<input type="submit" name="op" value="multi">
	<input type="submit" name="op" value="devide">
	<span><?= $result ?></span>
</form>
</body>
</html>