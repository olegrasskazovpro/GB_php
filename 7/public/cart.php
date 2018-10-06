<?php
header("Content-type: text/html; charset=utf-8");
include __DIR__ . '/../config/config.php';
include ENGINE_DIR . 'catalog.php';
include ENGINE_DIR . 'cart.php';
include ENGINE_DIR . 'main.php';

$cart = $_SESSION['cart'];

if (isset($cart)){
	$cartProducts = getCartProducts($cart);
} else {
	$content = 'Ваша корзина пуста';
}

include TEMPLATES_DIR . 'cart.php';