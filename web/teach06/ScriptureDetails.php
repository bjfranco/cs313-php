<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scripture Details</title>
</head>
<body>
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

        foreach ($db->query('SELECT scriptureid, book, chapter, verse, content FROM scripture') as $row)
        {
            if($_GET['scriptureid'] == $row['scriptureid'])
            {
                echo '<p><b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - "' . $row['content'] . '"';
                echo '<p/>';

                $stmt = $db->prepare('SELECT t.topicname
                FROM topic AS t 
                INNER JOIN scripturetopic AS st 
                ON st.topicid = t.id
                WHERE st.scriptureid = :scripture;');
                $stmt->bindValue(':scripture', $row['scriptureid'], PDO::PARAM_INT);
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($rows as $topic){
                    echo $topic['topicname'] . "<br>";
                }
                
            }
        }


    ?>
</body>
</html>