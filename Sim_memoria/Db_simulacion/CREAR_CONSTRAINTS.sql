


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





