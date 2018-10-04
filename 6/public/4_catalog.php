<?php
header("Content-type: text/html; charset=utf-8");
include __DIR__ . '/../config/config.php';
include ENGINE_DIR . 'catalog.php';
include ENGINE_DIR . 'main.php';

$catalog = getCatalog();
$images = getMainImgArray();
closeConnection();

include TEMPLATES_DIR . 'catalog.php';

?>