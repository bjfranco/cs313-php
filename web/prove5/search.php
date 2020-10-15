<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Bird Watcher</title>
</head>
<body>
	<header class="nav">
		<ul>
			<h1>Bird Watcher</h1>
			<li><a href="log.php">Log</a></li>
			<li><a href="search.php">Search</a></li>
			<li><a href="index.php">Home</a></li>
		</ul>
	</header>

	<div>
		<h2>Bird Search</h2>
		<form>
			<label for="bird">Bird Name:</label><br>
			<input type="text" name="bird" id="bird"><br><br>
			<input type="submit" name="submit" value="Search">
		</form>

		<h2>Location Search</h2>
		<form>
			<label for="city">City:</label><br>
			<input type="text" name="city" id="city"><br>
			<label for="state">State:</label><br>
			<input type="text" name="state" id="state"><br>
			<label for="country">Country:</label><br>
			<input type="text" name="country" id="country"><br><br>
			<input type="submit" name="submit" value="Search">
		</form>
	</div>

</body>
</html>