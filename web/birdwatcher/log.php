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

    function insertLog($db, $memberid, $birdid, $city, $state, $country, $sighttime)
    {
    	$statement = $db->prepare('INSERT INTO Sighting(MemberId, BirdId, City, State, Country, SightTime) VALUES(:memberid, :birdid, :city, :state, :country, :sighttime)');
		$statement->execute(array(':memberid' => $memberid, ':birdid' => $birdid, ':city' => $city, ':state' => $state, ':country' => $country, ':sighttime' => $sighttime));
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    	if (isset($_POST['birdid'])) {
			foreach ($db->query('SELECT birdid, birdname FROM Bird') as $row)
			{
				if ($row['birdname'] == $_POST['birdid']) {
					$_POST['birdid'] = $row['birdid'];
				}
			}
		}
		if (isset($_POST['memberid'])) {
			foreach ($db->query('SELECT username, memberid FROM Member') as $rows)
			{
				if ($rows['username'] == $_POST['memberid']) {
					$_POST['memberid'] = $rows['memberid'];
				}
			}
		}
    	insertLog($db, $_POST['memberid'], $_POST['birdid'], $_POST['city'], $_POST['state'], $_POST['country'], $_POST['sighttime']);

    	$message = "Log Added";
		echo "<script type='text/javascript'>alert('$message');</script>";
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

	<div class="log">
		<h2>Log Bird Sighting</h2>
		<p>Log your recent bird sighting below:</p>

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
				<select name="memberid" id="memberid">
					
					<?php
					foreach ($db->query('SELECT username FROM Member') as $row)
					{
						echo '<option value="' . $row['username'] . '">' . $row['username'] . '</option>';
					}
					?>
				</select>
			</div>

<!--
			<div class="leftcol">
				<label for="memberid">Username:</label><br>
			</div>
			<div class="rightcol">
				<input type="text" name="memberid" id="memberid" placeholder="user123"><br>
			</div>
		-->
			
<!--
			<div class="leftcol">
				<label for="birdid">Bird Name:</label><br>
			</div>
			<div class="rightcol">
				<input type="text" name="birdid" id="birdid" placeholder="Blue Jay"><br>
			</div>
		-->
			

			<div class="leftcol">
				<label for="city">City:</label><br>
			</div>
			<div class="rightcol">
				<input type="text" name="city" id="city" placeholder="Los Angelos"><br>
			</div>
			

			<div class="leftcol">
				<label for="state">State:</label><br>
			</div>
			<div class="rightcol">
				<input type="text" name="state" id="state" placeholder="California"><br>
			</div>
			

			<div class="leftcol">
				<label for="country">Country:</label><br>
			</div>
			<div class="rightcol">
				<input type="text" name="country" id="country" placeholder="United States"><br>
			</div>
			

			<div class="leftcol">
				<label for="sighttime">Date:</label><br>
			</div>
			<div class="rightcol">
				<input type="text" name="sighttime" id="sighttime" placeholder="YYYY-MM-DD"><br>
			</div>
			

			<div class="rightcol">
				<input type="submit" name="submit" value="Submit"><br>
			</div>
			
		</form>
	</div>

</body>
</html>