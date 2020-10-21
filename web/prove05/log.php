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

	<div id="search">
		<h2>Log Bird Sighting</h2>
		<p>Log your recent bird sighting below:</p>

		<form method="post">
			<label for="bird">Bird Name:</label><br>
			<input type="text" name="bird" id="bird" placeholder="Blue Jay"><br>

			<label for="city">City:</label><br>
			<input type="text" name="city" id="city" placeholder="Los Angelos"><br>

			<label for="state">State:</label><br>
			<input type="text" name="state" id="state" placeholder="California"><br>

			<label for="country">Country:</label><br>
			<input type="text" name="country" id="country" placeholder="United States"><br>

			<label for="date">Date:</label><br>
			<input type="text" name="date" id="date" placeholder="YYYY-MM-DD"><br>

			<input type="submit" name="submit" value="Submit"><br>
			
		</form>
	</div>

</body>
</html>