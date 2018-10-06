<?php
include __DIR__ . '/../config/config.php';
require_once ENGINE_DIR . 'main.php';
require_once ENGINE_DIR . 'cart.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$id = (int) $_POST['id'];
	$qty = (int) $_POST['qty'] ?: 1;

	addToCart($id, $qty);
	redirect($_SERVER['HTTP_REFERER']);
}