<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Корзина</title>
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
<?php include TEMPLATES_DIR . 'header.php' ?>
<div class="catalog-div">
	<?php foreach ($cartProducts as $product): ?>
		<div>
			<a href="single.php?id=<?= $product["id"] ?>" class="single">
				<div class="img__single">
					<img src="img/<?= $product["img"] ?>" alt="<?= $product["name"] ?>">
				</div>
				<h2><?= $product["title"] ?></h2>
				<h3>Цена за шт.: $<?= $product["price"] ?></h3>
				<p>Количество: <?= $product["qty"] ?></p>
				<h3>Subtotal: $<?= (int)$product["price"] * $product["qty"]?></h3>
			</a>
			<form action="deletefromcart.php" method="post">
				<button name="id" value="<?= $product["id"] ?>">Delete from cart</button>
			</form>
		</div>
	<?php endforeach; ?>
</div>
</body>
</html>