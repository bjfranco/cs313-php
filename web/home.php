<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="home.css">
	<link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
	<title>Home</title>
</head>
<body>
	<header>
		<ul class="nav">
			<li><a href="home.php">HOME</a></li>
			<li><a href="assignments.html">ASSIGNMENTS</a></li>
		</ul>
	</header>

	<div class="flex-container">
		<div class="column">
			<h1>About Me</h1>
			<p>My name is Brig Francois and I'm from Gilbert, Arizona. I am a Software Engineering student and Brigham Young University Idaho.</p>
			<img src="family.jpg" alt="Family Photo" class="responsive">
		</div>
		<div class="column">

			<h1>Contact Me</h1>
			<div class="flex-container">
				<a href="https://www.linkedin.com/in/brigham-francois/" target="blank">
					<img src="linkedin.png" height="50px" width="50px">
				</a>
				<a href="mailto:fra18020@byui.edu" target="_blank">
					<img src="gmail.png" height="50px" width="50px">
				</a>
				<a href="https://www.instagram.com/brigfrancois/" target="_blank">
					<img src="instagram.png" height="50px" width="50px">
				</a>
				<a href="https://www.facebook.com/brig.francois.3/" target="_blank">
					<img src="facebook.png" height="50px" width="50px">
				</a>
			</div>
            
			<h1>Server Time</h1>
			<?php
			echo "The time is " . date("h:i:sa");
			?>
		</div>
	</div>

</body>
</html>
