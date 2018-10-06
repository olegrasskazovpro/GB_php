<?php
header("Content-type: text/html; charset=utf-8");
include __DIR__ . '/../config/config.php';
include ENGINE_DIR . 'login.php';
include ENGINE_DIR . 'main.php';

if($_GET['logout'] == 'yes'){
	logOut();
}

if($_SESSION['isAuth'] !== 1) {
	if($_GET["auth"] === 'fail') {
		$errorMsg = "<p class='error'>Неверный логин или пароль</p>";
	}

	$_SESSION['isAuth'] = -1;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$login = $_POST['login'];
		$password = $_POST['password'];

		$user = getUser($login);
		$_SESSION['username'] = $user["name"];
		$_SESSION['login'] = $user["login"];
		closeConnection();

		$_SESSION['isAuth'] = 0;

		checkUserPass($user, $password);
		logInRedirect();
	}
} else {
	redirect('user.php');
}

include TEMPLATES_DIR . 'login.php';
?>