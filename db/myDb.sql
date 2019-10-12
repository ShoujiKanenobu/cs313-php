CREATE DATABASE myDB

CREATE TABLE users (
	userid serial NOT NULL PRIMARY KEY,
	username varchar (255) NOT NULL,
	password varchar(255) NOT NULL
	online boolean NOT NULL
)

CREATE TABLE posts (
	postid serial NOT NULL PRIMARY KEY,
	message varchar(255) NOT NULL,
	postTime TIMESTAMP NOT NULL,
	userid integer NOT NULL references users(userid)
)

CREATE TABLE friends(
	friendid serial NOT NULL PRIMARY KEY,
	acceptTime TIMESTAMP NOT NULL,
	user_first integer NOT NULL references users(userid)
	user_second integer NOT NULL references users(userid)
);


