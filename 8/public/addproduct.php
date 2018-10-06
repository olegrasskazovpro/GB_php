<?php
include __DIR__ . '/../config/config.php';
require_once ENGINE_DIR . 'main.php';
require_once ENGINE_DIR . 'product.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$imgName = loadFile('img', IMG_DIR);
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$price = $_POST['price'];

	addProduct($title, $desc, $price, $imgName);
	closeConnection();
	redirect('catalog.php');
}

?>