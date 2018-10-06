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
		table, tr, td {
			border: 1px solid grey;
		}
		td {
			padding: 10px;
		}
		.table__header {
			background-color: darkseagreen;
			text-align: center;
			font-weight: bold;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?php include TEMPLATES_DIR . 'header.php'?>
<p>Добро пожаловать, <?= $_SESSION['username'] ?>!</p>
<p>Ваш логин: <?= $_SESSION['login'] ?></p>
<a href="login.php?logout=yes"><button>Выйти</button></a>
<div>
	<h2>Ваши заказы</h2>
	<table>
		<thead>
		<tr>
			<td class="table__header">Order id</td>
			<td class="table__header">Order products</td>
			<td class="table__header">Total</td>
			<td class="table__header">Status</td>
			<td class="table__header">Cancel order</td>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($user_orders as $key => $order) :?>
		<tr>
			<td><?= $key ?></td>
			<td><?= $order['product_titles'] ?></td>
			<td>$ <?= $order['total'] ?></td>
			<td><?= $order['status'] ?></td>
			<td>
				<form action="order.php" method="post">
					<button name="cancel_order_id" value="<?= $key ?>" class="cancel_order">Отменить</button>
				</form>
			</td>
		</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
<script>
	$(function () {
		$('.cancel_order').click(function (event) {
			event.preventDefault();
			let id = $(this).val();
			$.ajax({
				method: 'POST',
				url: 'order.php',
				data: {
					'cancel_order_id': id
				},
				success: (response) => {
					response = JSON.parse(response);
					if(response.result === 'ok'){
						$(this).closest('tr').remove();
						alert(response.message);
					} else {
						alert(response.message);
					}
				}
			})
		})
	})
</script>
</body>
</html>