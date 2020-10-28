<?php
	// start the session
	session_start();

	// connect to database
	require 'dbconnect.php';

	// add user function
    function addUser($db, $username, $firstname, $lastname)
    {
	    $stmt = $db->prepare('INSERT INTO Member(UserName, FirstName, LastName) VALUES(:username, :firstname, :lastname)');
		$stmt->execute(array(':username' => $username, ':firstname' => $firstname, ':lastname' => $lastname));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // check user function
    function checkUser($db, $username)
    {
    	// check if the user already exists.
		foreach ($db->query('SELECT username FROM Member') as $row)
		{
		  if ($row['username'] == $_POST['username']) {
		  	$message = "Error: Username Already Taken";
			//echo "<script type='text/javascript'>alert('$message');</script>";
			$check = 'false';
		  }
		}
		if ($check != 'false') {
			addUser($db, $_POST['username'], $_POST['firstname'], $_POST['lastname']);
			$message = "User Added";
			//echo "<script type='text/javascript'>alert('$message');</script>";
		}
    }

    // run our functions to add a user
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    	checkUser($db, $_POST['username']);
    }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
	<title>Bird Watcher</title>
</head>
<body>
	<?php
		include 'navbar.php';
	?>

	<div class="flex-container">
		<div class="home">
			<h2>Welcome to Bird Watcher!</h2>
			<p>Select the "Search" tab to search for a bird sighting.</p>
			<p>Select the "Log" tab to log a new bird sighting.</p>
			<img src="homeimg.png">
		</div>

		<div class="user">
			<h3>Create User Profile</h3>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<div class="leftcol">
					<label for="username">Username:</label><br>
				</div>
				<div class="rightcol">
					<input type="text" name="username" id="username" placeholder="jsmith" required><br>
				</div>

				<div class="leftcol">
					<label for="firstname">First Name:</label><br>
				</div>
				<div class="rightcol">
					<input type="text" name="firstname" id="firstname" placeholder="John" required><br>
				</div>

				<div class="leftcol">
					<label for="lastname">Last Name:</label><br>
				</div>
				<div class="rightcol">
					<input type="text" name="lastname" id="lastname" placeholder="Smith" required><br><br><br>
				</div>

				<input type="submit" name="submit"><br>

				<?php
					if (isset($message)) {
						echo $message;
					}
				?>
			</form>
		</div>
	</div>

</body>
</html>