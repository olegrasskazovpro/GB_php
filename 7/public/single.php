<?php
header("Content-type: text/html; charset=utf-8");
include __DIR__ . '/../config/config.php';
include ENGINE_DIR . 'catalog.php';
include ENGINE_DIR . 'main.php';

$id = $_GET["id"];
$product = getOneProduct($id);
$images = getProductImages($id);
closeConnection();

include TEMPLATES_DIR . 'single.php';

?>