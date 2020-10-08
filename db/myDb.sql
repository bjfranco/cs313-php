CREATE TABLE Member (
	MemberId int NOT NULL PRIMARY KEY,
	FirstName varchar(80) NOT NULL,
	LastName varchar(80) NOT NULL
);

CREATE TABLE Bird (
	BirdId int NOT NULL PRIMARY KEY,
	BirdName varchar(80) NOT NULL
);

CREATE TABLE Sighting (
	SightingId int NOT NULL PRIMARY KEY,
	MemberId int REFERENCES Member(MemberId),
	BirdId int REFERENCES Bird(BirdId),
	City varchar(80) NOT NULL,
	State varchar(80) NOT NULL,
	Country varchar(80) NOT NULL,
	SightTime date NOT NULL
);