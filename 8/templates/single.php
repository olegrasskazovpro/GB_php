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
<?php include TEMPLATES_DIR . 'header.php'?>
<div class="catalog-div">
	<div class="images">
		<?php foreach ($images as $value): ?>
			<img src="img/<?= $value["img"] ?>" alt="<?= $product["title"] ?>">
		<?php endforeach; ?>
	</div>
	<h2><?= $product["title"] ?></h2>
	<h3>$<?= $product["price"] ?></h3>
	<p><?= $product["desc"] ?></p>
	<form action="addtocart.php" method="post">
		<input type="number" name="qty">
		<button name="id" value="<?= $product['id']?>">Add to cart</button>
	</form>
</div>
</body>
</html>