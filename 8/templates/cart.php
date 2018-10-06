<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Корзина</title>
	<style>
		body {
			font-family: "Open Sans";
		}
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
		button {
			cursor: pointer;
			border: 1px solid grey;
		}
		.big__button {
			font-size: 18px;
			padding: 10px;
			margin-right: 20px;
		}
		.order {
			background-color: green;
		}
		.clean {
			background-color: indianred;
		}
		.delete {
			font-size: 12px;
			padding: 5px;
			background-color: dodgerblue;
		}
		.empty-cart {
			margin: 20px;
			font-size: 30px;
		}
	</style>
</head>
<body>
<?php include TEMPLATES_DIR . 'header.php' ?>
<div class="catalog-div">
	<p class="empty-cart"><?= $emptyCartMessage ?></p>
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
				<button name="id" value="<?= $product["id"] ?>" class="delete">Delete from cart</button>
			</form>
		</div>
	<?php endforeach; ?>
</div>
<form action="order.php" method="post">
	<button formaction="order.php" name="order" value="yes" class="big__button order">Оформить заказ</button>
	<button formaction="cart.php" name="clean" value="yes" class="big__button clean">Очистить корзину</button>
</form>
</body>
</html>