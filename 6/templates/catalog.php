<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Отзывы</title>
	<style>
		.catalog-div {
			display: flex;
			flex-wrap: wrap;
		}
		.single {
			display: block;
		}
		.img__single {
			width: 300px;
			height: 200px;
		}
		img {
			height: 100%;
		}
		a {
			text-decoration-line: none;
		}
		h2, h3 {
			font-family: "Open Sans";
			color: #2f2f2f;
		}
		h3 {
			color: rebeccapurple;
		}
	</style>
</head>
<body>
<div class="catalog-div">
	<?php foreach ($catalog as $val): ?>
		<a href="4_single.php?id=<?= $val["id"] ?>" class="single">
			<div class="img__single">
				<img src="img/<?= $images[$val["id"]] ?>" alt="<?= $val["name"] ?>">
			</div>
			<h2><?= $val["title"] ?></h2>
			<h3><?= $val["price"] ?></h3>
		</a>
	<?php endforeach; ?>
</div>
</body>
</html>