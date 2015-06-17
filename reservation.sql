
DROP TABLE IF EXISTS user;
create table user
(
id varchar(20) not null,
name varchar(10) not null,
major varchar(20) not null,
password varchar(30) not null,
identity varchar(2) not null,
primary key(id)
)ENGINE=INNODB;

DROP TABLE IF EXISTS room;
create table room
(
building varchar(3) not null,
roomnum int not null,
primary key(building, roomnum)
)ENGINE=INNODB;

DROP TABLE IF EXISTS reservation;
create table reservation
(
building varchar(3) not null,
roomnum int not null,
checkin timestamp default '0000-00-00 00:00',
checkout timestamp default '0000-00-00 00:00',
id varchar(20) not null,

INDEX (building, roomnum),
INDEX (id),

FOREIGN KEY (building, roomnum)
      REFERENCES room(building, roomnum)
      ON UPDATE CASCADE ON DELETE RESTRICT,

    FOREIGN KEY (id)
      REFERENCES user(id)
)ENGINE=INNODB;

insert into room values ('Y05', 101),
('Y05', 124),
('Y05', 125),
('Y05', 126),
('Y05', 201),
('Y05', 202),
('Y05', 203),
('Y05', 204),
('Y05', 205),
('Y05', 206),
('Y05', 207),
('Y05', 301),
('Y05', 302),
('Y05', 303),
('Y05', 304),
('Y05', 305),
('Y05', 401),
('Y05', 402),
('Y05', 403),
('Y05', 404),
('Y05', 405),
('Y05', 406),
('Y05', 407),
('Y05', 409),
('Y05', 501),
('Y05', 502),
('Y05', 503),
('Y05', 504),
('Y05', 505),
('Y05', 506),
('Y05', 507),
('Y05', 508),
('Y05', 509);