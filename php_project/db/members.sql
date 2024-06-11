create table members (
num int not null auto_increment,
id char(15) not null,
pass char(15) not null,
name char(15) not null,
email char(80),
regist_day char(20),
level int,
point int,
gender char(10) not null,
hobby char(10) not null,
age int not null,
phnum char(13) not null,
address char(80) not null,
self char(100) not null,
primary key(num)
);
