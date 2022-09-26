INSERT INTO `planes` (`id_plan`, `nombre_plan`, `Duracion`, `Valor`) VALUES 
('301', 'Plan Mensual', '1 Mes', '80000'), 
('302', 'Plan Trimestral', '3 Meses', '240000'), 
('303', 'Plan Semestral', '6 Meses', '480000'),
('304', 'Plan Anual', '12 Meses', '960000');

INSERT INTO `otros_servicios` (`id_servicio`, `nombre_servicio`, `Duracion`, `Valor`) VALUES 
('401', 'inscripción', '1 añö', '80000'), 
('402', 'N/A', '0', '0');


---rutinas
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Lunes', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Lunes', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Lunes', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Martes', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Martes', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Martes', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Miercoles', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Miercoles', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Jueves', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Viernes', '4', '12');

---prueba factura
INSERT INTO `facturas` (`id_factura`, `fecha_nac`, `id_admin`, `id_cliente`) VALUES ('701', '2022-06-27', 'adm1010136222', 'clt1010136222');
INSERT INTO `detalles_fac` (`id_plan`, `id_factura`, `id_servicio`, `estado_plan`, `fecha_ini`, `fecha_fin`) VALUES ('301', '701', '402', '0', '2022-06-27 13:36:36', '2022-06-27 13:36:36');

--prueba ficha
INSERT INTO `ficha_antropometrica` (`id_ficha`, `id_entrenador`, `id_cliente`, `fecha`, `edad`, `peso`, `estatura`, `cuello`, `hombro`, `pecho`, `espalda`, `br_izq`, `br_der`, `ant_izq`, `ant_der`, `cintura`, `abdomen`, `cadera`, `pr_izq`, `pr_der`, `pnt_izq`, `pnt_der`, `por_grasa`, `valor_tension`, `pulso`, `adipo_tri`, `adipo_abdo`, `adipo_supra`, `adipo_sube`, `t_cuerpo`, `imc`, `embarazo`, `cardiaco`, `hipoglisemia`, `alergias`, `migrana`, `asma`, `les_osea`, `les_musc`, `tens_arterial`, `colesterol`, `trigliceridos`, `observaciones`) 
VALUES ('10001', 'ent40037079', 'clt1010136222', '2022-06-28', '22', '80', '1.80', '20', '10', '45', '50', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '45', '15', '11', '10', '10', '10', 'hombre', '11', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'sano'),
 ('10002', 'ent40037079', 'clt1010136222', '2022-06-29', '22', '80', '1.80', '20', '10', '45', '50', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '45', '15', '11', '10', '10', '10', 'hombre', '11', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'sano'),
  ('10003', 'ent40037079', 'clt1010136222', '2022-06-30', '22', '80', '1.80', '20', '10', '45', '50', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '45', '15', '11', '10', '10', '10', 'hombre', '11', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'sano');

--- consultas
SELECT * FROM detalles_fac d JOIN facturas f on f.id_factura = d.id_factura JOIN usuarios u ON u.id_user = f.id_cliente JOIN personas p ON u.id_persona = p.id_persona;
SELECT r.dia,e.nombre_ejercicio,r.n_series,r.n_rep FROM rutinas r JOIN usuarios u ON r.id_cliente = u.id_user JOIN personas p ON p.id_persona = u.id_persona JOIN ejercicios e ON e.id_ejercicio = r.id_ejercicio WHERE p.id_persona = 1010136222
SELECT * FROM personas p JOIN usuarios u ON p.id_persona = u.id_persona JOIN facturas f ON f.id_cliente = u.id_user JOIN detalles_fac d ON d.id_factura = f.id_factura WHERE f.fecha_nac = 

SELECT MAX(f.fecha_nac) FROM facturas f JOIN usuarios u ON f.id_cliente = u.id_user JOIN personas p ON u.id_persona = p.id_persona WHERE p.id_persona = 1010136222

SELECT * FROM ficha_antropometrica f JOIN usuarios u ON f.id_entrenador = u.id_user JOIN personas p ON p.id_persona = u.id_user 
WHERE f.id_cliente = (SELECT us.id_user FROM usuarios us JOIN personas pe ON us.id_persona = pe.id_persona WHERE pe.id_persona = 1010136222 AND us.tipo_user = 'cliente')

SELECT f.id_ficha, f.fecha FROM ficha_antropometrica f WHERE f.id_cliente = (SELECT us.id_user FROM usuarios us JOIN personas pe ON us.id_persona = pe.id_persona WHERE pe.id_persona = 1010136222 AND us.tipo_user = 'cliente')  

SELECT * FROM ficha_antropometrica f JOIN usuarios u ON f.id_entrenador = u.id_user JOIN personas p ON p.id_persona = u.id_persona WHERE f.id_ficha = 10001