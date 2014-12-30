create table products (
	id varchar(36) not null,
	name varchar(100),
	details text,
	available tinyint(1) unsigned default 1,
	created datetime,
	modified datetime,
	primary key(id)
);