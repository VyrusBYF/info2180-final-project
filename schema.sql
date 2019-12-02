DROP DATABASE IF EXISTS BugMe;
CREATE DATABASE BugMe;

USE BugMe;

CREATE TABLE Users(
	id int AUTO_INCREMENT,
	firstname varchar(25),
	lastname varchar (25),
	password varchar (35),
	email varchar(50),
	date_joined DATETIME NOT NULL
                DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
);

CREATE TABLE Issues(
	id int AUTO_INCREMENT,
	title varchar(50),
	description varchar(1000),
	type varchar(15),
	priority varchar(8),
	status varchar(10),
	assigned_to varchar(30),
	created_by varchar(30),
	created DATETIME NOT NULL
                DEFAULT CURRENT_TIMESTAMP,
	updated DATETIME NOT NULL
                DEFAULT CURRENT_TIMESTAMP, 
	PRIMARY KEY (id)
);

INSERT INTO Users VALUES ("00000","Richard","Howlett","password123","admin@bugme.com","2019-11-26");
INSERT INTO Issues VALUES ("0","Final Project",
	"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
	Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
	Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
	Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
	"Task","Critical","CLOSED","Richard Howlett","Richard Howlett","2019-11-26","2019-11-28");


