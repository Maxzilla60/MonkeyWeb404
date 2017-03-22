CREATE TABLE events(
	ID INT NOT NULL AUTO_INCREMENT,
	PersonID INT,
	StartDate DATE,
	EndDate DATE,
	Name VARCHAR(50),
	PRIMARY KEY (ID)
);
INSERT INTO `events`(`PersonID`, `StartDate`, `EndDate`, `Name`)
VALUES (5, '2015-12-11', '2016-12-20', 'Wereld Apen Dag');
INSERT INTO `events`(`PersonID`, `StartDate`, `EndDate`, `Name`)
VALUES (4, '2017-01-15', '2016-01-17', 'Morgenland');
INSERT INTO `events`(`PersonID`, `StartDate`, `EndDate`, `Name`)
VALUES (6, '2017-05-05', '2017-03-22', 'Wow Koel!');
INSERT INTO `events`(`PersonID`, `StartDate`, `EndDate`, `Name`)
VALUES (5, '2016-01-01', '2017-01-01', 'Puppy Day');