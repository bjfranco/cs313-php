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
	<div>
		<h2>Checkout</h2>
		<form action="confirmation.php" method="post">
			
		<label for="street">Address</label>
		<input type="text" name="street" id="street" placeholder="123 Main Street">

		<label for="state">State</label>
		<input type="text" name="state" id="state" placeholder="Arizona">

		<label for="city">City</label>
		<input type="city" name="city" placeholder="Phoenix">

		<label for="zip">Zip Code</label>
		<input type="zip" name="zip" placeholder="12345">

		<a href="cart.php" id="return_button">Return to Cart</a>
		<input type="submit" name="submit" value="Place Order">

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