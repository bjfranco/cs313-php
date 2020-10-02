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


		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<?php
		if (isset($_SESSION["cart_yellow"])) {
			echo "<input type="checkbox" name="remove_yellow"><p>1 x Yellow 1.75mm PLA - $20</p><br>";
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

		<input type="submit" name="submit" value="Remove Item(s)" id="return_button">
		<a href="browse.php" id="return_button">Return to Browse</a><br><br><br>
		<a href="checkout.php" id="return_button">Proceed to Checkout</a><br><br><br>
		</form>

		<?php
		if (isset($_POST["remove_yellow"])) {
			$_SESSION["cart_yellow"] = "";
		}
		?>

	</div>

</body>
</html>