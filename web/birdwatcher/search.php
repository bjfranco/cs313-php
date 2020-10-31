<?php
	// start the session
	session_start();

	// connect to database
	require 'dbconnect.php';
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

		</form><br>

		<?php
		    $bird = $_POST['bird'];

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