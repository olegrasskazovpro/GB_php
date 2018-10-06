<?php
require_once ENGINE_DIR . 'db.php';

function hashPassword($password) {
	$salt = md5(uniqid('some_prefix', true));
	$salt = substr(strtr(base64_encode($salt), '+', '.'), 0, 22);
	return crypt($password, '$2a$08$' . $salt);
}

function regUser($name, $login, $pass){
	execute("INSERT INTO users (name, login, password) VALUES ('{$name}', '{$login}', '{$pass}')");
}