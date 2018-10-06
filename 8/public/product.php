<?php
header("Content-type: text/html; charset=utf-8");
include __DIR__ . '/../config/config.php';
require_once ENGINE_DIR . 'main.php';
require_once ENGINE_DIR . 'product.php';

include TEMPLATES_DIR . 'product.php';

?>