<?php
	require 'dbconnect.php';
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
	
	<div class="search">
		<h2>Bird Search</h2><br>
		<p>Select the bird you are looking for and a record will be displayed showing where and when this bird has been seen.</p>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

			<select name="bird" id="bird">
				
				<?php
				foreach ($db->query('SELECT birdname FROM Bird') as $row)
				{
					echo '<option value="' . $row['birdname'] . '">' . $row['birdname'] . '</option>';
				}
				?>

				<br>
				<input type="submit" name="submit" value="Search">

			</select>

			<!--
			<label for="bird">Bird Name:</label><br>
			<input type="text" name="bird" id="bird"><br><br>
			<input type="submit" name="submit" value="Search">
			-->

		</form><br>

		<?php
		    $bird = $_POST['bird'];
		    /*
		    $city = $_POST['city'];
		    $state = $_POST['state'];
		    $country = $_POST['country'];
		    */


		    if (!empty($bird)) {
		    	echo '<div class="table"><h3>' . $bird . '</h3>';
		    	echo '<table><tr><th>Date</th><th>City</th><th>State</th><th>Country</th></tr>';
		    	foreach ($db->query('SELECT Bird.birdname, Sighting.city, Sighting.state, Sighting.country, Sighting.sighttime FROM Sighting INNER JOIN Bird ON Bird.birdid = Sighting.birdid') as $row)
				{
					if ($_POST['bird'] == $row['birdname']) {
				  		echo '<tr><td>' . $row['sighttime'] . '</td><td>' . $row['city'] . '</td><td>' . $row['state'] . '</td><td>' . $row['country'] . '</td></tr>';
					}
				}
				echo '</table></div>';
		    }
		?>

	</div>

</body>
</html>