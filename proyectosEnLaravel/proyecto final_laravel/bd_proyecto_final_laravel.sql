
Un freelancer puede ser un desarrollador?

create table Personas(
 id auto increment primary key, 
 nombre String,
 apellidos String,
 correo String unique,
 pais String,
 estado String,
 ciudad String,
);

create table tipos(
  id auto increment primary key, 
  nombre String,(cliente,project_manager,desarrollador)
);

create table usuarios(
  id  int auto increment primary key,
  id_persona references Personas(id)
  id_tipo String references tipos(id), 
  descripcion String,
  id_proyecto  references proyectos(id) 
);



// cli
create table empresas(
  id  int auto increment primary key,
  nombre String,
  pais String,
  estado String,
  ciudad String,
  telefono number,
  direccion String,
);

create table Empresa_contacto(
 id_empresa int references empresas(id),
 id_contacto int references Personas(id),
);

create table proyecto(
  id  int auto increment primary key,
  fecha_inicio timestamp,
  fecha_fina timestamp,
  status String,(preguntar los tipos de status posibles),
  precio decimal,(preguntar nombre apropiado)
);

create table tareas(
   id  int auto increment primary key,
   nombre String,
   descripcion String,
   status String(tipos de status posibles),
   id_proyecto references proyectos(id),
   monto decimal,	
);

create table tarea_desarrollador(
 id_tarea int references tareas(id),
 id_desarrollador int references Personas(id),
);


create table pagos(
   id  int auto increment primary key,
   id_beneficiaro int references Personas(id),
   id_benefactor int references Personas(id),
   monto decimal,
   descripcion String,
   fecha timestamp, 
);


create table inversiones_proyecto(
   id  int auto increment primary key,
   id_proyecto int references proyectos(id), 
   monto decimal,
   descripcion String,
   fecha timestamp  
);

create table incidencias (
   id  int auto increment primary key,
   id_proyecto int references proyectos(id), 
   nombre String,
   descripcion String
);

create table tickets(
   id  int auto increment primary key,
   id_cliente references Personas(id)
);