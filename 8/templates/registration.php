<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
	<style>
		form {
			width: 300px;
		}
		input {
			display: block;
			width: 100%;
			padding: 5px;
			border: 1px grey solid;
			margin: 10px;
		}
		input[type="submit"] {
			height: 40px;
			background-color: red;
			color: #fff;
			cursor: pointer;
			font-size: 18px;
		}
		ul {
			display: flex;
		}
		li {
			padding: 10px;
			list-style-type: none;
		}
	</style>
</head>
<body>
<?php include TEMPLATES_DIR . 'header.php'?>
<h1>Регистрация</h1>
<form action="" method="post">
	<input type="text" name="name" placeholder="Ваше Имя">
	<input type="text" name="login" placeholder="Логин">
	<input type="password" name="password" placeholder="Пароль">
	<input type="submit" value="SIGN UP">
</form>
<br>
<a href="login.php">Авторизация</a>
</body>
</html>