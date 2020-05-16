CREATE DATABASE andres_usuarios;
USE andres_usuarios;

CREATE TABLE usuarios (
  id int(11) NOT NULL,
  nombre varchar(20) NOT NULL,
  apellido varchar(20) NOT NULL,
  email varchar(20) NOT NULL,
  username varchar(20) NOT NULL,
  password varchar(20) NOT NULL,
  activado tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO usuarios (id, nombre, apellido, email, username, password, activado) VALUES
(1, 'omar', 'ramón', 'oma@gmail.c', 'omarrm', '12345', 0);

ALTER TABLE usuarios
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY username (username);

ALTER TABLE usuarios
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
