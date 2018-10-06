<?php
include __DIR__ . '/../config/config.php';
require_once ENGINE_DIR . 'main.php';
require_once ENGINE_DIR . 'product.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$id = (int) $_POST['id'];

	deleteProduct($id);
	closeConnection();
	redirect('catalog.php');
}

?>