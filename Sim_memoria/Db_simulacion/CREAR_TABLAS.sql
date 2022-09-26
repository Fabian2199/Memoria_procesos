

create table PROCESO(
   id_proceso		INT		not null,
   tamaño	 	FLOAT  		not null,
   duracion		DATETIME  	not null,
   prioridad		 INT	     	not null		     
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