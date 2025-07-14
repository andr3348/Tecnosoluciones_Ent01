DROP TABLE IF EXISTS rol_usuario CASCADE;
DROP TABLE IF EXISTS usuario CASCADE;
DROP TABLE IF EXISTS proyecto CASCADE;
DROP TABLE IF EXISTS usuario_proyecto CASCADE;

CREATE TABLE rol_usuario (
	id_rol SERIAL PRIMARY KEY,
	nombre VARCHAR(60) NOT NULL
);


CREATE TABLE usuario (
	id_usuario SERIAL PRIMARY KEY,
	nombre VARCHAR(30) NOT NULL,
	correo VARCHAR(60) NOT NULL UNIQUE,
	passw VARCHAR(60) NOT NULL,
	
	id_rol INT NULL REFERENCES rol_usuario(id_rol) ON DELETE SET NULL
);

CREATE TABLE proyecto (
	id_proyecto SERIAL PRIMARY KEY,
	titulo VARCHAR(30) NOT NULL,
	descripcion VARCHAR(100) DEFAULT 'NO HAY DESCRIPCIÓN'
);

CREATE TABLE usuario_proyecto (
	id_usuario INT REFERENCES usuario(id_usuario) ON DELETE CASCADE,
	id_proyecto INT REFERENCES proyecto(id_proyecto) ON DELETE CASCADE,
	PRIMARY KEY (id_usuario,id_proyecto)
);

INSERT INTO rol_usuario(nombre) 
VALUES ('admin'),('empleado'),('cliente');

INSERT INTO usuario(nombre,correo,passw,id_rol)
VALUES ('Ana','ana@gmail.com','12354',1),
	('Luis','luis@gmail.com','abced',2),
	('Marcos','marcos@gmail.com','pomxml',3);

INSERT INTO proyecto (titulo,descripcion)
VALUES ('proyecto A','migración de base de datos'),
	('proyecto B','creacion de api rest'),
	('proyecto D', 'creación de api GraphQL'),
	('proyecto E', 'creacion de base de datos en postgresql');

INSERT INTO proyecto (titulo)
VALUES ('proyecto C');

INSERT INTO usuario_proyecto (id_usuario,id_proyecto)
VALUES (1,1), (1,2), (2,1), (2,3),(2,5);

SELECT * FROM usuario;