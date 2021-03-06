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

create table uploads (
        id int(11) not null auto_increment,
        name varchar(100) not null,
        size int(4) unsigned not null,
        mime varchar(50) not null,
        path text not null,
        created datetime,
        modified datetime,
        primary key(id)
);

create table packages (
    id int not null auto_increment,
    recipient varchar(255) not null,
    address varchar(255) not null,
    created datetime,
    modified datetime,
    primary key(id)
);

create table warehouses (
    id int not null auto_increment,
    name varchar(255) not null,
    created datetime,
    modified datetime,
    primary key(id)
);

insert into packages (recipient, address, created, modified)
    values
    ('John Doe', 'Sunset Boulevard 1, Los Angeles, CA', now(), now());

insert into warehouses (name, created, modified)
    values
    ('Main Warehouse', now(), now()),
    ('Auxiliar Warehouse', now(), now());

create table packages_warehouses (
    id int not null auto_increment,
    package_id int not null,
    warehouse_id int not null,
    primary key(id)
);

insert into packages_warehouses (package_id, warehouse_id)
    values
    (1, 1),
    (1, 2);

alter table packages_warehouses add
    amount int not null default '0';

create table categories (
    id int not null auto_increment,
    name varchar(255) not null,
    created datetime,
    modified datetime,
    primary key(id)
);

insert into categories (name, created, modified)
    values
    ('Paper Box', now(), now()),
    ('Wooden Box', now(), now());

alter table packages add 
    fragile tinyint(1) not null default '0';
alter table packages add
    category_id int not null default '0';

update packages set category_id = '1' where id = 1;

alter table packages add active tinyint(1) not null default '1';
alter table warehouses add active tinyint(1) not null default '1';

update packages_warehouses set amount = '1' where id = 1;

insert into packages (recipient, address, created, modified)
    values
    ('Recipient 1', 'Sunset Boulevard 1', now(), now()),
    ('Recipient 2', 'Sunset Boulevard 2', now(), now()),
    ('Recipient 3', 'Sunset Boulevard 3', now(), now()),
    ('Recipient 4', 'Sunset Boulevard 4', now(), now()),
    ('Recipient 5', 'Sunset Boulevard 5', now(), now()),
    ('Recipient 6', 'Sunset Boulevard 6', now(), now()),
    ('Recipient 7', 'Sunset Boulevard 7', now(), now()),
    ('Recipient 8', 'Sunset Boulevard 8', now(), now()),
    ('Recipient 9', 'Sunset Boulevard 9', now(), now()),
    ('Recipient 10', 'Sunset Boulevard 10', now(), now()),
    ('Recipient 11', 'Sunset Boulevard 11', now(), now());