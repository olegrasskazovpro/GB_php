<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User</title>
	<style>
		button {
			cursor: pointer;
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
<p>Добро пожаловать, <?= $_SESSION['username'] ?>!</p>
<p>Ваш логин: <?= $_SESSION['login'] ?></p>
<a href="login.php?logout=yes"><button>Выйти</button></a>
</body>
</html>