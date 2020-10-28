<?php
	// start the session
	session_start();

	// unset session variable
	if(isset($_SESSION['errorMessage'])){
    	unset($_SESSION['errorMessage']);
    }
    if(isset($_SESSION['checkTwo'])){
    	unset($_SESSION['checkTwo']);
    }

	// connect to database
	require 'dbconnect.php';

    function insertLog($db, $memberid, $birdid, $city, $state, $country, $sighttime)
    {
    	$statement = $db->prepare('INSERT INTO Sighting(MemberId, BirdId, City, State, Country, SightTime) VALUES(:memberid, :birdid, :city, :state, :country, :sighttime)');
		$statement->execute(array(':memberid' => $memberid, ':birdid' => $birdid, ':city' => $city, ':state' => $state, ':country' => $country, ':sighttime' => $sighttime));
    }

    function checkValues($db, $memberid, $birdid, $city, $state, $country, $sighttime)
    {

    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    	if (isset($_POST['birdid'])) {
			foreach ($db->query('SELECT birdid, birdname FROM Bird') as $row)
			{
				if ($row['birdname'] == $_POST['birdid']) {
					$_POST['birdid'] = $row['birdid'];
					$checkOne = 'true';
				}
				else{
					$_SESSION['errorMessage'] = "ERROR: Bird Not Found";
				}
			}
		}
		if (isset($_POST['memberid'])) {
			foreach ($db->query('SELECT username, memberid FROM Member') as $rows)
			{
				if ($rows['username'] == $_POST['memberid']) {
					$_POST['memberid'] = $rows['memberid'];
					$_SESSION['checkTwo'] = 'true';
				}
				else{
					$checkTwo = 'false';
					$_SESSION['errorMessage'] = "ERROR: Enter A Valid Username";
				}
			}
		}
		if ($_SESSION['checkTwo'] == 'true') {
			insertLog($db, $_POST['memberid'], $_POST['birdid'], $_POST['city'], $_POST['state'], $_POST['country'], $_POST['sighttime']);
			$_SESSION['errorMessage'] = "Log Added";
		}
    	

    	//$message = "Log Added";
		//echo "<script type='text/javascript'>alert('$message');</script>";
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
			<h2>Log Bird Sighting</h2>
			<p>Log your recent bird sightings here:</p>
			<img src="bird.jpg">
		</div>

		<div class="user">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<div class="leftcol">
					<label for="birdid">Bird Name:</label><br>
				</div>
				<div class="rightcol">
					<select name="birdid" id="birdid">
						
						<?php
						foreach ($db->query('SELECT birdname FROM Bird') as $row)
						{
							echo '<option value="' . $row['birdname'] . '">' . $row['birdname'] . '</option>';
						}
						?>
					</select>
				</div>

				<div class="leftcol">
					<label for="memberid">Username:</label><br>
				</div>
				<div class="rightcol">
					<input type="text" name="memberid" id="memberid" placeholder="jsmith" required><br>
				</div>

					<!--
					<select name="memberid" id="memberid">
						
						<?php
						//foreach ($db->query('SELECT username FROM Member') as $row)
						{
							//echo '<option value="' . $row['username'] . '">' . $row['username'] . '</option>';
						}
						?>
					</select>
				-->
				

				<div class="leftcol">
					<label for="city">City:</label><br>
				</div>
				<div class="rightcol">
					<input type="text" name="city" id="city" placeholder="Los Angelos" required><br>
				</div>
				

				<div class="leftcol">
					<label for="state">State:</label><br>
				</div>
				<div class="rightcol">
					<input type="text" name="state" id="state" placeholder="California" required><br>
				</div>
				

				<div class="leftcol">
					<label for="country">Country:</label><br>
				</div>
				<div class="rightcol">
					<input type="text" name="country" id="country" placeholder="United States" required><br>
				</div>
				

				<div class="leftcol">
					<label for="sighttime">Date:</label><br>
				</div>
				<div class="rightcol">
					<input type="text" name="sighttime" id="sighttime" placeholder="YYYY-MM-DD" required><br>
				</div>
				

				<div class="rightcol">
					<input type="submit" name="submit" value="Submit"><br>
				</div>
			</form>
			<?php
				if (isset($_SESSION['errorMessage'])) {
					echo "<p style='color:black; font-size:20px; font-family:'Work Sans', sans-serif;'>" . $_SESSION['errorMessage'] . "</p>";
				}
			?>
		</div>


	</div>

</body>
</html>