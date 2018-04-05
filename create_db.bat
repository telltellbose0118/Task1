create database db_mk4 default character set utf8;
grant all privileges on db_db4.* to db_user@localhost with grant option;
use db_mk4;

create table user(

id int unsigned not null auto_increment primary key,
name verchar(255) not null,
password verchar(255) not null,


);

create table bbs(

id int unsigned not null auto_increment primary key,
name verchar(255) not null foreign key (name) references user(name),
date datetime not null, 
title varchar(255) not null,
content text not null

);

insert into bbs (name,date,title,content) values ('user1',now(),'first',"first article"), ('user2',now(),'second',"second article"), ('user3',now(),'third',"third article"), ('user4',now(),'fourth',"fourth article");
