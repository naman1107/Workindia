create database notes;
create table user(
ID INT(6) AUTO_INCREMENT PRIMARY_KEY,
User VARCHAR(50) NOT NULL,
Password VARCHAR(100) NOT NULL
);
create table user(
ID INT(6) ,
notes VARCHAR(500) NOT NULL,
Skey VARCHAR(100) NOT NULL,
IV VARCHAR(100) NOT NULL
);zzzzz