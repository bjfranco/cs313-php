CREATE TABLE topic (
	id SERIAL PRIMARY KEY NOT NULL,
	topicname VARCHAR(80) NOT NULL
);

CREATE TABLE scripturetopic (
	id SERIAL PRIMARY KEY NOT NULL,
	scriptureid INT REFERENCES scripture(scriptureid),
	topicid INT REFERENCES topic(id)
);



SELECT s.book, s.chapter, s.verse, s.content, st.topicname FROM Scripture s INNER JOIN scripturetopic st ON s.scriptureid = st.scriptureid;



SELECT FROM topic INNER JOIN scripturetopic ON




INSERT INTO topic(topicname) VALUES('Faith'), ('Sacrifice'), ('Charity');


foreach ($db->query('SELECT scriptureid, book, chapter, verse, content FROM scripture') as $row)

SELECT t.topicname
FROM topic AS t 
INNER JOIN scripturetopic AS st 
ON st.topicid = t.id
WHERE st.scriptureid = :scripture;

$stmt = $db->prepare('SELECT t.topicname
FROM topic AS t 
INNER JOIN scripturetopic AS st 
ON st.topicid = t.id
WHERE st.scriptureid = :scripture;');
$stmt->bindValue(':scripture', $row['scriptureid'], PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);