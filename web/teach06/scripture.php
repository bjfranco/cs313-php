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

function insertScripture($db, $book, $chapter, $verse, $content)
{
	$statement = $db->prepare('INSERT INTO Scripture(Book, Chapter, Verse, Content) VALUES(:book, :chapter, :verse, :content)');
	$statement->execute(array(':book' => $book, ':chapter' => $chapter, ':verse' => $verse, ':content' => $content));
}

function insertScriptureTopic($db, $scripture, $topic)
{
	$statement = $db->prepare('INSERT INTO scripturetopic(scriptureid, topicid) VALUES(:scripture, :topic)');
	$statement->execute(array(':scripture' => $scripture, ':topic' => $topic));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	insertScripture($db, $_POST['book'], $_POST['chapter'], $_POST['verse'], $_POST['content']);

	$lastScripture = $db->lastInsertId('scripture_scriptureid_seq');

	foreach ($_POST['topics'] as $topic) {
		insertScriptureTopic($db, $lastScripture, $topic);
	}
	
	header("location: ./ScriptureDetails.php?scriptureid=" . $lastScripture);
  	exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Scripture</title>
</head>
<body>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<label for="book">Book</label>
		<input type="text" name="book" id="book"><br>

		<label for="chapter">Chapter</label>
		<input type="text" name="chapter" id="chapter"><br>

		<label for="verse">Verse</label>
		<input type="text" name="verse" id="verse"><br>

		<label for="content">Book</label>
		<textarea id="content" name="content" rows="4" cols="50"></textarea><br>


		<?php

			foreach ($db->query('SELECT topicname, id FROM topic') as $row)
			{
				echo '<input type="checkbox" name="topics[]" value="' . $row['id'] . '" id="' . $row['topicname'] . '">';
				echo '<label for="' . $row['topicname'] . '">' . $row['topicname'] . '</label><br>';
			}
		?>

		<input type="submit" name="submit">

	</form>

</body>
</html>