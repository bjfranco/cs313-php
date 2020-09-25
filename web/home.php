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
			<li><a href="home.html">HOME</a></li>
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
			<h1>Server Time</h1>
			<?php
			echo date();
			?>
		</div>
	</div>

</body>
</html>