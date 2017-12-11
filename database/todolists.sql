CREATE TABLE todolist(
  todoListID INTEGER PRIMARY KEY AUTOINCREMENT,
  title VARCHAR NOT NULL,
  category VARCHAR NOT NULL,
  uID INTEGER REFERENCES user(userID)
);

CREATE TABLE item(
  itemID INTEGER PRIMARY KEY AUTOINCREMENT,
  description TEXT NOT NULL,
  limitDate VARCHAR,
  completed INTEGER,
  tdID INTEGER REFERENCES todolist(todoListID)
);

CREATE TABLE user (
	userID INTEGER PRIMARY KEY AUTOINCREMENT,
  username VARCHAR NOT NULL UNIQUE,
	fullName VARCHAR,
  photoId VARCHAR,
  email VARCHAR UNIQUE,
	birthdate VARCHAR,
	gender VARCHAR,
  password VARCHAR NOT NULL
);
