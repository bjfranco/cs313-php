<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
	<title>Shopping Cart</title>
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
		<h2>Shopping Cart</h2>
		<form action="checkout.php" method="post">
		<?php
		if (isset($_SESSION["cart_yellow"])) {
			echo "1 x Yellow 1.75mm PLA - $20<br>";
			$_SESSION["total_yellow"] = 20;
		}
		if (isset($_SESSION["cart_gray"])) {
			echo "1 x Gray 1.75mm PLA - $20<br>";
			$_SESSION["total_gray"] = 20;
		}
		if (isset($_SESSION["cart_white"])) {
			echo "1 x White 1.75mm PLA - $20<br>";
			$_SESSION["total_white"] = 20;
		}
		$_SESSION["total"] = $_SESSION["total_yellow"] + $_SESSION["total_gray"] + $_SESSION["total_white"];
		echo "<h3>Total: $" . $_SESSION["total"] . "</h3></br>";
		?>
		<a href="browse.php" id="return_button">Return to Browse</a><br><br><br>
		<input type="submit" name="submit" value="Proceed To Checkout" id="return_button">
		</form>
	</div>

</body>
</html>