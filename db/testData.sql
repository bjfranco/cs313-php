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

INSERT INTO Bird(birdname)
VALUES('Finch');

INSERT INTO Bird(birdname)
VALUES('Pigeon');

INSERT INTO Bird(birdname)
VALUES('Crow');

INSERT INTO Bird(birdname)
VALUES('Hawk');

INSERT INTO Bird(birdname)
VALUES('Owl');

INSERT INTO Bird(birdname)
VALUES('Woodpecker');

INSERT INTO Bird(birdname)
VALUES('Heron');

INSERT INTO Bird(birdname)
VALUES('Crane');

INSERT INTO Bird(birdname)
VALUES('Flamingo');

/*MEMBER*/

INSERT INTO Member(username, firstname, lastname)
VALUES('bfrancois', 'Brig', 'Francois');

INSERT INTO Member(username, firstname, lastname)
VALUES('vfrancois', 'Victoria', 'Francois');

INSERT INTO Member(username, firstname, lastname)
VALUES('tootie', 'Jane', 'Francois');

INSERT INTO Member(username, firstname, lastname)
VALUES('jjsmith', 'John', 'Smith');

INSERT INTO Member(username, firstname, lastname)
VALUES('dbook', 'Devin', 'Booker');

/*SIGHTING*/

INSERT INTO Sighting(memberid, birdid, city, state, country, sighttime)
VALUES(1, 2, 'Gilbert', 'Arizona', 'United States', '2020-07-12');

INSERT INTO Sighting(memberid, birdid, city, state, country, sighttime)
VALUES(5, 1, 'Toronto', 'Ontario', 'Canada', '2020-10-05');

INSERT INTO Sighting(memberid, birdid, city, state, country, sighttime)
VALUES(3, 3, 'Manti', 'Utah', 'United States', '2020-09-07');

INSERT INTO Sighting(memberid, birdid, city, state, country, sighttime)
VALUES(1, 1, 'Manti', 'Utah', 'United States', '2020-09-07');

INSERT INTO Sighting(memberid, birdid, city, state, country, sighttime)
VALUES(2, 5, 'Kingston', 'New York', 'United States', '2019-02-28');

INSERT INTO Sighting(memberid, birdid, city, state, country, sighttime)
VALUES(4, 2, 'Sacramento', 'California', 'United States', '2018-11-15');

INSERT INTO Sighting(memberid, birdid, city, state, country, sighttime)
VALUES(4, 1, 'Helena', 'Montana', 'United States', '2019-04-20');

/*JOIN STATEMENTS*/

SELECT Bird.birdname, Sighting.city, Sighting.state, Sighting.country, Sighting.sighttime
FROM Sighting
INNER JOIN Bird
ON Sighting.birdid=Bird.birdid
WHERE Sighting.country='Canada';


/*SIGHTING*/
INSERT INTO Sighting(memberid, birdid, city, state, country, sighttime)
VALUES((SELECT memberid FROM Member WHERE firstname = 'Victoria' AND lastname = 'Francois'), (SELECT birdid FROM Bird WHERE birdname = 'Blue Jay'),'test', 'test', 'test', '2020-10-22');

DELETE FROM Sighting WHERE city = 'Mesa';
