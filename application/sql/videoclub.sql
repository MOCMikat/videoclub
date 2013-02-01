drop table socios cascade;

create table socios (
  id       bigserial    constraint pk_socios primary key,
  usuario  varchar(15)  not null constraint uq_socios unique,
  password char(32)     not null,
  email    varchar(100) not null,
  nombre   varchar(100) not null,
	telefono varchar(12)
);

insert into socios (usuario, password, email, nombre, telefono) values('pepe', md5('pepe'), 'aga@pito.es', 'Pepe Marquez', '956000000' );
insert into socios (usuario, password, email, nombre, telefono) values('juan', md5('juan'), 'juan@pito.es', 'Juan Palomo', '956000001' );
insert into socios (usuario, password, email, nombre, telefono) values('luci', md5('luci'), 'luciano@pito.es', 'Luciano Ramos Tirado', '956000002' );

create index idx_socios_usuario on socios (usuario);

drop table peliculas cascade;

create table peliculas (
  id          bigserial    constraint pk_peliculas primary key,
  titulo      varchar(100) not null,
  precio      numeric(6,2) not null,
  genero      varchar(20) ,
  director    varchar(50),
  duracion    numeric(3),
  descripcion varchar (500),
  anio        numeric(4) not null
);

insert into peliculas (titulo, precio, genero, director, duracion, descripcion, anio) 
    values('El ataque de los tomates asesinos', 1, 'terror', 'Walter Simons', 95, 'Cuando los tomates cobran vida ...', 1979);
  insert into peliculas (titulo, precio, genero, director, duracion, descripcion, anio) 
    values('El ataque de los tomates asesinos', 8, 'western', 'Walter Simons', 145, 'Balas en contra de la fisica que ...', 1982);

create index idx_peliculas_titulo on peliculas (titulo);
create index idx_peliculas_anio on peliculas (anio);

drop table ci_sessions cascade;

CREATE TABLE ci_sessions (
	session_id varchar(40) DEFAULT '0' NOT NULL,
	ip_address varchar(45) DEFAULT '0' NOT NULL,
	user_agent varchar(120) NOT NULL,
	last_activity bigint DEFAULT 0 NOT NULL,
	user_data text NOT NULL,
	PRIMARY KEY (session_id)
);

create index last_activity_idx on ci_sessions (last_activity);

