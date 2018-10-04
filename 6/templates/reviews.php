<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Отзывы</title>
	<style>
		form {
			border: 2px dotted red;
			width: fit-content;
		}

		input, textarea {
			display: block;
			width: 300px;
			margin: 10px;
			padding: 10px;
			font-size: 16px;
		}

		textarea {
			height: 100px;
		}

		input[type="submit"] {
			background: green;
			cursor: pointer;
			color: whitesmoke;
		}
	</style>
</head>
<body>
<div class="review-div">
	<?php foreach ($reviews as $value): ?>
		<div class="review">
			<h2><?= $value["name"] ?></h2>
			<h3><?= $value["date"] ?></h3>
			<p><?= $value["review"] ?></p>
		</div>
	<?php endforeach; ?>
</div>

<h2>ОСТАВЬ СВОЙ СЛЕД</h2>
<form action="" method="POST">
	<input type="text" name="name" placeholder="Здесь пиши свое Имя" required>
	<textarea name="review" placeholder="А сюда пиши свой отзыв" required></textarea>
	<input type="submit" value="ПОСЛАТЬ ОТЗЫВ">
</form>
</body>
</html>