create database ci_book;
grant All PRIVILEGES ON *.* to 'up_rabbit'@'localhost' identified by 'good_luck';
FLUSH PRIVILEGES;
SHOW GRANT FOR 'up_rabbit'@'localhost';


CREATE TABLE ci_board (
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

INSERT INTO ci_board(user_id, user_name, subject, contents, hits, reg_date) VALUES ('advisor', 'Palpit', 'First Note', 'Test', 0, '2015-08-11 11:11:21');
INSERT INTO ci_board(user_id, user_name, subject, contents, hits, reg_date) VALUES ('advisor', 'Palpit', 'Second Note', 'Test', 0, '2015-08-11 11:11:21');
INSERT INTO ci_board(user_id, user_name, subject, contents, hits, reg_date) VALUES ('advisor', 'Palpit', 'Third Note', 'Test', 0, '2015-08-11 11:11:21');
INSERT INTO ci_board(user_id, user_name, subject, contents, hits, reg_date) VALUES ('advisor', 'Palpit', 'Fourth Note', 'Test', 0, '2015-08-11 11:11:21');
INSERT INTO ci_board(user_id, user_name, subject, contents, hits, reg_date) VALUES ('advisor', 'Palpit', 'Fifth Note', 'Test', 0, '2015-08-11 11:11:21');
INSERT INTO ci_board(user_id, user_name, subject, contents, hits, reg_date) VALUES ('advisor', 'Palpit', 'Sixth Note', 'Test', 0, '2015-08-11 11:11:21');
INSERT INTO ci_board(user_id, user_name, subject, contents, hits, reg_date) VALUES ('advisor', 'Palpit', 'Seventh Note', 'Test', 0, '2015-08-11 11:11:21');
INSERT INTO ci_board(board_pid, user_id, user_name, subject, contents, hits, reg_date) VALUES (1, 'zhfldi4', 'Cyzone', 'Comment Test', 'Comment', 0, '2015-08-12 23:11:11');
INSERT INTO ci_board(board_pid, user_id, user_name, subject, contents, hits, reg_date) VALUES (1, 'zhfldi4', 'Cyzone', 'Comment Test2', 'Comment', 0, '2015-08-12 23:11:11');