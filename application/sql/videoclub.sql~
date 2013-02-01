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

