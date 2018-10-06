<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Авторизация</title>
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
			background-color: green;
			color: #fff;
			cursor: pointer;
			font-size: 18px;
		}
		.error {
			color: red;
			text-align: center;
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
<h1>Авторизация</h1>
<form action="" method="post">
	<input type="text" name="login" placeholder="Логин">
	<input type="password" name="password" placeholder="Пароль">
	<?= $errorMsg ?>
	<input type="submit" value="SIGN IN">
</form>
<br>
<a href="registration.php">Регистрация</a>
</body>
</html>