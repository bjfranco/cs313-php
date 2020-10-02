<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
	<title>Purchase Confirmation</title>
</head>
<body>
	<header>
		<h1>3D Printer Supply Store</h1>
		<ul class="nav">
			<li><a href="checkout.php">Checkout</a></li>
			<li><a href="cart.php">View Cart</a></li>
			<li><a href="browse.php">Browse Items</a></li>
		</ul>
	</header>
	<div class="cart">
		<h2>Purchase Confirmation</h2>
		<?php
		if (isset($_SESSION["cart_yellow"])) {
			echo "You have purchased " . $_SESSION["cart_yellow"] . "<br>";
		}
		if (isset($_SESSION["cart_gray"])) {
			echo "You have purchased " . $_SESSION["cart_gray"] . "<br>";
		}
		if (isset($_SESSION["cart_white"])) {
			echo "You have purchased " . $_SESSION["cart_white"] . "<br>";
		}
		?>

		<?php
		//end the session
		session_unset();
		session_destroy();
		?>
	</div>

</body>
</html>