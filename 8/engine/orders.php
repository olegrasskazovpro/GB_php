<?php
header("Content-type: text/html; charset=utf-8");
require_once __DIR__ . '/../config/config.php';
require_once ENGINE_DIR . 'main.php';
require_once ENGINE_DIR . 'db.php';

function createOrder($id){
	$sql = "INSERT INTO orders (user_id) VALUES ('{$id}')";
	execute($sql);
	return getInsertedId();
}

function createOrderBox($orderId, $cart){
	foreach ($cart as $prod => $qty){
		$sql = "INSERT INTO order_box (order_id, product, qty) VALUES ('{$orderId}', '$prod', '$qty')";
		execute($sql);
	}
}

function prepareOrdersArray($user_id){
	$user_orders = [];
	$userOrders = getUserOrders($user_id);

	foreach ($userOrders as $order){
		$order_id = $order['id'];
		$orderBox = getProdQty($order_id);
		$product_ids = getProductIds($orderBox);
		$products_info = getProductsInfo($product_ids);
		$product_titles = getProductsTitles($products_info);
		$orderTotal = getOrderTotal($orderBox, $products_info);

		$user_orders[$order_id]['product_titles'] = $product_titles;
		$user_orders[$order_id]['total'] = $orderTotal;
		$user_orders[$order_id]['status'] = $order['status'];
	}
	closeConnection();
	return $user_orders;
}

function getUserOrders($user_id){
	$sql = "SELECT id, status FROM orders WHERE user_id = {$user_id}";
	return queryAll($sql);
}

function getProdQty($order_id){
	$sql = "SELECT product, qty FROM order_box WHERE order_id = {$order_id}";
	return queryAll($sql);
}

function getProductsInfo(array $product_ids){
	$product_ids = implode(", ", $product_ids);
	$sql = "SELECT id, title, price FROM catalog WHERE id IN ({$product_ids})";
	return queryAll($sql);
}

function getProductIds($orderBox){
	$product_id = [];
	foreach ($orderBox as $product){
		array_push($product_id, $product['product']);
	}
	return $product_id;
}

function getProductsTitles(array $products_info){
	$product_titles = '';
	foreach ($products_info as $product){
		$product_titles .= $product['title'] . ', ';
	}
	$product_titles = substr($product_titles, 0, -2); // delete last ', '
	return $product_titles;
}

function getOrderTotal($orderBox, $products_info){
	$orderTotal = 0;
	foreach ($orderBox as $prod1){
		foreach ($products_info as $prod2){
			if($prod1['product'] == $prod2['id']){
				$orderTotal += (int)$prod1['qty'] * (float)$prod2['price'];
			}
		}
	}
	return $orderTotal;
}

function getOneOrder($order_id){
	$sql = "SELECT id, status FROM orders WHERE id = {$order_id}";
	return queryOne($sql);
}

function deleteOrder($order_id){
	$order = getOneOrder($order_id);
	if($order['status'] !== 'done'){
		$sql = "DELETE FROM orders WHERE id = '{$order_id}'";
		execute($sql);
		return ['result' => 'ok', 'message' => 'Заказ был успешно удален'];
	} else {
		return ['result' => '0', 'message' => 'Заказа НЕ может быть удален'];
	}
}