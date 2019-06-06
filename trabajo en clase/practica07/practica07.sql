
DROP DATABASE IF EXISTS bd_practica_07; 
create database bd_practica_07;
use bd_practica_07;

create table carrera(
  id int AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(70) 
);

create table profesor(
 id int(11) AUTO_INCREMENT PRIMARY KEY,
 nombres varchar(30)NOT NULL,
 apellidos varchar(30)NOT NULL,
 id_carrera int(11)NOT NULL,
 foreign key(id_carrera) references carrera(id),
 password varchar(30)NOT NULL,
 correo varchar(50)NOT NULL
);

CREATE table alumno(
  matricula int(7) PRIMARY KEY,
  nombres varchar(40)NOT NULL,
  apellidos varchar(40)NOT NULL,
  id_carrera int(11)NOT NULL,
  foreign key (id_carrera) references carrera(id),
  id_tutor int(11) NOT NULL,
  foreign key(id_tutor) references profesor(id)   
); 	

create table materia(
 id int(11) AUTO_INCREMENT PRIMARY KEY,
 nombre varchar(50)NOT NULL,
 clave VARCHAR(15)NOT NULL,
 id_carrera int(11)NOT NULL,
 foreign key(id_carrera) references carrera(id),
 id_profesor int(11)NOT NULL,
 foreign key(id_profesor) references profesor(id)  	
);

create table grupo(
 id int(11) AUTO_INCREMENT primary key,
 cuatrimestre int(11)NOT NULL,
 id_carrera int(11)NOT NULL,
 foreign KEY(id_carrera) references carrera(id) 
);

create table sesion_tutoria(
  id int(11) AUTO_INCREMENT PRIMARY KEY,
  fecha date NOT NULL,
  tipo varchar(100)NOT NULL,
  tema varchar(100)NOT NULL,
  id_profesor int(11) NOT NULL,
  foreign key(id_profesor) references profesor(id)
);

create table grupo_materia(
 id_grupo int (11)NOT NULL,
 id_materia int(11)NOT NULL,
 PRIMARY KEY (id_grupo,id_materia),
 foreign key(id_grupo) references grupo(id),
 foreign key(id_materia) references materia(id)
);

create table materia_alumno(
 id_materia int(11),
 id_alumno int(11),
 PRIMARY KEY(id_materia,id_alumno),
 foreign key(id_materia) references materia(id),
 foreign key(id_alumno) references alumno(matricula)
);

create table sesion_alumno(
 id_sesion int(11)NOT NULL,
 id_alumno int(11)NOT NULL,
 PRIMARY KEY(id_sesion,id_alumno),
 foreign key(id_sesion) references sesion_tutoria(id),
 foreign key(id_alumno) references alumno(matricula)
);



/*CARRERAS*/
insert into carrera (nombre) values ('Ingeniería en Mecatrónica');
insert into carrera (nombre) values ('Ingeniería en tecnologías de Manufactura');
insert into carrera (nombre) values ('Ingeniería en tecnologías de la información');	                      
insert into carrera (nombre) values ('Licenciatura en Administración y Gestión empresarial');
insert into carrera (nombre) values ('Ingeniería en sistemas automotrices');	
