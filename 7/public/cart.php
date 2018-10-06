<?php
header("Content-type: text/html; charset=utf-8");
include __DIR__ . '/../config/config.php';
include ENGINE_DIR . 'catalog.php';
include ENGINE_DIR . 'cart.php';
include ENGINE_DIR . 'main.php';
session_start();

if (isset($_SESSION['cart'])){
	$cartProducts = getCartProducts($_SESSION['cart']);
} else {
	$content = 'Ваша корзина пуста';
}

include TEMPLATES_DIR . 'cart.php';