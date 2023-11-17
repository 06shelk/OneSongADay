create database regist;
use regist;
create table tb_song(
	useridx int primary key auto_increment,
	title varchar(300) not null,
	singer varchar(300) not null,
	artistImage VARCHAR(255) ,
	music VARCHAR(255),
    userid varchar(300),
    regdate datetime default now()
);

select * from tb_song;
SELECT title FROM tb_song WHERE userid = '$userId' ORDER BY useridx DESC;
TRUNCATE TABLE tb_song;
ALTER TABLE tb_song
ADD COLUMN regdate DATETIME DEFAULT NOW();
drop table tb_song;