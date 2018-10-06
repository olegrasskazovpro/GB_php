<?php
header("Content-type: text/html; charset=utf-8");
include __DIR__ . '/../config/config.php';
include ENGINE_DIR . 'login.php';
include ENGINE_DIR . 'main.php';

if ($_SESSION['isAuth'] !== 1) {
	redirect('login.php');
}

include TEMPLATES_DIR . 'user.php';
?>