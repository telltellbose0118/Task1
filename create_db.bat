create database db_mk4 default character set utf8;
grant all privileges on db_db4.* to db_user@localhost with grant option;
use db_mk4;
create table bbs(

id int unsigned not null auto_increment primary key,
title varchar(255) not null,
contents text not null

);

insert into bbs (title,contents) values ('first',"first article"), ('second',"second article"), ('third',"third article"), ('fourth',"fourth article");
