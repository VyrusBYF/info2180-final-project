DROP DATABASE IF EXISTS BugMe;
CREATE DATABASE BugMe;

USE BugMe;

CREATE TABLE Users(
	id varchar(5),
	firstname varchar(25),
	lastname varchar (25),
	password varchar (35),
	email varchar(50),
	date_joined date,
	PRIMARY KEY (id)
);

CREATE TABLE Issues(
	id varchar(5),
	title varchar(50),
	description varchar(100),
	type varchar(15),
	priority varchar(8),
	status varchar(10),
	assigned_to varchar(30),
	created_by varchar(30),
	updated date,
	PRIMARY KEY (id)
);

INSERT INTO Users VALUES ("00000","Richard","Howlett","password123","admin@bugme.com","2019-11-26");


