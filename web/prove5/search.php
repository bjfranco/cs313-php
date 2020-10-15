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
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

			<label for="bird">Bird Name:</label><br>
			<input type="text" name="bird" id="bird"><br><br>
			<input type="submit" name="submit" value="Search">
		</form>

		<h2>Location Search</h2>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<label for="city">City:</label><br>
			<input type="text" name="city" id="city"><br>

			<label for="state">State:</label><br>
			<input type="text" name="state" id="state"><br>

			<label for="country">Country:</label><br>
			<input type="text" name="country" id="country"><br><br>
			
			<input type="submit" name="submit" value="Search">
		</form>

			<?php
			    try
		        {
		        $dbUrl = getenv('DATABASE_URL');
		        
		        $dbOpts = parse_url($dbUrl);
		        
		        $dbHost = $dbOpts["host"];
		        $dbPort = $dbOpts["port"];
		        $dbUser = $dbOpts["user"];
		        $dbPassword = $dbOpts["pass"];
		        $dbName = ltrim($dbOpts["path"],'/');
		        
		        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
		        
		        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        }
		        catch (PDOException $ex)
		        {
		        echo 'Error!: ' . $ex->getMessage();
		        die();
		        } 
			?>

	</div>

</body>
</html>