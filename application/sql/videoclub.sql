drop table socios cascade;

create table socios (
  id       bigserial    constraint pk_socios primary key,
  usuario  varchar(15)  not null constraint uq_socios unique,
  password char(32)     not null,
  email    varchar(100) not null,
  nombre   varchar(100) not null
);

create index idx_socios_usuario on socios (usuario);

drop table peliculas cascade;

create table peliculas (
  id     bigserial    constraint pk_peliculas primary key,
  titulo varchar(100) not null
);

