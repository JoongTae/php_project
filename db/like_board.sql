CREATE TABLE like_board (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(50) NOT NULL,
    board_num INT NOT NULL,
    FOREIGN KEY (board_num) REFERENCES notice_board(num)
);
