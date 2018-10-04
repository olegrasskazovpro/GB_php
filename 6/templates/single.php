<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Отзывы</title>
	<style>
		.images {
			display: flex;
			flex-wrap: wrap;
		}
		img {
			height: 200px;
		}
		h3 {
			color: red;
		}
	</style>
</head>
<body>
<div class="catalog-div">
	<div class="images">
		<?php foreach ($images as $value): ?>
			<img src="img/<?= $value["img"] ?>" alt="<?= $product["title"] ?>">
		<?php endforeach; ?>
	</div>
	<h2><?= $product["title"] ?></h2>
	<h3>$<?= $product["price"] ?></h3>
	<p><?= $product["desc"] ?></p>
</div>
</body>
</html>