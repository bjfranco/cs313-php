<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
	<title>Checkout</title>
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
	<div class="checkout">
		<h2>Checkout</h2>
		<form action="confirmation.php" method="post">
			
		<label for="street">Address</label><br>
		<input type="text" name="street" id="street" placeholder="123 Main Street" required><br><br>

		<label for="state">State</label><br>
		<input type="text" name="state" id="state" placeholder="Arizona" required><br><br>

		<label for="city">City</label><br>
		<input type="city" name="city" placeholder="Phoenix" required><br><br>

		<label for="zip">Zip Code</label><br>
		<input type="zip" name="zip" placeholder="12345" required><br><br>

		<a href="cart.php" id="return_button">Return to Cart</a><br>
		<input type="submit" name="submit" value="Place Order" id="return_button">

		</form>


		<?php
		/*
		if (isset($_SESSION["cart_yellow"])) {
			echo "You added " . $_SESSION["cart_yellow"] . "<br>";
		}
		if (isset($_SESSION["cart_gray"])) {
			echo "You added " . $_SESSION["cart_gray"] . "<br>";
		}
		if (isset($_SESSION["cart_white"])) {
			echo "You added " . $_SESSION["cart_white"] . "<br>";
		}
		*/
		?>
	</div>

</body>
</html>