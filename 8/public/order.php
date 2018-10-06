<?php
include __DIR__ . '/../config/config.php';
require_once ENGINE_DIR . 'db.php';
require_once ENGINE_DIR . 'main.php';
require_once ENGINE_DIR . 'cart.php';
require_once ENGINE_DIR . 'orders.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($_POST['order'] == 'yes') {
		if (isAuth()) {
			if (count($_SESSION['cart'])) {
				$orderId = createOrder($_SESSION['user_id']);
				createOrderBox($orderId, $_SESSION['cart']);
				closeConnection();
				cleanCart();
				redirect('user.php');
			}
		}
	}
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($_POST['cancel_order_id']) {
		$result = deleteOrder($_POST['cancel_order_id']);
		echo json_encode($result);
	}
}

function isAuth()
{
	return $_SESSION['isAuth'] == 1;
}