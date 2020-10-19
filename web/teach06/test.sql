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








INSERT INTO topic(topicname) VALUES('Faith'), ('Sacrifice'), ('Charity');
