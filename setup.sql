CREATE DATABASE guestlist;
USE guestlist;
CREATE TABLE invitees ( fid INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(fid), first_name CHAR(25), last_name char(25) );
CREATE TABLE contact ( fid INT NOT NULL, FOREIGN KEY(fid) REFERENCES invitees(fid), phone char(25), address TEXT )
