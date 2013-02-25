drop table socios cascade;

create table socios (
  id        bigserial     constraint pk_socios primary key,
  numero    bigint        not null constraint uq_clientes_numero unique,
  nombre    char(70)      not null,
  telefono  numeric(9)
);

insert into socios (numero, nombre, telefono) values (1, 'Javier Bravo', 956366666);

drop table peliculas cascade;

create table peliculas (
  id      bigserial     constraint pk_peliculas primary key,
  codigo  bigint        not null  constraint uq_peliculas_codigo unique,
  titulo  varchar(50)   not null,
  precio  numeric(5)  not null default 0
);

insert into peliculas (codigo, titulo, precio) values (06, 'Pulp Fiction', 1.25);
insert into peliculas (codigo, titulo, precio) values (50, 'Equilibrium', 1.8);
insert into peliculas (codigo, titulo, precio) values (37, 'La Jungla de Cristal', 1.0);
insert into peliculas (codigo, titulo, precio) values (69, 'Amanecer de los muertos (1978)', 1.50);

drop table alquileres cascade;

create table alquileres (
  id            bigserial   constraint pk_alquileres primary key,
  socios_id      bigint     /*not null constraint fk_id_socio*/
                            references socios (id)
                            on delete no action on update cascade,
  peliculas_id   bigint     /*not null constraint fk_id_pelicula*/
                            references peliculas (id)
                            on delete no action on update cascade,
  falq          date        not null default current_date,
  fdev          date        default null
);

/*insert into alquileres (socios_id, peliculas_id, falq)
values (1, 1, current_date);*/
