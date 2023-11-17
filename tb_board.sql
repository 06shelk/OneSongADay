use regist;

CREATE TABLE tb_board(
boardID int(10) unsigned NOT NULL AUTO_INCREMENT,
memberID varchar(300) not null,
title varchar(50) NOT NULL,
content longtext NOT NULL,
regdate datetime default now(),
PRIMARY KEY (boardID)
);


-- tb_user 확인
select * from tb_board;
ALTER TABLE tb_board DROP COLUMN image;
ALTER TABLE tb_board
ADD COLUMN image VARCHAR(255) AFTER content;
TRUNCATE TABLE tb_board;


SELECT * FROM tb_board;

SELECT * FROM tb_board ORDER BY likes DESC LIMIT 1, 1;

SELECT * FROM tb_board ORDER BY likes DESC;