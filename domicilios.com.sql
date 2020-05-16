CREATE TABLE tienda (
	id_tienda int(10) NOT NULL AUTO_INCREMENT UNIQUE,
	nombre varchar(20) not null,
	nit varchar(15) not null unique,
	fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id_tienda)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE producto (
	id_producto int(10) NOT NULL AUTO_INCREMENT UNIQUE,
	id_tienda int not null,
	nombre varchar(20) not null,
	descripcion varchar(255),
	precio_unitario integer not null,
	fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id_producto),
	FOREIGN KEY (id_tienda) REFERENCES tienda(id_tienda) ON DELETE CASCADE ON UPDATE CASCADE 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


insert into tienda(nombre, nit) values 
('Betel', '1112'),
('D1', '1113');

insert into producto (id_tienda, nombre, descripcion, precio_unitario) values 
(1, 'Papas 1', '', 10),
(1, 'Papas 2', '', 12),
(1, 'Papas 3', '', 14),
(1, 'Papas 4', '', 16),
(1, 'Papas 5', '', 18),

(2, 'Pasteles 1', '', 10),
(2, 'Pasteles 2', '', 12),
(2, 'Pasteles 3', '', 14),
(2, 'Pasteles 4', '', 16),
(2, 'Pasteles 5', '', 18);

CREATE TABLE cliente (
	id_cliente int(10) NOT NULL AUTO_INCREMENT UNIQUE,
	nombre varchar(20) not null,
	telefono varchar(15) not null,
	correo_electronico varchar(15) not null,
	fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id_cliente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE pedido (
	id_pedido int(10) NOT NULL AUTO_INCREMENT UNIQUE,
	id_cliente int not null,
	direccion VARCHAR(255) NOT NULL,
	valor_total int not null default 0,
	fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id_pedido),
	FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente) ON DELETE CASCADE ON UPDATE CASCADE 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE pedido_detalle (
	id_pedido_detalle int(10) NOT NULL AUTO_INCREMENT UNIQUE,
	id_producto int not null,
	id_pedido int not null,
	valor_unitario int not null default 0,
	cantidad int not null default 0,
	fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id_pedido_detalle),
	FOREIGN KEY (id_producto) REFERENCES producto(id_producto) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE usuario (
	id_usuario int(10) NOT NULL AUTO_INCREMENT UNIQUE,
	username varchar(20) not null UNIQUE,
	password varchar(20) not null,
	nombre varchar(20) not null,
	telefono varchar(15) not null unique,
	correo_electronico varchar(15) not null unique,
	fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

