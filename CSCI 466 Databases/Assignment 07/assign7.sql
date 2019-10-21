#Andrew Scheel
#z1790270
#Section 3

#1
DROP TABLE IF EXISTS pet;
DROP TABLE IF EXISTS owner;
DROP VIEW IF EXISTS owner_and_pet;

#2
CREATE TABLE owner(id INT AUTO_INCREMENT primary key, firstname VARCHAR(25), lastname VARCHAR(25));

#3
INSERT INTO owner (firstname, lastname) VALUES ('Andrew','Scheel');
INSERT INTO owner (firstname, lastname) VALUES ('Clark','Kent');
INSERT INTO owner (firstname, lastname) VALUES ('Bruce','Wayne');
INSERT INTO owner (firstname, lastname) VALUES ('Barry','Allen');
INSERT INTO owner (firstname, lastname) VALUES ('Luke','Starkiller');

#4
SELECT * FROM owner;

#5
CREATE TABLE pet(id INT AUTO_INCREMENT primary key, name VARCHAR(25), dob VARCHAR(10), ownerid INT, FOREIGN KEY(ownerid) REFERENCES owner(id));

#6
INSERT INTO pet (name, dob, ownerid) VALUES ('Krypto', '1955-03-09', '2');
INSERT INTO pet (name, dob, ownerid) VALUES ('BatCow', '2012-07-05', '3');
INSERT INTO pet (name, dob, ownerid) VALUES ('R2D2', '1977-05-25', '5');
INSERT INTO pet (name, dob, ownerid) VALUES ('C3PO', '1977-05-25', '5');
INSERT INTO pet (name, dob, ownerid) VALUES ('Tillie', '2010-04-09', '1');

#7
SELECT * FROM pet;

#8
ALTER TABLE pet ADD(type VARCHAR(25));

#9
UPDATE pet SET type = 'Cow' WHERE id = 2;
UPDATE pet SET type = 'Super Dog' WHERE id = 1;
UPDATE pet SET type = 'Droid' WHERE id = 3;
UPDATE pet SET type = 'Dog' WHERE id = 5;

#10
ALTER TABLE pet MODIFY COLUMN dob DATE;

#11
SELECT * FROM pet;

#12
CREATE VIEW owner_and_pet (FirstName, LastName, Name) AS SELECT firstName, lastName, name FROM owner, pet WHERE owner.id = pet.ownerid;

#13
SELECT * FROM owner_and_pet;

