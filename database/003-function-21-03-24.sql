---------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
-- funciones
-- insertar un nuevo registro
-- consulta
-- funcion
CREATE OR REPLACE FUNCTION fn_insertar_documento(
    p_codHistoria INTEGER,
    p_url VARCHAR,
    p_titulo VARCHAR,
    p_usucreado INTEGER,
    p_descripcion VARCHAR)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        INSERT INTO Documento (
            codHistoria,
            url,
            titulo,
            descripcion,
            estado_registro,
            creado_por,
            fecha_creacion
        )
        VALUES (
            p_codHistoria,
            p_url,
            p_titulo,
            p_descripcion,
            'activo',
            p_usucreado,
            CURRENT_TIMESTAMP
        );
        result := '{"estado": "exitoso", "mensaje": "null"}';
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- -- consulta ayuda
-- SELECT  *  FROM documento d ;
-- --
-- INSERT INTO Documento  ( codHistoria, url, titulo, descripcion, estado_registro, creado_por, fecha_creacion)
-- VALUES
-- ( 1, 'https://www.example.com/doc1.pdf', 'Documento de prueba', 'Este es un documento de prueba.', 'activo', 1,  TIMESTAMP '2022-03-01 00:00:00');

-- -- llamada funcion
-- SELECT fn_insertar_documento(1, 'https://www.example.com/doc1.pdf', 'Documento de prueba',2, 'Este es un documento de prueba');

----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
-- funciones
-- insertar un nuevo registro en sprint
-- funcion
CREATE OR REPLACE FUNCTION  fn_insertar_sprint(
    p_nombreSprint VARCHAR,
    p_descripcion VARCHAR,
    p_creado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        INSERT INTO Sprint (
            nombreSprint,
            descripcion,
            estado_registro,
            creado_por,
            fecha_creacion
        )
        VALUES (
            p_nombreSprint,
            p_descripcion,
            'activo',
            p_creado_por,
            CURRENT_TIMESTAMP
        );
        result := '{"estado": "exitoso", "mensaje": "null"}';
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- --consulta ayuda
-- SELECT   * FROM sprint s
-- -- consulta ayuda
-- INSERT INTO Sprint  (nombreSprint, descripcion, estado_registro, creado_por, fecha_creacion) VALUES ( 'Sprint 1', 'Este es el primer sprint del proyecto.', 'activo',  1, CURRENT_TIMESTAMP);
-- -- consulta ayuda
-- SELECT fn_insertar_sprint('Sprint 1', 'Este es el primer sprint del proyecto.',2);

----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
--crear nuevo proyecto
-- funcion
CREATE OR REPLACE FUNCTION fn_insertar_proyecto(
    p_nombreProyecto VARCHAR,
    p_descripcion VARCHAR,
    p_creado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        INSERT INTO Proyecto (
            nombreProyecto,
            descripcion,
            estado_registro,
            creado_por,
            fecha_creacion
        )
        VALUES (
            p_nombreProyecto,
            p_descripcion,
            'activo',
            p_creado_por,
            CURRENT_TIMESTAMP
        );
        result := '{"estado": "exitoso", "mensaje": "null"}';
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- --consulta ayuda
-- SELECT * FROM proyecto p ;
-- --consulta ayuda
-- INSERT INTO Proyecto
-- ( nombreProyecto, descripcion, estado_registro, creado_por, fecha_creacion)
-- VALUES
-- ( 'Proyecto 1', 'Este es el primer proyecto.', 'activo', 1,  CURRENT_TIMESTAMP);
-- --consulta llamada funcion
-- SELECT fn_insertar_proyecto('Proyecto 1', 'Este es el primer proyecto.', 1);

----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
--crear una nueva prioridad
-- funcion
CREATE OR REPLACE FUNCTION fn_insertar_prioridad(
    p_codHistoria INTEGER,
    p_bonificacion integer,
    p_valorPrioridad VARCHAR,
    p_creado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        INSERT INTO Prioridad (
            codHistoria,
            bonificacion,
            valorPrioridad,
            estado_registro,
            creado_por,
            fecha_creacion
        )
        VALUES (
            p_codHistoria,
            p_bonificacion,
            p_valorPrioridad,
            'activo',
            p_creado_por,
            CURRENT_TIMESTAMP
        );
        result := '{"estado": "exitoso", "mensaje": "null"}';
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- --consulta ayuda
-- SELECT * FROM prioridad p
-- --consulta ayuda
-- INSERT INTO Prioridad
-- ( codHistoria, valorPrioridad, estado_registro, creado_por, fecha_creacion)
-- VALUES
-- ( 1, 'Alta', 'activo', 1, CURRENT_TIMESTAMP);
-- --consulta llamada funcion
-- SELECT fn_insertar_prioridad(1, 3,'Alta',1);
----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
--funcion nueva historia
-- funcion
CREATE OR REPLACE FUNCTION fn_insertar_historia(
    p_codSprint INTEGER,
    p_codCalendario INTEGER,
    p_codPrioridad INTEGER,
    p_tiempoEstimado VARCHAR,
    p_descripcion VARCHAR,
    p_creado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        INSERT INTO Historia (
            codSprint,
            codCalendario,
            codPrioridad,
            tiempoEstimado,
            descripcion,
            estado_registro,
            creado_por,
            fecha_creacion
        )
        VALUES (
            p_codSprint,
            p_codCalendario,
            p_codPrioridad,
            p_tiempoEstimado,
            p_descripcion,
            'activo',
            p_creado_por,
            CURRENT_TIMESTAMP
        );
        result := '{"estado": "exitoso", "mensaje": "null"}';
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- --consulta ayuda
-- SELECT * FROM historia h
-- --consulta ayuda
-- --consulta llamada funcion
-- SELECT fn_insertar_historia(1, 1, 1, '2 semanas', 'Historia de usuario 1', 1);
----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
--funcion nuevo backlog
-- funcion
CREATE OR REPLACE FUNCTION fn_insertar_backlog(
    p_codHistoria INTEGER,
    p_codUsuario_asignado_por INTEGER,
    p_codUsuario_asignado_a INTEGER,
    p_codUsuario_revision INTEGER,
    p_estadoHistoria VARCHAR,
    p_creado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        INSERT INTO Backlog (
            codHistoria,
            codUsuario_asignado_por,
            codUsuario_asignado_a,
            codUsuario_revision,
            estadoHistoria,
            estado_registro,
            creado_por,
            fecha_creacion
        )
        VALUES (
            p_codHistoria,
            p_codUsuario_asignado_por,
            p_codUsuario_asignado_a,
            p_codUsuario_revision,
            p_estadoHistoria,
            'activo',
            p_creado_por,
            CURRENT_TIMESTAMP
        );
        result := '{"estado": "exitoso", "mensaje": "null"}';
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- --consulta ayuda
-- SELECT * FROM backlog b ;
-- --consulta ayuda
-- INSERT INTO Backlog
-- ( codHistoria, codUsuario_asignado_por, codUsuario_asignado_a, codUsuario_revision, estadoHistoria, estado_registro, creado_por,  fecha_creacion)
-- VALUES
-- ( 1, 1, 2, 3, 'En progreso', 'activo', 1, CURRENT_TIMESTAMP);
-- --consulta llamada funcion
-- SELECT fn_insertar_backlog(1, 1, 2, 3, 'En progreso', 1);
----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
--funcion nuevo calendario
-- funcion
CREATE OR REPLACE FUNCTION fn_insertar_calendario(
    p_fecha DATE,
    p_hora TIME,
    p_creado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        INSERT INTO Calendario (
            fecha,
            hora,
            estado_registro,
            creado_por,
            fecha_creacion
        )
        VALUES (
            p_fecha,
            p_hora,
            'activo',
            p_creado_por,
            CURRENT_TIMESTAMP
        );
        result := '{"estado": "exitoso", "mensaje": "null"}';
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- --consulta ayuda
-- SELECT * FROM calendario c ;
-- --consulta ayuda
-- INSERT INTO Calendario
-- (fecha, hora, estado_registro, creado_por, fecha_creacion)
-- VALUES
-- ('2022-03-01', '10:00:00', 'activo', 1, CURRENT_TIMESTAMP);
-- --consulta llamada funcion
-- SELECT fn_insertar_calendario('2022-03-01', '10:00:00', 1);
----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
--funcion nueva
--consulta ayuda
-- funcion
CREATE OR REPLACE FUNCTION fn_insertar_incidencia(
    p_codProyecto INTEGER,
    p_descripcion VARCHAR,
    p_creado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        INSERT INTO Incidencia (
            codProyecto,
            descripcion,
            estado_registro,
            creado_por,
            fecha_creacion
        )
        VALUES (
            p_codProyecto,
            p_descripcion,
            'activo',
            p_creado_por,
            CURRENT_TIMESTAMP
        );
        result := '{"estado": "exitoso", "mensaje": "null"}';
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- INSERT INTO Incidencia
-- (codProyecto, descripcion, estado_registro, creado_por, fecha_creacion)
-- VALUES
-- (1, 'Incidencia 1', 'activo', 1, CURRENT_TIMESTAMP);
-- --consulta ayuda

-- --consulta llamada funcion
-- SELECT fn_insertar_incidencia(1, 'Incidencia 1', 1);
----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
--funcion actualizar documento
--consulta ayuda
-- SELECT * FROM documento d ;
--consulta ayuda

--consulta llamada funcion
--SELECT fn_modificar_documento(1, 1, 'https://www.example.com/doc1_updated.pdf', 'Documento de prueba actualizado', 'Este es un documento de prueba actualizado.', 1);
-- funcion
CREATE OR REPLACE FUNCTION fn_modificar_documento(
    p_codDocumento INTEGER,
    p_codHistoria INTEGER,
    p_url VARCHAR,
    p_titulo VARCHAR,
    p_descripcion VARCHAR,
    p_modificado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        UPDATE Documento
        SET
            codHistoria = p_codHistoria,
            url = p_url,
            titulo = p_titulo,
            descripcion = p_descripcion,
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE
            codDocumento = p_codDocumento;
        IF FOUND THEN
            result := '{"estado": "exitoso", "mensaje": "null"}';
        ELSE
            result := '{"estado": "error", "mensaje": "No se encontró el Documento para actualizar"}';
        END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;

----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
--funcion actualizar sprint
-- funcion
CREATE OR REPLACE FUNCTION fn_modificar_sprint(
    p_codSprint INTEGER,
    p_codProyecto INTEGER,
    p_nombreSprint VARCHAR,
    p_descripcion VARCHAR,
    p_modificado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        UPDATE Sprint
        SET
            nombreSprint = p_nombreSprint,
            descripcion = p_descripcion,
            codproyecto = p_codProyecto,
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE
            codSprint = p_codSprint;
        IF FOUND THEN
            result := '{"estado": "exitoso", "mensaje": "null"}';
        ELSE
            result := '{"estado": "error", "mensaje": "No se encontró el Sprint para actualizar"}';
        END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- --consulta ayuda
-- SELECT * FROM sprint s ;
-- --consulta ayuda

-- --consulta llamada funcion
-- SELECT fn_modificar_sprint(1, 1,'Sprint 1 actualizado', 'Este es el primer sprint del proyecto actualizado.', 1);
----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
--funcion actualizar proyecto
-- funcion
CREATE OR REPLACE FUNCTION fn_modificar_proyecto(
    p_codProyecto INTEGER,
    p_nombreProyecto VARCHAR,
    p_descripcion VARCHAR,
    p_modificado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        UPDATE Proyecto
        SET
            nombreProyecto = p_nombreProyecto,
            descripcion = p_descripcion,
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE
            codProyecto = p_codProyecto;
        IF FOUND THEN
            result := '{"estado": "exitoso", "mensaje": "null"}';
        ELSE
            result := '{"estado": "error", "mensaje": "No se encontró el Proyecto para actualizar"}';
        END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- --consulta ayuda
-- SELECT * FROM proyecto p ;
-- --consulta ayuda

-- --consulta llamada funcion
-- SELECT fn_modificar_proyecto(1, 'Proyecto 1 actualizado', 'Este es el primer proyecto actualizado.', 1);
----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
--funcion actualizar prioridad
-- funcion
CREATE OR REPLACE FUNCTION fn_modificar_prioridad(
    p_codPrioridad INTEGER,
    p_bonificacion INTEGER,
    p_codHistoria INTEGER,
    p_valorPrioridad VARCHAR,
    p_modificado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        UPDATE Prioridad
        SET
            codHistoria = p_codHistoria,
            bonificacion = p_bonificacion,
            valorPrioridad = p_valorPrioridad,
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE
            codPrioridad = p_codPrioridad;
        IF FOUND THEN
            result := '{"estado": "exitoso", "mensaje": "null"}';
        ELSE
            result := '{"estado": "error", "mensaje": "No se encontró la Prioridad para actualizar"}';
        END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- --consulta ayuda
-- SELECT * FROM  prioridad p ;
-- --consulta ayuda

-- --consulta llamada funcion
-- SELECT fn_modificar_prioridad(1, 1, 'Media', 1);
----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
--funcion actualizar historia
-- funcion
CREATE OR REPLACE FUNCTION fn_modificar_historia(
    p_codHistoria INTEGER,
    p_codSprint INTEGER,
    p_codCalendario INTEGER,
    p_codPrioridad INTEGER,
    p_tiempoEstimado VARCHAR,
    p_descripcion VARCHAR,
    p_modificado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        UPDATE Historia
        SET
            codSprint = p_codSprint,
            codCalendario = p_codCalendario,
            codPrioridad = p_codPrioridad,
            tiempoEstimado = p_tiempoEstimado,
            descripcion = p_descripcion,
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE
            codHistoria = p_codHistoria;
        IF FOUND THEN
            result := '{"estado": "exitoso", "mensaje": "null"}';
        ELSE
            result := '{"estado": "error", "mensaje": "No se encontró la Historia para actualizar"}';
        END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- --consulta ayuda
-- SELECT * FROM historia h ;
-- --consulta ayuda

-- --consulta llamada funcion
-- SELECT fn_modificar_historia(1, 1, 1, 1, '3 semanas', 'Historia de usuario 1 actualizada', 1);
----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
--funcion actualizar backlog
-- funcion
CREATE OR REPLACE FUNCTION fn_modificar_backlog(
    p_codBacklog INTEGER,
    p_codHistoria INTEGER,
    p_codUsuario_asignado_por INTEGER,
    p_codUsuario_asignado_a INTEGER,
    p_codUsuario_revision INTEGER,
    p_estadoHistoria VARCHAR,
    p_modificado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        UPDATE Backlog
        SET
            codHistoria = p_codHistoria,
            codUsuario_asignado_por = p_codUsuario_asignado_por,
            codUsuario_asignado_a = p_codUsuario_asignado_a,
            codUsuario_revision = p_codUsuario_revision,
            estadoHistoria = p_estadoHistoria,
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE
            codBacklog = p_codBacklog;
        IF FOUND THEN
            result := '{"estado": "exitoso", "mensaje": "null"}';
        ELSE
            result := '{"estado": "error", "mensaje": "No se encontró el Backlog para actualizar"}';
        END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- --consulta ayuda
-- SELECT * FROM backlog b ;
-- --consulta ayuda

-- --consulta llamada funcion
-- SELECT fn_modificar_backlog(1, 1, 1, 2, 3, 'En revisión', 1);
----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
--funcion actualizar calendario
-- funcion
CREATE OR REPLACE FUNCTION fn_modificar_calendario(
    p_codCalendario INTEGER,
    p_fecha DATE,
    p_hora TIME,
    p_modificado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        UPDATE Calendario
        SET
            fecha = p_fecha,
            hora = p_hora,
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE
            codCalendario = p_codCalendario;
        IF FOUND THEN
            result := '{"estado": "exitoso", "mensaje": "null"}';
        ELSE
            result := '{"estado": "error", "mensaje": "No se encontró el Calendario para actualizar"}';
        END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- --consulta ayuda
-- SELECT * FROM calendario c ;
-- --consulta ayuda

-- --consulta llamada funcion
-- SELECT fn_modificar_calendario(1, '2022-03-02', '11:00:00', 1);
----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
--funcion actualizar incidencia;
-- funcion
CREATE OR REPLACE FUNCTION fn_modificar_incidencia(
    p_codIncidencia INTEGER,
    p_codProyecto INTEGER,
    p_descripcion VARCHAR,
    p_modificado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        UPDATE Incidencia
        SET
            codProyecto = p_codProyecto,
            descripcion = p_descripcion,
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE
            codIncidencia = p_codIncidencia;
        IF FOUND THEN
            result := '{"estado": "exitoso", "mensaje": "null"}';
        ELSE
            result := '{"estado": "error", "mensaje": "No se encontró la Incidencia para actualizar"}';
        END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- --consulta ayuda
-- SELECT * FROM  incidencia i ;
-- --consulta ayuda

-- --consulta llamada funcion
-- SELECT fn_modificar_incidencia(1, 1, 'Incidencia 1 actualizada', 1);
------------------------------------------------------------------------
------------------------------------------------------------------------
-- Eliminar: backlog
-- Funcion
CREATE OR REPLACE FUNCTION fn_eliminar_backlog(
    p_codBacklog INTEGER, 
    p_modificado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        UPDATE Backlog 
        SET 
            estado_registro = 'eliminado',
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE 
            codBacklog = p_codBacklog;
        IF FOUND THEN
            result := '{"estado": "exitoso", "mensaje": "null"}';
        ELSE
            result := '{"estado": "error", "mensaje": "No se encontró el Backlog para eliminar"}';
        END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- -- Consulta ayuda
-- SELECT * FROM backlog b ;
-- -- Llamada a funcion
-- SELECT fn_eliminar_backlog(1, 1);
------------------------------------------------------------------------
-- Eliminar: calendario
-- Funcion
CREATE OR REPLACE FUNCTION fn_eliminar_calendario(
    p_codCalendario INTEGER, 
    p_modificado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        UPDATE Calendario 
        SET 
            estado_registro = 'eliminado',
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE 
            codCalendario = p_codCalendario;
        IF FOUND THEN
            result := '{"estado": "exitoso", "mensaje": "null"}';
        ELSE
            result := '{"estado": "error", "mensaje": "No se encontró el Calendario para eliminar"}';
        END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- -- Consulta ayuda
-- SELECT * FROM calendario c ;
-- -- Llamada a funcion
-- SELECT fn_eliminar_calendario(1, 1);
------------------------------------------------------------------------
-- Eliminar: documento
-- Funcion
CREATE OR REPLACE FUNCTION fn_eliminar_historia(
    p_codbacklog INTEGER, 
    p_modificado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
    v_codhistoria INTEGER;
BEGIN
    BEGIN
	    SELECT b.codhistoria INTO v_codhistoria FROM backlog b WHERE b.codbacklog = p_codbacklog;
	    
        UPDATE backlog  
        SET 
            estado_registro = 'inactivo',
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE 
            codbacklog  = p_codbacklog;
           
        UPDATE historia
        SET 
            estado_registro = 'inactivo',
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE 
            codHistoria = v_codhistoria;
        IF FOUND THEN
            result := '{"estado": "exitoso", "mensaje": "null"}';
        ELSE
            result := '{"estado": "error", "mensaje": "No se encontró la Historia para eliminar"}';
        END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- -- Consulta ayuda
-- SELECT * FROM documento d ;
-- -- Llamada a funcion
-- SELECT fn_eliminar_documento(1, 1);
------------------------------------------------------------------------
CREATE OR REPLACE FUNCTION fn_historia_revisada(
    p_codbacklog INTEGER, 
    p_modificado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
    v_codhistoria INTEGER;
BEGIN
    BEGIN
	    SELECT b.codhistoria INTO v_codhistoria FROM backlog b WHERE b.codbacklog = p_codbacklog;
	    
        UPDATE backlog  
        SET 
            estado_registro = 'inactivo',
            codusuario_revision = p_modificado_por,
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE 
            codbacklog  = p_codbacklog;
           
        UPDATE historia
        SET 
            estado_registro = 'inactivo',
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE 
            codHistoria = v_codhistoria;
        IF FOUND THEN
            result := '{"estado": "exitoso", "mensaje": "null"}';
        ELSE
            result := '{"estado": "error", "mensaje": "No se encontró la Historia para eliminar"}';
        END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- SELECT fn_historia_revisada(11, 3);
------------------------------------------------------------------------
-- Eliminar: historia
CREATE OR REPLACE FUNCTION fn_eliminar_historia(
    p_codBacklog INTEGER, 
    p_modificado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
   v_codHistoria INTEGER;
BEGIN
    BEGIN
	    SELECT b.codhistoria INTO v_codHistoria FROM backlog b WHERE b.codbacklog =p_codBacklog ;
       UPDATE backlog
        SET 
            estado_registro = 'eliminado',
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE 
            codbacklog = p_codBacklog; 
	   UPDATE Historia 
        SET 
            estado_registro = 'eliminado',
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE 
            codHistoria = v_codHistoria;
        IF FOUND THEN
            result := '{"estado": "exitoso", "mensaje": "null"}';
        ELSE
            result := '{"estado": "error", "mensaje": "No se encontró la Historia para eliminar"}';
        END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- -- Consulta ayuda
-- SELECT *FROM historia h ;
-- -- Llamada a funcion
-- SELECT fn_eliminar_historia(1, 1);
-- -- Funcio
-- DROP FUNCTION fn_eliminar_historia(integer,integer)
------------------------------------------------------------------------
-- Eliminar: incidencia
-- Funcion
CREATE OR REPLACE FUNCTION fn_eliminar_incidencia(
    p_codIncidencia INTEGER, 
    p_modificado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        UPDATE Incidencia 
        SET 
            estado_registro = 'eliminado',
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE 
            codIncidencia = p_codIncidencia;
        IF FOUND THEN
            result := '{"estado": "exitoso", "mensaje": "null"}';
        ELSE
            result := '{"estado": "error", "mensaje": "No se encontró la Incidencia para eliminar"}';
        END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- -- Consulta ayuda
-- SELECT * FROM incidencia i ;
-- -- Llamada a funcion
-- SELECT fn_eliminar_incidencia(1,1);
------------------------------------------------------------------------
-- Eliminar: prioridad
-- Funcion
CREATE OR REPLACE FUNCTION fn_eliminar_prioridad(
    p_codPrioridad INTEGER, 
    p_modificado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        UPDATE Prioridad 
        SET 
            estado_registro = 'eliminado',
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE 
            codPrioridad = p_codPrioridad;
        IF FOUND THEN
            result := '{"estado": "exitoso", "mensaje": "null"}';
        ELSE
            result := '{"estado": "error", "mensaje": "No se encontró la Prioridad para eliminar"}';
        END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- -- Consulta ayuda
-- SELECT * FROM  prioridad p  ;
-- -- Llamada a funcion
-- SELECT fn_eliminar_prioridad(1, 1);
------------------------------------------------------------------------
-- Eliminar: proyecto
-- Funcion
CREATE OR REPLACE FUNCTION fn_eliminar_proyecto(
    p_codProyecto INTEGER, 
    p_modificado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        UPDATE Proyecto 
        SET 
            estado_registro = 'eliminado',
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE 
            codProyecto = p_codProyecto;
        IF FOUND THEN
            result := '{"estado": "exitoso", "mensaje": "null"}';
        ELSE
            result := '{"estado": "error", "mensaje": "No se encontró el Proyecto para eliminar"}';
        END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- -- Consulta ayuda
-- SELECT * FROM  proyecto p ;
-- -- Llamada a funcion
-- SELECT fn_eliminar_proyecto(1, 1);
------------------------------------------------------------------------
-- Eliminar: sprint
-- Funcion
CREATE OR REPLACE FUNCTION fn_eliminar_sprint(
    p_codSprint INTEGER, 
    p_modificado_por INTEGER)
RETURNS JSON AS $$
DECLARE
    result JSON;
BEGIN
    BEGIN
        UPDATE Sprint 
        SET 
            estado_registro = 'eliminado',
            modificado_por = p_modificado_por,
            fecha_modificacion = CURRENT_TIMESTAMP
        WHERE 
            codSprint = p_codSprint;
        IF FOUND THEN
            result := '{"estado": "exitoso", "mensaje": "null"}';
        ELSE
            result := '{"estado": "error", "mensaje": "No se encontró el Sprint para eliminar"}';
        END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- -- Consulta ayuda
-- SELECT * FROM sprint s  ;
-- -- Llamada a funcion
-- SELECT fn_eliminar_sprint(1, 1);
-- listar json backlog
-- consulta ayuda
-- SELECT * FROM backlog b ;
-- -- llamada a la funcion
-- SELECT * FROM fn_listar_backlog();
-- funcion
CREATE OR REPLACE FUNCTION fn_listar_backlog()
RETURNS TABLE(
    resultado JSON
) AS $$
BEGIN
    RETURN QUERY
    SELECT row_to_json(t)
    FROM (
        SELECT *
        FROM Backlog
        WHERE estado_registro = 'activo'
    ) t;
EXCEPTION WHEN others THEN
    RETURN QUERY SELECT json_build_object('estado', 'error', 'mensaje', SQLERRM);
END;
$$ LANGUAGE plpgsql;
-----------------------------------------------------------------------------------------------------
-- listar json calendario
-- funcion
CREATE OR REPLACE FUNCTION fn_listar_calendario()
RETURNS TABLE(
    resultado JSON
) AS $$
BEGIN
    RETURN QUERY
    SELECT row_to_json(t)
    FROM (
        SELECT *
        FROM Calendario
        WHERE estado_registro = 'activo'
    ) t;
EXCEPTION WHEN others THEN
    RETURN QUERY SELECT json_build_object('estado', 'error', 'mensaje', SQLERRM);
END;
$$ LANGUAGE plpgsql;
-- -- consulta ayuda
-- -- llamada a la funcion
-- SELECT * FROM fn_listar_calendario();
-----------------------------------------------------------------------------------------------------
-- listar json documento
-- funcion
CREATE OR REPLACE FUNCTION fn_listar_documento()
RETURNS TABLE(
    resultado JSON
) AS $$
BEGIN
    RETURN QUERY
    SELECT row_to_json(t)
    FROM (
        SELECT *
        FROM Documento
        WHERE estado_registro = 'activo'
    ) t;
EXCEPTION WHEN others THEN
    RETURN QUERY SELECT json_build_object('estado', 'error', 'mensaje', SQLERRM);
END;
$$ LANGUAGE plpgsql;
-- -- consulta ayuda
-- -- llamada a la funcion
-- SELECT * FROM fn_listar_documento();
-----------------------------------------------------------------------------------------------------
-- listar json historia
-- funcion
CREATE OR REPLACE FUNCTION fn_listar_historia()
RETURNS TABLE(
    resultado JSON
) AS $$
BEGIN
    RETURN QUERY
    SELECT row_to_json(t)
    FROM (
        SELECT *
        FROM Historia
        WHERE estado_registro = 'activo'
    ) t;
EXCEPTION WHEN others THEN
    RETURN QUERY SELECT json_build_object('estado', 'error', 'mensaje', SQLERRM);
END;
$$ LANGUAGE plpgsql;
-- -- consulta ayuda
-- -- llamada a la funcion
-- SELECT * FROM fn_listar_historia();
-----------------------------------------------------------------------------------------------------
-- listar json incidencia
-- funcion
CREATE OR REPLACE FUNCTION fn_listar_incidencia()
RETURNS TABLE(
    resultado JSON
) AS $$
BEGIN
    RETURN QUERY
    SELECT row_to_json(t)
    FROM (
        SELECT *
        FROM Incidencia
        WHERE estado_registro = 'activo'
    ) t;
EXCEPTION WHEN others THEN
    RETURN QUERY SELECT json_build_object('estado', 'error', 'mensaje', SQLERRM);
END;
$$ LANGUAGE plpgsql;
-- -- consulta ayuda
-- -- llamada a la funcion
-- SELECT * FROM fn_listar_incidencia();
-----------------------------------------------------------------------------------------------------
-- listar json prioridad
-- funcion
CREATE OR REPLACE FUNCTION fn_listar_prioridad()
RETURNS TABLE(
    resultado JSON
) AS $$
BEGIN
    RETURN QUERY
    SELECT row_to_json(t)
    FROM (
        SELECT *
        FROM Prioridad
        WHERE estado_registro = 'activo'
    ) t;
EXCEPTION WHEN others THEN
    RETURN QUERY SELECT json_build_object('estado', 'error', 'mensaje', SQLERRM);
END;
$$ LANGUAGE plpgsql;
-- -- consulta ayuda
-- -- llamada a la funcion
-- SELECT * FROM fn_listar_prioridad();
-----------------------------------------------------------------------------------------------------
-- listar json proyecto
-- funcion
CREATE OR REPLACE FUNCTION fn_listar_proyecto()
RETURNS TABLE(
    resultado JSON
) AS $$
BEGIN
    RETURN QUERY
    SELECT row_to_json(t)
    FROM (
        SELECT *
        FROM Proyecto
        WHERE estado_registro = 'activo'
    ) t;
EXCEPTION WHEN others THEN
    RETURN QUERY SELECT json_build_object('estado', 'error', 'mensaje', SQLERRM);
END;
$$ LANGUAGE plpgsql;
-- -- consulta ayuda
-- -- llamada a la funcion
-- SELECT * FROM fn_listar_proyecto();
-----------------------------------------------------------------------------------------------------
-- listar json sprint
-- funcion
CREATE OR REPLACE FUNCTION fn_listar_sprint()
RETURNS TABLE(
    resultado JSON
) AS $$
BEGIN
    RETURN QUERY
    SELECT row_to_json(t)
    FROM (
        SELECT *
        FROM Sprint
        WHERE estado_registro = 'activo'
    ) t;
EXCEPTION WHEN others THEN
    RETURN QUERY SELECT json_build_object('estado', 'error', 'mensaje', SQLERRM);
END;
$$ LANGUAGE plpgsql;
-- -- consulta ayuda
-- SELECT * FROM sprint s WHERE s.estado_registro = 'activo';
-- -- llamada a la funcion
-- SELECT * FROM fn_listar_sprint();
-----------------------------------------------------------------------------------------------------
-- listar json tablero
-- funcion
CREATE OR REPLACE FUNCTION fn_listar_tablero()
RETURNS TABLE(
    resultado JSON
) AS $$
BEGIN
    RETURN QUERY
    SELECT row_to_json(t)
    FROM (
        SELECT b.codbacklog  ,
        pr.nombreproyecto ,
        b.estadohistoria ,
        ((fn_calcular_tiempo_restante(b.codbacklog)::json) ->> 'mensaje')::interval AS tiempo_restante,
        h.bonificacion_final  ,
        b.codhistoria , 
        h.descripcionsolucion,
        h.descripcionincidencia ,
        p.bonificacion,
        h.descripcion AS hdescripcion, 
        p.codprioridad  ,
		b.codusuario_asignado_por ,
		h.tiempoestimado ,
		h.identificador , 
		pr.descripcion ,
		sp.nombresprint ,
		p.valorprioridad ,
		u.nombre AS nombre_asignado_por,
		b.codusuario_asignado_a ,
		u2.nombre AS nombre_asignado_a,
		b.codusuario_revision ,
		u3.nombre AS nombre_revisado,
		b.creado_por ,
		u4.nombre AS creado_por,
		b.fecha_creacion,
        CURRENT_TIMESTAMP  as fecha_servidor
		FROM backlog b JOIN historia h ON b.codhistoria  = h.codhistoria
		JOIN  prioridad p ON p.codprioridad = h.codprioridad 
		JOIN usuario u ON u.codusu = b.codusuario_asignado_por 
		LEFT JOIN usuario u2 ON b.codusuario_asignado_a = u2.codusu  
		LEFT JOIN usuario u3 ON u3.codusu = b.codusuario_revision 
		LEFT JOIN usuario u4 ON u4.codusu = b.creado_por 
		JOIN sprint sp ON sp.codsprint =h.codsprint 
		JOIN proyecto pr ON pr.codproyecto = sp.codproyecto 
		WHERE b.estado_registro = 'activo'
		ORDER BY b.codbacklog DESC
    ) t;
EXCEPTION WHEN others THEN
    RETURN QUERY SELECT json_build_object('estado', 'error', 'mensaje', SQLERRM);
END;
$$ LANGUAGE plpgsql;
-- -- llamada a la funcion
-- SELECT * FROM  fn_listar_tablero();
-----------------------------------------------------------------------------------------------------
-- nueva historia
-- funcion
CREATE OR REPLACE FUNCTION fn_nueva_historia(
    -- tabla historia
    p_codSprint INTEGER,
    p_fecha DATE, -- fecha limite
    p_hora TIME, -- fecha limite
    p_codPrioridad INTEGER,
    p_tiempoEstimado TIME,
    p_descripcion VARCHAR,
    p_creado_por INTEGER
    )
RETURNS JSON AS $$
DECLARE
   	result JSON;
    v_cod_historia INTEGER;
   	v_cod_calendario INTEGER;
    v_sigla_proyecto VARCHAR(10);
    v_contador INTEGER;
    v_identificador VARCHAR(50);
    v_sigla_sprint VARCHAR (10);
BEGIN
    BEGIN
	    INSERT INTO calendario(fecha,estado_registro,hora ,creado_por,fecha_creacion) VALUES (p_fecha,'activo',p_hora,p_creado_por,CURRENT_TIMESTAMP)
	    -- retorna el cod de la ultimo calendario
        RETURNING codcalendario INTO v_cod_calendario ;
     
       --obtien sigla del proyecto
       SELECT p.sigla INTO v_sigla_proyecto FROM proyecto p 
       WHERE codproyecto =(
	      SELECT  DISTINCT  s.codproyecto   FROM historia h
		 	JOIN sprint s ON s.codsprint = h.codsprint
		    WHERE s.codsprint = p_codSprint
       );
       
      SELECT  nombresprint  INTO v_sigla_sprint FROM sprint s2 WHERE s2.codsprint = p_codSprint;
      	-- obtiene el numero de historias que estan el mismo proyecto, buscar el sprint que pertenece la historia
		SELECT COUNT(*) INTO v_contador  FROM sprint s 
		JOIN proyecto p ON s.codproyecto = p.codproyecto 
		JOIN historia h ON h.codsprint =s.codsprint 
	       	WHERE s.codsprint = p_codSprint;
			
        -- cuenta las historias existentes para el proyecto y genera el nuevo identificador
        v_identificador := v_sigla_proyecto|| '-'|| v_sigla_sprint|| '-' || LPAD('' ||  v_contador + 1, 4, '0');
        INSERT INTO Historia (
            codSprint,
            codCalendario,
            codPrioridad,
            tiempoEstimado,
            descripcion,
            estado_registro,
            creado_por,
            fecha_creacion,
            identificador
        ) 
        VALUES (
            p_codSprint, 
            v_cod_calendario,
            p_codPrioridad,
            p_tiempoEstimado,
            p_descripcion,
            'activo', 
            p_creado_por, 
            CURRENT_TIMESTAMP,
            v_identificador
        )
        -- retorna el cod de la ultima historia
        RETURNING codhistoria INTO v_cod_historia;

       INSERT INTO backlog (codhistoria,codusuario_asignado_por, creado_por, estadohistoria, estado_registro, fecha_creacion) VALUES (v_cod_historia,p_creado_por,p_creado_por,'backlog','activo',CURRENT_TIMESTAMP);
       result := '{"estado": "exitoso", "mensaje": "null"}';
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- -- consulta ayuda
-- SELECT * FROM calendario c ;
-- SELECT * FROM backlog b ;
-- SELECT * FROM historia h ;
-- -- llamada a la funcion
--  SELECT fn_nueva_historia(1,  '2022-12-31','15:00', 1, '01:00', 'Historia de usuario con insertar 1', 1);
-----------------------------------------------------------------------------------------------------
-- asignar historia
-- funcion
--
CREATE OR REPLACE FUNCTION fn_asignar_historia(
    -- tabla backlog
	p_codbacklog INTEGER,
	p_tiempo_estimado time,
    p_codusuario_asignado_a integer,
    p_creado_por INTEGER
    )
RETURNS JSON AS $$
DECLARE
   	result JSON;
   	v_codhistoria INTEGER;
  	v_codusuario_asignado_por INTEGER;
BEGIN
    BEGIN
       IF  (SELECT EXISTS (
							    SELECT * 
							    FROM backlog b 
							    WHERE b.codbacklog = p_codbacklog 
							    AND b.estado_registro = 'activo'
							)
							AND EXISTS (
							    SELECT * 
							    FROM usuario u 
							    JOIN usuario_rol ur ON u.codusu = ur.id_usuario_rol 
							    JOIN rol r ON r.codrol = ur.codrol 
							    WHERE( r.nombrerol = 'Administrador' OR r.nombrerol = 'Responsable') 
							    AND u.estado_registro = 'activo' 
							    AND u.codusu = p_creado_por
							))
	       THEN
		       SELECT b.codhistoria INTO v_codhistoria  
		    	FROM backlog b 
		    	WHERE b.codbacklog  = p_codbacklog AND  estado_registro = 'activo';
		    
		    	SELECT b.codusuario_asignado_por  INTO v_codusuario_asignado_por 
		    	FROM backlog b 
		    	WHERE b.codbacklog  = p_codbacklog  AND  estado_registro = 'activo';
		    
		    	UPDATE backlog 
		    	SET estado_registro  = 'inactivo'
		    	WHERE 
		    		codBacklog = p_codBacklog;
		    	
		    	UPDATE historia 
		    	SET tiempoestimado  = p_tiempo_estimado
		    	WHERE 
		    		codhistoria  = (
		    			SELECT b.codhistoria  FROM backlog b WHERE codbacklog = p_codBacklog
		    		);
		    
		        INSERT INTO Backlog (
	            codHistoria,
	            codUsuario_asignado_por,
	            codUsuario_asignado_a,
	            estadoHistoria,
	            estado_registro,
	            creado_por,
	            fecha_creacion
	        ) 
	        VALUES (
	            v_codhistoria, 
	            v_codusuario_asignado_por, 
	            p_codusuario_asignado_a , 
	            'todo',
	            'activo', 
	            p_creado_por,
	            CURRENT_TIMESTAMP
	        );
	       result := '{"estado": "exitoso", "mensaje": "null"}';
       ELSE
       		result := '{"estado": "error", "mensaje": "No tiene permiso o eliminado del backlog."}';
      END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- consulta ayuda
-- llamada a la funcion
-- SELECT fn_asignar_historia(6, '01:00:00',2,1);
-----------------------------------------------------------------------------------------------------
-- mover todo a inprogress
-- funcion
-- Solo puede mover el usuario al que ha sido asignado o tambien el administrador
CREATE OR REPLACE FUNCTION fn_mover_inprogress_done(
    -- tabla backlog
	p_codbacklog INTEGER,
    p_creado_por INTEGER,
    p_solucion VARCHAR,
    p_incidencia VARCHAR
    )
RETURNS JSON AS $$
DECLARE
   	result JSON;
   	v_codhistoria INTEGER;
    v_asignado_a INTEGER;
  	v_codusuario_asignado_por INTEGER;
BEGIN
    BEGIN
       IF  (
                SELECT EXISTS (
                SELECT * 
                FROM backlog b 
                WHERE b.codbacklog = p_codbacklog
                AND b.estado_registro = 'activo'
            )
            AND (
                EXISTS (
                    SELECT * 
                    FROM backlog b2 
                    WHERE b2.codusuario_asignado_a = p_creado_por  AND b2.codbacklog = p_codbacklog
                ) 
                OR 
                EXISTS (
                    SELECT * FROM usuario u 
                    JOIN usuario_rol ur ON ur.codusuario = u.codusu 
                    JOIN rol r ON r.codrol = ur.codrol 
                    WHERE r.nombrerol = 'Administrador' AND u.codusu = p_creado_por 
                )
            )
       	)
	       THEN
	       	    SELECT b.codusuario_asignado_a  INTO v_asignado_a 
		    	FROM backlog b 
		    	WHERE b.codbacklog  = p_codbacklog AND  estado_registro = 'activo';
	       
		       SELECT b.codhistoria INTO v_codhistoria  
		    	FROM backlog b 
		    	WHERE b.codbacklog  = p_codbacklog AND  estado_registro = 'activo';
		    
		    	SELECT b.codusuario_asignado_por  INTO v_codusuario_asignado_por 
		    	FROM backlog b 
		    	WHERE b.codbacklog  = p_codbacklog  AND  estado_registro = 'activo';
		    
		    	UPDATE historia 
		    	SET 
		    		descripcionsolucion = p_solucion,
		    		descripcionincidencia = p_incidencia
		    	WHERE 
		    		codhistoria = v_codhistoria;
		    	
		    	UPDATE backlog 
		    	SET estado_registro  = 'inactivo'
		    	WHERE 
		    		codBacklog = p_codBacklog;
		    
		        INSERT INTO Backlog (
	            codHistoria,
	            codUsuario_asignado_por,
	            codUsuario_asignado_a,
	            estadoHistoria,
	            estado_registro,
	            creado_por,
	            fecha_creacion
		        ) 
		        VALUES (
		            v_codhistoria, 
		            v_codusuario_asignado_por, 
		            v_asignado_a,
		            'done',
		            'activo', 
		            p_creado_por,
		            CURRENT_TIMESTAMP
	        );
	       

	          
	       result := '{"estado": "exitoso", "mensaje": "null"}';
       ELSE
       		result := '{"estado": "error", "mensaje": "No tiene permiso ó eliminado de in progress"}';
      END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- -- consulta ayuda
-- SELECT * FROM calendario c ;
-- SELECT * FROM backlog b ;
-- SELECT * FROM historia h ;
-- SELECT * FROM  usuario u ;
-- SELECT * FROM prioridad p ;
-- SELECT * FROM proyecto p ;
-- -- llamada a la funcion
-- SELECT fn_mover_inprogress_done(6, 1,'Solucion','incidencia');
-----------------------------------------------------------------------------------------------------
-- mover  done to backlog
-- funcion
--
CREATE OR REPLACE FUNCTION fn_mover_done_backlog(
    -- tabla backlog
	p_codbacklog INTEGER,
    p_creado_por INTEGER
    )
RETURNS JSON AS $$
DECLARE
   	result JSON;
   	v_codhistoria INTEGER;
    v_asignado_a INTEGER;
  	v_codusuario_asignado_por INTEGER;
BEGIN
    BEGIN
       IF  (
                SELECT EXISTS (
                SELECT * 
                FROM backlog b 
                WHERE b.codbacklog = p_codbacklog
                AND b.estado_registro = 'activo'
            )
            AND (
                EXISTS (
                    SELECT * 
                    FROM backlog b2 
                    WHERE b2.codusuario_asignado_a = p_creado_por  AND b2.codbacklog = p_codbacklog
                ) 
                OR 
                EXISTS (
                    SELECT * FROM usuario u 
                    JOIN usuario_rol ur ON ur.codusuario = u.codusu 
                    JOIN rol r ON r.codrol = ur.codrol 
                    WHERE r.nombrerol = 'Administrador' AND u.codusu = p_creado_por 
                )
            )
       	)
	       THEN
	       	    SELECT b.codusuario_asignado_a  INTO v_asignado_a 
		    	FROM backlog b 
		    	WHERE b.codbacklog  = p_codbacklog AND  estado_registro = 'activo';
	       
		       SELECT b.codhistoria INTO v_codhistoria  
		    	FROM backlog b 
		    	WHERE b.codbacklog  = p_codbacklog AND  estado_registro = 'activo';
		    
		    	SELECT b.codusuario_asignado_por  INTO v_codusuario_asignado_por 
		    	FROM backlog b 
		    	WHERE b.codbacklog  = p_codbacklog  AND  estado_registro = 'activo';
		    	
		    	UPDATE backlog 
		    	SET estado_registro  = 'inactivo'
		    	WHERE 
		    		codBacklog = p_codBacklog;
		    
		        INSERT INTO Backlog (
	            codHistoria,
	            codUsuario_asignado_por,
	            codUsuario_asignado_a,
	            estadoHistoria,
	            estado_registro,
	            creado_por,
	            fecha_creacion
		        ) 
		        VALUES (
		            v_codhistoria, 
		            v_codusuario_asignado_por, 
		            v_asignado_a  , 
		            'backlog',
		            'activo', 
		            p_creado_por,
		            CURRENT_TIMESTAMP
	        );
	       result := '{"estado": "exitoso", "mensaje": "null"}';
       ELSE
       		result := '{"estado": "error", "mensaje": "No tiene permiso ó Eliminado de done"}';
      END IF;
    EXCEPTION WHEN others THEN
        result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- -- consulta ayuda
-- SELECT * FROM calendario c ;
-- SELECT * FROM backlog b ;
-- SELECT * FROM historia h ;
-- SELECT * FROM  usuario u ;
-- SELECT * FROM prioridad p ;
-- SELECT * FROM proyecto p ;
-- SELECT * FROM sprint s 
-- -- llamada a la funcion
-- SELECT fn_mover_done_backlog(23,1);
 -----------------------------------------------------------------------------------------------------
-- listar json historia
-- funcion
CREATE OR REPLACE FUNCTION fn_listar_usuario()
RETURNS TABLE(
    resultado JSON
) AS $$
BEGIN
    RETURN QUERY
    SELECT row_to_json(t)
    FROM (
        SELECT *
        FROM usuario u2
        WHERE estado_registro = 'activo'
    ) t;
EXCEPTION WHEN others THEN
    RETURN QUERY SELECT json_build_object('estado', 'error', 'mensaje', SQLERRM);
END;
$$ LANGUAGE plpgsql;
-- -- consulta ayuda
-- SELECT * FROM usuario u ;
-- -- llamada a la funcion
-- SELECT * FROM fn_listar_usuario();
 -----------------------------------------------------------------------------------------------------
-- listar json historia
-- funcion
CREATE OR REPLACE FUNCTION fn_listar_usuario()
RETURNS TABLE(
    resultado JSON
) AS $$
BEGIN
    RETURN QUERY
    SELECT row_to_json(t)
    FROM (
        SELECT *
        FROM usuario u2
        WHERE estado_registro = 'activo'
    ) t;
EXCEPTION WHEN others THEN
    RETURN QUERY SELECT json_build_object('estado', 'error', 'mensaje', SQLERRM);
END;
$$ LANGUAGE plpgsql;
-- -- consulta ayuda
-- SELECT * FROM usuario u ;
-- -- llamada a la funcion
-- SELECT * FROM fn_listar_usuario();

----------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------
CREATE OR REPLACE FUNCTION fn_calcular_tiempo_restante(
    -- tabla backlog
    p_codbacklog INTEGER
)
RETURNS JSON AS $$
DECLARE
    result JSON;
    v_tiempo_transcurrido INTERVAL; -- Cambiado a INTERVAL para almacenar la diferencia de tiempo
    v_tiempo_restante INTERVAL; -- Cambiado a INTERVAL para almacenar la diferencia de tiempo
    v_tiempo_estimado INTERVAL; -- Cambiado a INTERVAL para almacenar la diferencia de tiempo
    v_num_veces_movidas_cards INTEGER ;
BEGIN
    BEGIN
        IF EXISTS (SELECT * FROM backlog b WHERE b.codbacklog = p_codbacklog AND b.estado_registro = 'activo') THEN
        	-- Obtener  los veces que se movio el card por su codbacklog
			SELECT count(*)    INTO v_num_veces_movidas_cards
        	FROM backlog b2
        	WHERE b2.codhistoria = (
        		SELECT b.codhistoria  FROM backlog b WHERE b.codbacklog = p_codbacklog
        	);
        
        	--
        	IF v_num_veces_movidas_cards%4  = 3 OR v_num_veces_movidas_cards%4=0 THEN -- Si el resto es mayor o igual a 3, significa que el card entro en progreso y  done
        		-- Si >=3, entonces devolver el tiempo restante, en caso contrario devolver  00:00:00
        		-- Obteniendo tiempo transcurrido
	            SELECT (CURRENT_TIMESTAMP - max(b2.fecha_creacion)) INTO v_tiempo_transcurrido
	            FROM backlog b2  
	            WHERE b2.codhistoria = (
	                SELECT DISTINCT h.codhistoria FROM backlog b 
	                JOIN historia h ON b.codhistoria = h.codhistoria  
	                WHERE b.codbacklog = p_codbacklog
	            ) AND b2.estadohistoria = 'inprogress';
	            
	            -- Obteniendo tiempo estimado
	            SELECT h.tiempoestimado INTO v_tiempo_estimado
	            FROM historia h 
	            JOIN backlog b ON b.codhistoria = h.codhistoria 
	            WHERE b.codbacklog = p_codbacklog;
	            
	            -- Calculando tiempo restante
	            v_tiempo_restante := v_tiempo_estimado - v_tiempo_transcurrido;
	           
	            -- Construyendo el resultado JSON
	           result := '{"estado": "exitoso", "mensaje": ' || to_json(v_tiempo_restante::text) || '}';    		
        	ELSE
	           result :=  '{"estado": "exitoso", "mensaje": "00:00:00.000000"}';
        	END IF;            
        ELSE
            result := '{"estado": "error", "mensaje": "Eliminado de done"}';
        END IF;
    EXCEPTION 
        WHEN others THEN
            result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- SELECT * FROM historia h ;
-- SELECT * FROM backlog b  WHERE codhistoria =4;
-- SELECT * FROM fn_calcular_tiempo_restante(10); 
--------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------
CREATE OR REPLACE FUNCTION fn_calcular_bonificacion_y_guardar(
    -- tabla backlog
    p_codbacklog INTEGER
)
RETURNS JSON AS $$
DECLARE
    result JSON;
   	v_codHistoria INTEGER;
   	v_debugmsj VARCHAR;
    v_minutos INTEGER; -- Minutos transcurridos hora limite actividad, minutos restantes o minutos excedidos
    v_bonificacion INTEGER; -- Recupera la bonificacion asociada al codbacklog
    v_tiempo_restante INTERVAL;
   	v_bonificacion_final decimal;  -- Bonificacion FINAL 
    v_min_tiempo_asignado INTEGER;  -- Recupera minutos tiempo asignado
    v_bonificacion_adicional DECIMAL; -- 
    v_alpha DECIMAL; -- Puedes ajustar este valor según la velocidad de disminución deseada
BEGIN
    BEGIN
        IF EXISTS (SELECT * FROM backlog b WHERE b.codbacklog = p_codbacklog AND b.estado_registro = 'activo'  ) THEN
        		-- Recupera codhistoria
        		SELECT b.codhistoria  INTO v_codHistoria FROM backlog b WHERE b.codbacklog =p_codbacklog	;
        		
        		-- Recupera tiempo asignado
   				SELECT fn_format_interval(
			        (SELECT h.tiempoestimado FROM historia h WHERE h.codhistoria = v_codHistoria)
			    ) INTO v_min_tiempo_asignado;
   
			
        		-- Bonificacion
        		SELECT p.bonificacion  INTO v_bonificacion FROM historia h 
        		JOIN  prioridad p ON h.codprioridad = p.codprioridad
        		WHERE h.codhistoria  = v_codHistoria;
        		
        		-- Recuperar tiempo restante
        		SELECT ((fn_calcular_tiempo_restante(p_codbacklog)::json) ->> 'mensaje')::INTERVAL INTO v_tiempo_restante;
        		SELECT * INTO v_minutos FROM fn_format_interval(v_tiempo_restante);
				
        		
        		-- Calcular bonificacion
				IF v_minutos >0 THEN
					-- bonificacion positiva
					v_debugmsj:='Verdadero';
					v_alpha:= 0.9;
					v_minutos:=v_min_tiempo_asignado-v_minutos;
					v_bonificacion_final:= v_bonificacion * (3-2*((LN(v_minutos + 1) / LN(v_min_tiempo_asignado + 1))) ^ v_alpha);
					
				ELSE
					v_debugmsj:='Falso';
					v_minutos:=v_min_tiempo_asignado-v_minutos;
					v_bonificacion_final:= v_bonificacion *((1::numeric/3.7)^((v_minutos::numeric/60)*(1::numeric/80)));
				END IF;
				-- Redondear salida
				v_bonificacion_final = round(v_bonificacion_final,2);
				
				-- Actualizar la bonificacion
				UPDATE historia
		    	SET bonificacion_final   = v_bonificacion_final
		    	WHERE 
		    		codhistoria  = v_codHistoria;
	            -- Construyendo el resultado JSON
	            result := '{"estado": "exitoso", "mensaje": ' || to_json(v_bonificacion_final::text) || ',"v_min:":' || to_json(v_minutos::text) || ',"v_msg:":' || to_json(v_debugmsj::text)||'}';    	  	
        ELSE
            result := '{"estado": "error", "mensaje": "Eliminado de done"}';
        END IF;
    EXCEPTION 
        WHEN others THEN
            result := json_build_object('estado', 'error', 'mensaje', SQLERRM);
    END;
    RETURN result;
END;
$$ LANGUAGE plpgsql;
-- SELECT * FROM historia h ;
-- SELECT * FROM backlog b ;
-- SELECT * FROM fn_calcular_bonificacion_y_guardar(29); 
-- SELECT * FROM fn_calcular_tiempo_restante(5); 
------------------------------------------------------------------------------------------------------------

-- ------------------------------------------------------------------
-- SELECT * FROM fn_format_interval('3 days 00:46:49.868892') ;
---------------------------------------------------------------------
CREATE OR REPLACE FUNCTION fn_format_interval(interval_value INTERVAL)
--devuelve minutos a partir de un interval
RETURNS INTEGER AS $$
DECLARE
    is_negative BOOLEAN;
    total_seconds INTEGER;
    total_minutes INTEGER;
BEGIN
    total_seconds := EXTRACT(EPOCH FROM interval_value);
    is_negative := total_seconds < 0;
    total_minutes := ABS(total_seconds / 60);

    IF is_negative THEN
        RETURN -total_minutes;
    ELSE
        RETURN total_minutes;
    END IF;
END;
$$ LANGUAGE plpgsql;
------------------------------------------------------------------------------------------------------------------------------------
 
	-- función:
CREATE OR REPLACE FUNCTION fn_verificar_usuario(
    IN pUsuario_log varchar,
    IN pPassword_log varchar,
    OUT oMensaje 	varchar,
    OUT oidusuario varchar,
    OUT oBoolean 	boolean
) 
RETURNS RECORD
AS 
$BODY$
DECLARE
    contador integer;
BEGIN
  oMensaje    := '';
 oIdusuario	:='';
  oBoolean    := FALSE;
RAISE NOTICE  'El usuario ingresado es: %.',pUsuario_log ;
RAISE NOTICE  'El password  ingresado es: %.',pPassword_log; 
    SELECT COUNT(*) INTO contador
    FROM usuario tu
    WHERE tu.nombreusuario  = pUsuario_log AND tu.estado_registro  = 'activo';
    
    IF contador = 0 THEN
        oMensaje := 'usuario_no_registrado';
         oBoolean    := TRUE;
    ELSE
        SELECT COUNT(*) INTO contador
        FROM usuario tu
        WHERE tu.nombreusuario = pUsuario_log
        AND tu.contrasena  = pPassword_log AND tu.estado_registro  = 'activo';
        
        IF contador = 0 THEN
            oMensaje := 'equivocado';
           oBoolean    := TRUE;
        ELSE
         	SELECT tu.codusu  INTO oIdusuario
		        FROM usuario tu
		        WHERE tu.nombreusuario = pUsuario_log
		        AND tu.contrasena  = pPassword_log AND tu.estado_registro  = 'activo';
            oMensaje := 'exitoso';
           	oBoolean    := TRUE;
        END IF;
    END IF;
    
    RETURN ;
END
$BODY$ 
LANGUAGE plpgsql VOLATILE
COST 100;
-- --FUNCION VERIFICAR USUARIO
--  --funcion consultar si existe un usuario
--  	--consulta ayuda
-- SELECT * FROM usuario   WHERE  estado_registro  ='activo';
-- 	-- consulta llamada a función
-- SELECT fn_verificar_usuario('admin', 'e10adc3949ba59abbe56e057f20f883e');
-- 	-- consulta eliminar función
-- DROP FUNCTION fn_verificar_usuario(character varying,character VARYING);





-- Ver mi nivel en mi cuenta de usuario... 
-- NIVEL ADMINISTRADOR
-- Ver el tablero con los nombres de las personas que estan trabajando

------------------------------------------------------------------------------
-- listar json tablero
-- funcion
CREATE OR REPLACE FUNCTION fn_listar_tablero_por_usuario(p_codusuario INTEGER)
RETURNS TABLE(
    resultado JSON
) AS $$
BEGIN
    RETURN QUERY
    SELECT row_to_json(t)
    FROM (
        SELECT b.codbacklog  ,
        pr.nombreproyecto ,
        b.estadohistoria ,
        ((fn_calcular_tiempo_restante(b.codbacklog)::json) ->> 'mensaje')::interval AS tiempo_restante,
        h.bonificacion_final  ,
        b.codhistoria , 
        h.descripcionsolucion,
        h.descripcionincidencia ,
        p.bonificacion,
        h.descripcion AS hdescripcion, 
        p.codprioridad  ,
		b.codusuario_asignado_por ,
		h.tiempoestimado ,
		h.identificador , 
		pr.descripcion ,
		sp.nombresprint ,
		p.valorprioridad ,
		u.nombre AS nombre_asignado_por,
		b.codusuario_asignado_a ,
		u2.nombre AS nombre_asignado_a,
		b.codusuario_revision ,
		u3.nombre AS nombre_revisado,
		b.creado_por ,
		u4.nombre AS creado_por,
		b.fecha_creacion,
        CURRENT_TIMESTAMP  as fecha_servidor
		FROM backlog b JOIN historia h ON b.codhistoria  = h.codhistoria
		JOIN  prioridad p ON p.codprioridad = h.codprioridad 
		JOIN usuario u ON u.codusu = b.codusuario_asignado_por 
		LEFT JOIN usuario u2 ON b.codusuario_asignado_a = u2.codusu  
		LEFT JOIN usuario u3 ON u3.codusu = b.codusuario_revision 
		LEFT JOIN usuario u4 ON u4.codusu = b.creado_por 
		JOIN sprint sp ON sp.codsprint =h.codsprint 
		JOIN proyecto pr ON pr.codproyecto = sp.codproyecto 
		WHERE b.estado_registro = 'activo' AND b.codusuario_asignado_a = p_codusuario
		ORDER BY b.codbacklog DESC 
    ) t;
EXCEPTION WHEN others THEN
    RETURN QUERY SELECT json_build_object('estado', 'error', 'mensaje', SQLERRM);
END;
$$ LANGUAGE plpgsql;
-- -- llamada a la funcion
-- SELECT * FROM  fn_listar_tablero_por_usuario(3);
------------------------------------------------------------------------------------------------
CREATE OR REPLACE FUNCTION fn_obtener_usuario_y_rol(p_codusuario INTEGER)
RETURNS TABLE(
    resultado JSON
) AS $$
BEGIN
    RETURN QUERY
    SELECT row_to_json(t)
    FROM (
        SELECT u.nombre, u.apellido, u.nombreusuario, r.nombrerol  FROM usuario u
        JOIN usuario_rol ur ON u.codusu  = ur.codusuario
		JOIN rol r ON r.codrol = ur.codrol 	
        WHERE codusu = p_codusuario
    ) t;
EXCEPTION WHEN others THEN
    RETURN QUERY SELECT json_build_object('estado', 'error', 'mensaje', SQLERRM);
END;
$$ LANGUAGE plpgsql;
-- -- llamada a la funcion
-- SELECT * FROM  fn_obtener_usuario_y_rol(2);