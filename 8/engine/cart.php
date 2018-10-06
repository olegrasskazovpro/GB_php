<?php
require_once ENGINE_DIR . 'db.php';
session_start();

function getMainImage($product_id){
	$sql = "SELECT img FROM images WHERE product_id = {$product_id} && main = 1";
	return queryOne($sql);
}

function getCartProducts($cart){
	$cartProducts = [];
	foreach ($cart as $id => $qty){
		$oneProduct = getOneProduct($id);
		$oneProduct['qty'] = $qty;
		$oneProduct['img'] = getMainImage($id)['img'];
		array_push($cartProducts, $oneProduct);
	}
	closeConnection();
	return $cartProducts;
}

function addToCart($id, $qty) {
	if(!isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id] = $qty;
	} else {
		$_SESSION['cart'][$id] += $qty;
	}
}

function deleteFromCart($id) {
	unset($_SESSION['cart'][$id]);
}

function cleanCart(){
	unset($_SESSION['cart']);
	redirect('cart.php');
}