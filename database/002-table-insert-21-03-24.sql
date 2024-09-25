-- Eliminar las tablas existentes
DROP TABLE IF EXISTS Calendario,  Proyecto, Equipo, Sprint, Permisos, Rol, Incidencia, Historia, Prioridad, Documento, Usuario, Usuario_Rol, Usuario_Permiso, Reunion, Asiste, Notificacion, Backlog;

-- Inserts para la tabla Calendario
-- INSERT INTO Calendario( fecha, hora, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
-- VALUES ('2022-05-01', '08:00:00', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ('2022-05-02', '09:00:00', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ( '2022-05-03', '10:00:00', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Inserts para la tabla Proyecto
INSERT INTO Proyecto(nombreProyecto, sigla,descripcion, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
VALUES ('Proyecto 1','UMSA-TAR' ,'UMSA Tareas', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
       ('Proyecto 2','CPDEG-DES', 'CUADERNO PEDAGOGICO DESARROLLO', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
       ( 'Proyecto 3','CPEDG-ALS', 'Kanban', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Inserts para la tabla Equipo
 INSERT INTO Equipo( nombreEquipo, descripcion, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
 VALUES ('Equipo 1', 'Desarrollo', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
        ( 'Equipo 2', 'Qa', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
        ( 'Equipo 3', 'Diseño gráfico equipo', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Inserts para la tabla Sprint
INSERT INTO Sprint( nombreSprint, codproyecto,descripcion, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
VALUES ('Sprint 1', 1,'153 Assembler', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
       ('Sprint 2', 1,'165 Operativa II', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
       ('Sprint 3', 1,'166 Inf. y sociedad', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
       ('Sprint 4', 1,'156 Análisis numérico', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
       ('Sprint 5', 1,'164 Teoría de la cod. y prog.', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
       ('Sprint 6', 1,'271 Teoría general de Sistem.', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO Sprint( nombreSprint, codproyecto,descripcion, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
VALUES ('Sprint 1', 2,'Análisis', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
       ('Sprint 2', 2,'Desarrollo', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
       ('Sprint 3', 2,'Mantenimiento', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO Sprint( nombreSprint, codproyecto,descripcion, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
VALUES ('Sprint 1', 3,'Desarrollo', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
       ('Sprint 2', 3,'Mantenimiento', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
       ('Sprint 3', 3,'Examen final', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);            
      
-- Inserts para la tabla Permisos
-- INSERT INTO Permisos( sitio, accion, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
-- VALUES ('Sitio 1', 'Accion 1', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ('Sitio 2', 'Accion 2', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ( 'Sitio 3', 'Accion 3', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Inserts para la tabla Rol
 INSERT INTO Rol( nombreRol, descripcion, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
 VALUES ( 'Administrador', 'Descripcion Rol 1', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
        ( 'Responsable', 'Descripcion Rol 2', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
        ( 'Usuario', 'Descripcion Rol 3', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Inserts para la tabla Incidencia
-- INSERT INTO Incidencia( codProyecto, descripcion, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
-- VALUES ( 1, 'Incidencia 1', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ( 2, 'Incidencia 2', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ( 3, 'Incidencia 3', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Inserts para la tabla Historia
-- INSERT INTO Historia(codSprint, codCalendario, descripcion, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion, tiempoEstimado)
-- VALUES ( 1, 1, 'Historia 1','activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '2:00'),
--        ( 2, 2, 'Historia 2',  'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '3:00'),
--        ( 3, 3, 'Historia 3', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1:00');

      -- Inserts para la tabla Prioridad
INSERT INTO Prioridad(valorPrioridad, bonificacion,estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
VALUES ( 'Alta', 3,'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
       ( 'Media', 2,'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
       (  'Baja', 1,'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Inserts para la tabla Documento
-- INSERT INTO Documento( codHistoria, url, titulo, descripcion, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
-- VALUES ( 1, 'http://url_documento_1.com', 'Documento 1', 'Descripcion Documento 1', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ( 2, 'http://url_documento_2.com', 'Documento 2', 'Descripcion Documento 2', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ( 3, 'http://url_documento_3.com', 'Documento 3', 'Descripcion Documento 3', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Inserts para la tabla Usuario , usuario admin, contraseña:123456
      INSERT INTO Usuario( codEqu, nombre, apellido, nombreUsuario, contrasena, cedulaIdentidad, telefono, correo, fechaNacimiento, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
VALUES (
1, 'Administrador', 'admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '12345678', '1234567890', 'user1@email.com', '1990-01-01', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),(
1, 'Desarrollador', 'user1', 'user1', 'e10adc3949ba59abbe56e057f20f883e', '12345678', '1234567890', 'user1@email.com', '1990-01-01', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),(
1, 'Analista', 'user2', 'user2', 'e10adc3949ba59abbe56e057f20f883e', '12345678', '1234567890', 'user1@email.com', '1990-01-01', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

--INSERT INTO Usuario( codEqu, nombre, apellido, nombreUsuario, contrasena, cedulaIdentidad, telefono, correo, fechaNacimiento, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
-- VALUES ( 1, 'Usuario', 'Uno', 'user1', 'password1', '12345678', '1234567890', 'user1@email.com', '1990-01-01', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        (1, 'Usuario', 'Dos', 'user2', 'password2', '23456789', '2345678901', 'user2@email.com', '1991-02-02', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ( 1, 'Usuario', 'Tres', 'user3', 'password3', '34567890', '3456789012', 'user3@email.com', '1992-03-03', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Inserts para la tabla Usuario_Rol
 INSERT INTO Usuario_Rol( codRol, codUsuario, fechaInicio, fechaFin, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
 VALUES ( 1, 1, '2022-01-01', '2022-12-31', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),(
 1, 1, '2022-01-01', '2022-12-31', 'activo', 2, 2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),(
 1, 1, '2022-01-01', '2022-12-31', 'activo', 3, 3, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Inserts para la tabla Usuario_Permiso
-- INSERT INTO Usuario_Permiso( codPermiso, codUsuario, fechaPermiso, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
-- VALUES (1, 1, '2022-01-01', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ( 2, 1, '2022-01-02', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ( 3, 1, '2022-01-03', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- -- Inserts para la tabla Reunion
-- INSERT INTO Reunion( codCalendario, motivo, descripcion, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
-- VALUES ( 1, 'Reunion 1', 'Descripcion Reunion 1', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ( 2, 'Reunion 2', 'Descripcion Reunion 2', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ( 3, 'Reunion 3', 'Descripcion Reunion 3', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- -- Inserts para la tabla Asiste
-- INSERT INTO Asiste( codUsuario, codReunion, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
-- VALUES ( 1, 1, 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ( 1, 2, 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ( 1, 3, 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- -- Inserts para la tabla Notificacion
-- INSERT INTO Notificacion( codUsuario, contenidoNotificacion, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
-- VALUES ( 1, 'Notificacion 1', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ( 1, 'Notificacion 2', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ( 1, 'Notificacion 3', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- -- Inserts para la tabla Backlog
-- INSERT INTO Backlog( codHistoria, codUsuario_asignado_por, codUsuario_asignado_a, codUsuario_revision, estadoHistoria, estado_registro, creado_por, modificado_por, fecha_creacion, fecha_modificacion)
-- VALUES ( 1, 1, 2, 3, 'backlog', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ( 2, 1, 3, 1, 'backlog', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
--        ( 3, 1, 1, 2, 'backlog', 'activo', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);