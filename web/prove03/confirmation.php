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
			echo "1 x Yellow 1.75mm PLA<br>";
		}
		if (isset($_SESSION["cart_gray"])) {
			echo "1 x Gray 1.75mm PLA<br>";
		}
		if (isset($_SESSION["cart_white"])) {
			echo "1 x White 1.75mm PLA<br>";
		}
		echo "<br>Total: $" . $_SESSION["total"] . "<br>";

		echo "<h3>Shipping Address</h3>";
		echo $_POST["street"] . "<br>";
		echo $_POST["city"] . ", " . $_POST["state"] . " " . $_POST["zip"]; 
		?>

		<?php
		//end the session
		session_unset();
		session_destroy();
		?>
	</div>

</body>
</html>