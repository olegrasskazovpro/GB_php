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
<div class="catalog-div">
	<?php foreach ($catalog as $val): ?>
		<div>
			<a href="single.php?id=<?= $val["id"] ?>" class="single">
				<div class="img__single">
					<img src="img/<?= $images[$val["id"]] ?>" alt="<?= $val["name"] ?>">
				</div>
				<h2><?= $val["title"] ?></h2>
				<h3><?= $val["price"] ?></h3>
			</a>
			<form action="addtocart.php" method="post">
				<button name="id" value="<?= $val["id"]?>">Add to cart</button>
			</form>
		</div>
	<?php endforeach; ?>
</div>
</body>
</html>