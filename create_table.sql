create table products (
	id varchar(36) not null,
	name varchar(100),
	details text,
	available tinyint(1) unsigned default 1,
	created datetime,
	modified datetime,
	primary key(id)
);

insert into products (id, name, details, available, created, modified)
	values
	('6f55edae-fbab-4a71-989f-abd02553e719', 'Cake', 'Yummy and sweet', 1, NOW(), NOW()),
	('e1e07536-463e-4f06-aae1-d55b11628ddd', 'Cookie', 'Browsers love cookie', 1, NOW(), NOW()),
	('ed609a63-f3e8-4dec-9fd1-81959ff33faf', 'Helper', 'Helping you all the way', 1, NOW(), NOW());

create table users (
	id varchar(36) not null,
	username varchar(20),
	password varchar(100),
	created datetime,
	modified datetime,
	primary key(id)
);

create table books (
	id varchar(36) not null,
	name varchar(100),
	stock int(4),
	created datetime,
	modified datetime,
	primary key(id)
);	