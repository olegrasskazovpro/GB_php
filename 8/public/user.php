<?php
header("Content-type: text/html; charset=utf-8");
include __DIR__ . '/../config/config.php';
include ENGINE_DIR . 'login.php';
include ENGINE_DIR . 'main.php';
include ENGINE_DIR . 'orders.php';

if ($_SESSION['isAuth'] !== 1) {
//	redirect('login.php');
}

$user_orders = prepareOrdersArray($_SESSION['user_id']);
var_dump($user_orders);
include TEMPLATES_DIR . 'user.php';
?>