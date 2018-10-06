<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User</title>
	<style>
		button {
			cursor: pointer;
		}
		input {
			display: block;
			padding: 5px;
			margin: 10px 0;
		}
		ul {
			display: flex;
		}

		li {
			padding: 10px;
			list-style-type: none;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?php include TEMPLATES_DIR . 'header.php' ?>
<h2>Удалить товар из базы</h2>
<form action="deleteproduct.php" method="post">
	<input type="number" name="id" placeholder="Введите id товара">
	<input type="submit" value="Удалить товар">
</form>
<h2>Добавить товар в базу</h2>
<form action="addproduct.php" enctype="multipart/form-data" method="post">
	<input type="text" name="title" placeholder="Заголовок товара">
	<textarea name="desc" id="" cols="30" rows="10" placeholder="Описание товара"></textarea>
	<input type="number" name="price" placeholder="Цена товара">
	<input type="file" name="img" value="Фото товара">
	<input type="submit" value="Загрузить товар">
</form>
</body>
</html>