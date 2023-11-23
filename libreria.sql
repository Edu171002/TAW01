create database tiendaCafe;

use tiendaCafe;

create table Usuarios 
(
	email char(100) not null primary key,
	pass char(20) not null,
	nombre char(60) not null,
	apellidos char(60) not null,
	telefono char(15),
	direccion char(100) not null,
	ciudad char(100) not null,
	fecha_nac date not null,
	privilegio tinyint not null
);

create table pedidos
(
	id_pedido int unsigned not null auto_increment primary key,
	email char(100) not null,
	fecha_hora datetime not null,
	coste_total float(8,2) not null
);

create table productos
(
	id_producto int unsigned not null auto_increment primary key,
	nombre char(30) not null,
	descripcion text,
	precio float(6,2) not null,
	imagen char(255) not null,
	categoria tinyint not null
);

create table pedido_productos
(
	id_pedido int unsigned not null,
	id_producto int unsigned not null,
	cantidad int unsigned not null,
	primary key (id_pedido, id_producto)
);