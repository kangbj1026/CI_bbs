create database community;
grant All PRIVILEGES ON *.* to 'up_rabbit'@'localhost' identified by 'good_luck';
FLUSH PRIVILEGES;
SHOW GRANT FOR 'up_rabbit'@'localhost';


CREATE TABLE board (
	board_id int(10) NULL AUTO_INCREMENT PRIMARY KEY,
	board_pid int(10) NULL DEFAULT 0 COMMENT '원글 번호',
	user_id varchar(20) COMMENT '작성자ID',
	user_name varchar(20) NOT NULL COMMENT '작성자 이름',
	subject varchar(50) NOT NULL COMMENT '게시글 제목',
	contents text NOT NULL COMMENT '게시글 내용',
	hits int(10) NOT NULL DEFAULT 0 COMMENT '조회수',
	reg_date datetime NOT NULL COMMENT '등록일',
	INDEX board_pid (board_pid)
	)
	COMMENT='CodeIgniter 게시판'
	COLLATE='utf8_general_ci'
	ENGINE=MyISAM;

INSERT INTO board(user_id, user_name, subject, contents, hits, reg_date) VALUES ('rabbit', 'RaB', 'First Note', 'Test', 0, '2021-03-11 11:11:21');
INSERT INTO board(user_id, user_name, subject, contents, hits, reg_date) VALUES ('rabbit', 'RaB', 'Second Note', 'Test', 0, '2021-03-11 11:11:21');
INSERT INTO board(user_id, user_name, subject, contents, hits, reg_date) VALUES ('rabbit', 'RaB', 'Third Note', 'Test', 0, '2021-03-11 11:11:21');
INSERT INTO board(user_id, user_name, subject, contents, hits, reg_date) VALUES ('rabbit', 'RaB', 'Fourth Note', 'Test', 0, '2021-03-11 11:11:21');
INSERT INTO board(user_id, user_name, subject, contents, hits, reg_date) VALUES ('rabbit', 'RaB', 'Fifth Note', 'Test', 0, '2021-03-11 11:11:21');
INSERT INTO board(user_id, user_name, subject, contents, hits, reg_date) VALUES ('rabbit', 'RaB', 'Sixth Note', 'Test', 0, '2021-03-11 11:11:21');
INSERT INTO board(user_id, user_name, subject, contents, hits, reg_date) VALUES ('rabbit', 'RaB', 'Seventh Note', 'Test', 0, '2021-03-11 11:11:21');
INSERT INTO board(board_pid, user_id, user_name, subject, contents, hits, reg_date) VALUES (1, 'up_rabbit', 'up_RaB', 'Comment Test', 'Comment', 0, '2021-03-12 23:11:11');
INSERT INTO board(board_pid, user_id, user_name, subject, contents, hits, reg_date) VALUES (1, 'up_rabbit', 'up_RaB', 'Comment Test2', 'Comment', 0, '2021-03-12 23:11:11');

CREATE TABLE users (
	id INT(10) NULL AUTO_INCREMENT PRIMARY KEY,
	username varchar(50) null comment '아이디',
	password varchar(50) null comment '비밀번호',
	name varchar(50) null comment '이름',
	email varchar(50) null comment '이메일',
	reg_date datetime null comment '가입일'
	)
	COMMENT = '회원테이블'
	COLLATE = 'utf8_general_ci'
	ENGINE = MyISAM
	ROW_FORMAT = DEFAULT;

INSERT INTO users(username, password, name, email, reg_date) VALUES ('rabbit', '1234', 'RaB', 'kangbj725893@naver.com', '2021-03-24 13:11:21');

CREATE TABLE IF NOT EXISTS sessions (
	session_id varchar(40) DEFAULT 0 NOT NULL PRIMARY KEY,
	ip_address varchar(40) DEFAULT 0 NOT NULL,
	last_activity int(10) unsigned DEFAULT 0 NOT NULL,
	data text NOT NULL,
	timestamp TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
	KEY last_activity_idx (last_activity)
);