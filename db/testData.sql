/*SQL TEST DATA*/


/*BIRD*/

INSERT INTO Bird(birdname)
VALUES('Blue Jay');

INSERT INTO Bird(birdname)
VALUES('Cardinal');

INSERT INTO Bird(birdname)
VALUES('Bald Eagle');

INSERT INTO Bird(birdname)
VALUES('Cactus Wren');

INSERT INTO Bird(birdname)
VALUES('Hummingbird');

/*MEMBER*/

INSERT INTO Member(firstname, lastname)
VALUES('Brig', 'Francois');

INSERT INTO Member(firstname, lastname)
VALUES('Victoria', 'Francois');

INSERT INTO Member(firstname, lastname)
VALUES('Jane', 'Francois');

INSERT INTO Member(firstname, lastname)
VALUES('John', 'Smith');

INSERT INTO Member(firstname, lastname)
VALUES('Devin', 'Booker');

/*SIGHTING*/

INSERT INTO Sighting(memberid, birdid, city, state, country, sighttime)
VALUES(1, 2, 'Gilbert', 'Arizona', 'United States', '2020-07-12');

INSERT INTO Sighting(memberid, birdid, city, state, country, sighttime)
VALUES(5, 1, 'Toronto', 'Ontario', 'Canada', '2020-10-05');

INSERT INTO Sighting(memberid, birdid, city, state, country, sighttime)
VALUES(3, 3, 'Manti', 'Utah', 'United States', '2020-09-07');

INSERT INTO Sighting(memberid, birdid, city, state, country, sighttime)
VALUES(1, 1, 'Manti', 'Utah', 'United States', '2020-09-07');

/*JOIN STATEMENTS*/

SELECT Bird.birdname, Sighting.city, Sighting.state, Sighting.country, Sighting.sighttime
FROM Sighting
INNER JOIN Bird
ON Sighting.birdid=Bird.birdid
WHERE Sighting.country='Canada';

