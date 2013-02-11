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
  id                  bigserial    constraint pk_peliculas primary key,
  titulo              varchar(100) not null,
  precio              numeric(6,2) not null,
  genero              varchar(20) ,
  director            varchar(50),
  duracion            numeric(3),
  descripcion         varchar (500),
  anio                numeric(4) not null,
  fecha_lanzamiento   date not null,
  url_imagen          varchar(200) not null
);

insert into peliculas (titulo, precio, genero, director, duracion, descripcion, anio, fecha_lanzamiento, url_imagen) 
    values('El ataque de los tomates asesinos', 1, 'terror', 'Walter Simons', 95, 'Cuando los tomates cobran vida ...', 1978,'1978-05-12', 'http://adjuntos.estamosrodando.com/imagen/el-ataque-de-los-tomates-asesinos-147175.jpg');
  insert into peliculas (titulo, precio, genero, director, duracion, descripcion, anio, fecha_lanzamiento, url_imagen) 
    values('La bala que doblo la esquina', 8, 'western', 'Manolito Palotes', 145, 'Balas en contra de la fisica que ...', 1982,'1982-09-06', 'http://www.revistaarmas.com/wp-content/uploads/2010/04/A-cubierto-8.jpg');

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

drop table reservas cascade;

create table reservas (
  id            bigserial         constraint pk_reservas primary key,
  id_socio      bigint            not null constraint fk_reservas_socios
                                  references socios (id) on delete cascade
                                  on update cascade,
  id_pelicula   bigint            not null constraint fk_reservas_peliculas
                                  references peliculas (id) on delete cascade on 
                                  update cascade,
  f_alquiler    date,
  f_devolucion  date
);

insert into reservas (id_socio, id_pelicula, f_alquiler, f_devolucion) 
  values(1, 1, current_date, current_date+4);
insert into reservas (id_socio, id_pelicula, f_alquiler, f_devolucion) 
  values(3, 2, current_date-2, (current_date-2)+4);
