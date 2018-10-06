<?php
header("Content-type: text/html; charset=utf-8");
include __DIR__ . '/../config/config.php';
//require_once ENGINE_DIR . 'autoload.php';
include ENGINE_DIR . 'catalog.php';
include ENGINE_DIR . 'cart.php';
include ENGINE_DIR . 'main.php';
session_start();

if (count($_SESSION['cart'])){
	$cartProducts = getCartProducts($_SESSION['cart']);
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if ($_POST['clean'] == 'yes') {
			cleanCart();
		};
	}
} else {
	$emptyCartMessage = 'Ваша корзина пуста';
}

var_dump($_SESSION);

include TEMPLATES_DIR . 'cart.php';