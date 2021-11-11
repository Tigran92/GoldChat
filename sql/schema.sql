CREATE DATABASE softprojb_groupchatdb;



DROP TABLE IF EXISTS `userDetails`;
CREATE TABLE userDetails (
id INT AUTO_INCREMENT,
firstname VARCHAR(32),
lastname VARCHAR(32),
username VARCHAR(32),
password VARCHAR(32),    
avatar BLOB,
description TEXT,
email VARCHAR(64),
PRIMARY KEY(id)
);

DROP TABLE IF EXISTS `groupChat`;
CREATE TABLE groupChat (
id INT AUTO_INCREMENT,
avatar BLOB,
description TEXT,
name VARCHAR(64),
PRIMARY KEY(id)
);

DROP TABLE IF EXISTS `messageLog`;
CREATE TABLE messageLog (
id INT AUTO_INCREMENT,
message TEXT,
user_id INT,          
group_id INT,
PRIMARY KEY(id),

FOREIGN KEY(user_id) REFERENCES userDetails(id),
FOREIGN KEY(group_id) REFERENCES groupChat(id)
);

DROP TABLE IF EXISTS `subscribe`;
CREATE TABLE subscribe (
user_id INT,          
group_id INT,
FOREIGN KEY(user_id) REFERENCES userDetails(id),
FOREIGN KEY(group_id) REFERENCES groupChat(id)
);