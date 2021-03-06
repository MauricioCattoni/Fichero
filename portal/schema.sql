create database infoveg;
use infoveg;

create table kind(
	id int not null auto_increment primary key,
	name varchar(50) not null,
	description varchar(255) not null
);

	insert into kind(name,description) values("Administrador","Puede administrar todo"),("Autor","Solo puede administrar sus posts"),("Lector","Solo puede leer los posts");

create table user(
	id int not null auto_increment primary key,
	name varchar(50) not null,
	lastname varchar(50) not null,
	username varchar(50),
	email varchar(255) not null,
	password varchar(60) not null,
	image varchar(255),
	is_active boolean not null default 1,
	kind_id int not null,
	foreign key(kind_id) references kind(id),
	created_at datetime not null
);

insert into user(name,username,lastname,email,password,is_active,kind_id,created_at) value ("Admin","admin","admin","admin",sha1(md5("admin")),1,1,NOW());

create table album (
	id int not null auto_increment primary key,
	title varchar(200) not null,
	description text not null,
	created_at datetime not null,
	user_id int not null,
	foreign key(user_id) references user(id)
);


create table image (
	id int not null auto_increment primary key,
	src varchar(200) not null,
	title varchar(200) not null,
	description text not null,
	created_at datetime not null,
	user_id int not null,
	album_id int,
	foreign key(album_id) references album(id),
	foreign key(user_id) references user(id)
);

/*
Kind of post
1.- post
2.- page
*/

create table post (
	id int not null auto_increment primary key,
	image_id int ,
	title varchar(255) not null,
	slug varchar(255) not null,
	content text not null,
	accept_comments boolean not null default 1,
	show_image boolean not null default 1,
	created_at datetime not null,
	updated_at datetime not null,
	user_id int not null,
	status int default 1,
	visibility int default 1,
	kind int default 1,
	foreign key(image_id) references image(id),
	foreign key(user_id) references user(id)
);

insert into post(title,content,status,user_id,created_at) value("Bienvenido a infoVeg ","",1,1,NOW());

create table tax(
	id int not null auto_increment primary key,
	name varchar(255) not null,
	slug varchar(255) not null,
	kind int, /* 1. category, 2. tag */
	tax_id int,
	foreign key(tax_id) references tax(id)
);

create table post_tax(
	post_id int not null,
	tax_id int ,
	foreign key(tax_id) references tax(id),
	foreign key(post_id) references post(id)
);

/*
Kind of comment
1.- comment
2.- feedback
*/
create table comment (
	id int not null auto_increment primary key,
	name varchar(200) not null,
	email varchar(200) not null,
	content text not null,
	is_public boolean not null default 0,
	is_read boolean not null default 0,
	created_at datetime not null,
	kind int default 1,
	user_id int,
	comment_id int,
	foreign key(comment_id) references comment(id),
	post_id int,
	foreign key(post_id) references post(id),
	foreign key(user_id) references user(id)
);

create table post_view(
	id int not null auto_increment primary key,
	viewer_id int,
	post_id int null,
	created_at datetime not null,
	realip varchar(16) not null,
	foreign key (viewer_id) references user(id),
	foreign key (post_id) references post(id)
);


create table widget(
	id int not null auto_increment primary key,
	title varchar(100) not null,
	func varchar(100) not null,
	params text not null,
	status int default 1,
	ord int
);

/*
Kind of config
1.- input text
2.- textarea
3.- number
4.- check
*/

create table config(
	id int not null auto_increment primary key,
	slug varchar(100) not null,
	name varchar(100) not null,
	kind varchar(100) not null default 1,
	description text not null,
	advice text
);

insert into config(slug,name,description) value ("navbar_text","Texto del Navbar ","infoVeg");
insert into config(slug,name,description) value ("site_title","Titulo del sitio","infoVeg");
insert into config(slug,name,description) value ("site_description","Descripcion del Sitio","infoVeg");
insert into config(slug,name,description) value ("ga_code","Codigo de Google Analytics","infoVeg");


