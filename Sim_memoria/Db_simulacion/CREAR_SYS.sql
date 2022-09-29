create table PROCESO(
   id_proceso		INT		not null,
   tamaño	 	FLOAT  		not null,
   duracion		INT	  	not null,
   prioridad		INT	not null	,
   estado      VARCHAR(20) not null     
);

create table MEMORIA(
   id_memoria		INT		not null,
   tamaño	 	FLOAT  		not null		     
);


alter table PROCESO
add CONSTRAINT proceso_pk_id PRIMARY KEY (id_proceso)
;

alter table MEMORIA
add CONSTRAINT memoria_pk_id PRIMARY KEY (id_memoria)
;

