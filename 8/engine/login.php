<?php
require_once ENGINE_DIR . 'db.php';

function confirmPassword($hash, $password) {
	return crypt($password, $hash) === $hash;
}

function hashPassword($password) {
	$salt = md5(uniqid('some_prefix', true));
	$salt = substr(strtr(base64_encode($salt), '+', '.'), 0, 22);
	return crypt($password, '$2a$08$' . $salt);
}

function getUser($login){
	$sql = "SELECT * FROM users WHERE login = '{$login}'";
	return queryOne($sql);
}

function checkUserPass($user, $password){
	if($user) {
		if(confirmPassword($user["password"], $password)) {
			$_SESSION['isAuth'] = 1;
			$_SESSION['user_id'] = $user['id'];
		}
	}
}

function logInRedirect(){
	if($_SESSION['isAuth'] === 1){
		redirect('user.php');
	} else {
		redirect('login.php?auth=fail');
	}
}

function logOut(){
	$_SESSION['isAuth'] = -1;
}