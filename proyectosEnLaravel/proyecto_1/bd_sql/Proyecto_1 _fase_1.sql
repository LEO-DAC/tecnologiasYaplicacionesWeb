
DROP DATABASE IF EXISTS proyecto_1_fase_1; 
create database proyecto_1_fase_1;
use proyecto_1_fase_1;

create table categoria(
  id_categoria int AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(70),
  descripcion VARCHAR(256),
  condicion boolean 
);

create table articulo(
 id_articulo int(11) AUTO_INCREMENT PRIMARY KEY,
 id_categoria int(11)NOT NULL,
 foreign key(id_categoria) references categoria(id_categoria),
 codigo varchar(50)NOT NULL,
 nombre varchar(100)NOT NULL,
 precio_venta DECIMAL(11,2),
 stock INT,
 descripcion VARCHAR(256),
 condicion boolean
);

CREATE table rol(
  id_rol int PRIMARY KEY,
  nombre varchar(30)NOT NULL,
  descripcion varchar(100)NOT NULL,
  estado tinyint (1)NOT NULL
); 	

create table persona(
 id_persona int AUTO_INCREMENT primary key,
 nombre varchar(100)NOT NULL,
 tipo_documento VARCHAR(20)NOT NULL,
 num_documento VARCHAR(20)NOT NULL,
 direccion VARCHAR(70)NOT NULL,
 telefono VARCHAR(20)NOT NULL,
 email VARCHAR(50)NOT NULL
);

create table usuario(
  id_persona int PRIMARY KEY,
  foreign key(id_persona) references persona(id_persona),
  id_rol int NOT NULL,
  foreign key(id_rol) references rol(id_rol),
  clave varchar(64)NOT NULL,
  condicion boolean NOT NULL
);

create table proveedor(
 id_persona int PRIMARY KEY,
 foreign key(id_persona) references persona(id_persona),
 contacto varchar(50) not null,
 telefono_contacto VARCHAR(50) not null
);

create table ingreso(
  id_ingreso int AUTO_INCREMENT PRIMARY KEY,
  id_proveedor int not null,
  foreign key (id_proveedor) REFERENCES proveedor(id_persona),
  id_usuario int not null,
  FOREIGN KEY (id_usuario) REFERENCES usuario (id_persona),
  tipo_comprobante VARCHAR(20)not null,
  serie_comprobante varchar(7)not null,
  num_comprobante VARCHAR(10)not null,
  fecha_hota DATETIME not null,
  impuesto DECIMAL(4,2) not null,
  total_compra DECIMAL(11,2) not null,
  estado VARCHAR(20) not null
);

create table detalle_ingreso(
  id_detalle int AUTO_INCREMENT PRIMARY KEY,
  id_ingreso int not null,
  FOREIGN KEY(id_ingreso) REFERENCES ingreso(id_ingreso),
  id_articulo int not null,
  FOREIGN KEY(id_articulo) references articulo(id_articulo),
  cantidad int not null,
  precio_compra DECIMAL(11,2)
);

create table venta (
  id_venta int AUTO_INCREMENT PRIMARY KEY,
  id_cliente int not NULL,
  FOREIGN KEY (id_cliente) references persona(id_persona),
  id_usuario int NOT NULL,
  FOREIGN KEY (id_usuario) REFERENCES usuario (id_persona),
  tipo_comprobante VARCHAR(20) NOT NULL,
  serie_comprobante VARCHAR(7) not null,
  num_comprobante varchar(10) not null,
  fecha_hora DATETIME not null,
  impuesto DECIMAL(4,2) not null,
  total_venta DECIMAL(11,2) not null,
  estado VARCHAR(20)
);

create table detalle_venta(
    id_detalle_venta int AUTO_INCREMENT PRIMARY KEY,
    id_venta INT not null,
    FOREIGN KEY(id_venta) references venta(id_venta),
    id_articulo int not null,
    FOREIGN KEY(id_articulo) REFERENCES articulo(id_articulo),
    cantidad int not null,
    precion_venta DECIMAL (11,2) not null,
    descuento DECIMAL (11,2) not null 
);