<?php
header("Content-type: text/html; charset=utf-8");
include __DIR__ . '/../config/config.php';
include ENGINE_DIR . 'registration.php';
include ENGINE_DIR . 'main.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$login = $_POST['login'];
	$pass = $_POST['password'];
	$pass = hashPassword($pass);

	regUser($name, $login, $pass);
	closeConnection();
}

include TEMPLATES_DIR . 'registration.php';
?>