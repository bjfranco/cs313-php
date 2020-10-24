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

    function addUser($db, $username, $firstname, $lastname)
    {
	    $stmt = $db->prepare('INSERT INTO Member(UserName, FirstName, LastName) VALUES(:username, :firstname, :lastname)');
		$stmt->execute(array(':username' => $username, ':firstname' => $firstname, ':lastname' => $lastname));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function checkUser($db, $username)
    {
		foreach ($db->query('SELECT username FROM Member') as $row)
		{
		  if ($row['username'] == $_POST['username']) {
		  	$message = "Error: Username Already Taken";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$check = false;
		  }
		}
		if ($check != false) {
			addUser($db, $_POST['username'], $_POST['firstname'], $_POST['lastname']);
			$message = "User Added";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    	checkUser($db, $_POST['username']);
    	
    }
?>
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

	<div class="home">
		<h2>Welcome to Bird Watcher!</h2>
		<p>Select the "Search" tab to search for a bird sighting.</p>
		<p>Select the "Log" tab to log a new bird sighting.</p>
	</div>

	<div class="adduser">
		<h3>Create User Profle:</h3>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<label for="username">Username:</label><br>
			<input type="text" name="username" id="username" placeholder="user123"><br>

			<label for="firstname">First Name:</label><br>
			<input type="text" name="firstname" id="firstname" placeholder="John"><br>

			<label for="lastname">Last Name:</label><br>
			<input type="text" name="lastname" id="lastname" placeholder="Smith"><br>

			<input type="submit" name="submit"><br>
		</form>
	</div>

</body>
</html>