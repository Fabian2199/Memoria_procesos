create table PROCESO(
   id_proceso		INT		not null,
   tamaño	 	FLOAT  		not null,
   duracion		INT	  	not null,
   prioridad		VARCHAR(20)	not null		     
);

create table MEMORIA(
   id_memoria		INT		not null,
   tamaño	 	FLOAT  		not null		     
);

create table PROCESOS_ACTIVOS(
   id_memoria		INT		not null,
   id_proceso	 	INT 		not null		     
);

create table PROCESOS_TERMINADOS(
   id_memoria		INT		not null,
   id_proceso	 	INT 		not null,
   duracion		DATETIME	not null		     
);


alter table PROCESO
add CONSTRAINT proceso_pk_id PRIMARY KEY (id_proceso)
;

alter table MEMORIA
add CONSTRAINT memoria_pk_id PRIMARY KEY (id_memoria)
;

alter table PROCESOS_ACTIVOS
add CONSTRAINT memoria_fk_id FOREIGN KEY (id_memoria) REFERENCES memoria (id_memoria),
add CONSTRAINT proceso_fk_id FOREIGN KEY (id_proceso) REFERENCES proceso (id_proceso)
;

alter table PROCESOS_TERMINADOS
add CONSTRAINT memoriaT_fk_id FOREIGN KEY (id_memoria) REFERENCES memoria (id_memoria),
add CONSTRAINT procesoT_fk_id FOREIGN KEY (id_proceso) REFERENCES proceso (id_proceso)
;

