<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
	<title>Browse Items</title>
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

	<div class="flex_container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<div class="column">
				<img src="yellow.jpeg">
				<h2>Yellow 1.75mm PLA</h2>
				<h3>$20</h3>
				<label for="yellow">Select</label>
				<input type="checkbox" name="yellow" value="yellow" id="yellow">
			</div>
			
			<div class="column">
				<img src="gray.jpg">
				<h2>Gray 1.75mm PLA</h2>
				<h3>$20</h3>
				<label for="gray">Select</label>
				<input type="checkbox" name="gray" value="gray" id="gray">
			</div>
			
			<div class="column">
				<img src="white.jpg">
				<h2>White 1.75mm PLA</h2>
				<h3>$20</h3>
				<label for="white">Select</label>
				<input type="checkbox" name="white" value="white" id="white">
			</div>

			<input type="submit" name="submit" value="Add To Cart" id="submit">
		</form>


		<?php
		if (isset($_POST["yellow"])) {
			$_SESSION["cart_yellow"] = $_POST["yellow"];
			echo "You added " . $_SESSION["cart_yellow"] . "<br>";
		}
		if (isset($_POST["gray"])) {
			$_SESSION["cart_gray"] = $_POST["gray"];
			echo "You added " . $_SESSION["cart_gray"] . "<br>";
		}
		if (isset($_POST["white"])) {
			$_SESSION["cart_white"] = $_POST["white"];
			echo "You added " . $_SESSION["cart_white"] . "<br>";
		}
		?>

		
	
	</div>

</body>
</html>