create database regist;
use regist;
create table tb_user(
	useridx int primary key auto_increment,
    	userid varchar(300) unique not null,
    	userpw varchar(300) not null,
    	username varchar(300),
    	regdate datetime default now()
);
select * from tb_user;

ALTER TABLE tb_user
ADD COLUMN userimage VARCHAR(255) AFTER username;
ALTER TABLE tb_user drop column userimage;
ALTER TABLE tb_user ADD COLUMN userimage BLOB;
INSERT INTO tb_user(userid, userpw, username, userphone)
VALUES('1234', '5678', '홍길동', '010-1234-5678');
