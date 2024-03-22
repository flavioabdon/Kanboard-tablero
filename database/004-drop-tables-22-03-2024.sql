----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
-- Eliminar todas las funciones que empiezan con fn y no son del sistema
SELECT 'DROP FUNCTION IF EXISTS ' || n.nspname || '.' || proname || '(' || oidvectortypes(proargtypes) || ');'
FROM pg_proc p
LEFT JOIN pg_namespace n ON p.pronamespace = n.oid
WHERE n.nspname NOT LIKE 'pg_%'
AND n.nspname != 'information_schema'
AND p.proname LIKE 'fn_%';
-------------------------------------------
DROP FUNCTION IF EXISTS public.fn_asignar_historia(integer, time without time zone, integer, integer);
DROP FUNCTION IF EXISTS public.fn_calcular_bonificacion_y_guardar(integer);
DROP FUNCTION IF EXISTS public.fn_calcular_tiempo_restante(integer);
DROP FUNCTION IF EXISTS public.fn_eliminar_backlog(integer, integer);
DROP FUNCTION IF EXISTS public.fn_eliminar_calendario(integer, integer);
DROP FUNCTION IF EXISTS public.fn_eliminar_documento(integer, integer);
DROP FUNCTION IF EXISTS public.fn_eliminar_historia(integer, integer);
DROP FUNCTION IF EXISTS public.fn_eliminar_incidencia(integer, integer);
DROP FUNCTION IF EXISTS public.fn_eliminar_prioridad(integer, integer);
DROP FUNCTION IF EXISTS public.fn_eliminar_proyecto(integer, integer);
DROP FUNCTION IF EXISTS public.fn_eliminar_sprint(integer, integer);
DROP FUNCTION IF EXISTS public.fn_format_interval(interval);
DROP FUNCTION IF EXISTS public.fn_insertar_backlog(integer, integer, integer, integer, character varying, integer);
DROP FUNCTION IF EXISTS public.fn_insertar_calendario(date, time without time zone, integer);
DROP FUNCTION IF EXISTS public.fn_insertar_documento(integer, character varying, character varying, integer, character varying);
DROP FUNCTION IF EXISTS public.fn_insertar_historia(integer, integer, integer, character varying, character varying, integer);
DROP FUNCTION IF EXISTS public.fn_insertar_incidencia(integer, character varying, integer);
DROP FUNCTION IF EXISTS public.fn_insertar_prioridad(integer, integer, character varying, integer);
DROP FUNCTION IF EXISTS public.fn_insertar_proyecto(character varying, character varying, integer);
DROP FUNCTION IF EXISTS public.fn_insertar_sprint(character varying, character varying, integer);
DROP FUNCTION IF EXISTS public.fn_listar_backlog();
DROP FUNCTION IF EXISTS public.fn_listar_calendario();
DROP FUNCTION IF EXISTS public.fn_listar_documento();
DROP FUNCTION IF EXISTS public.fn_listar_historia();
DROP FUNCTION IF EXISTS public.fn_listar_incidencia();
DROP FUNCTION IF EXISTS public.fn_listar_prioridad();
DROP FUNCTION IF EXISTS public.fn_listar_proyecto();
DROP FUNCTION IF EXISTS public.fn_listar_sprint();
DROP FUNCTION IF EXISTS public.fn_listar_tablero();
DROP FUNCTION IF EXISTS public.fn_listar_usuario();
DROP FUNCTION IF EXISTS public.fn_modificar_backlog(integer, integer, integer, integer, integer, character varying, integer);
DROP FUNCTION IF EXISTS public.fn_modificar_calendario(integer, date, time without time zone, integer);
DROP FUNCTION IF EXISTS public.fn_modificar_documento(integer, integer, character varying, character varying, character varying, integer);
DROP FUNCTION IF EXISTS public.fn_modificar_historia(integer, integer, integer, integer, character varying, character varying, integer);
DROP FUNCTION IF EXISTS public.fn_modificar_incidencia(integer, integer, character varying, integer);
DROP FUNCTION IF EXISTS public.fn_modificar_prioridad(integer, integer, integer, character varying, integer);
DROP FUNCTION IF EXISTS public.fn_modificar_proyecto(integer, character varying, character varying, integer);
DROP FUNCTION IF EXISTS public.fn_modificar_sprint(integer, integer, character varying, character varying, integer);
DROP FUNCTION IF EXISTS public.fn_mover_done_backlog(integer, integer);
DROP FUNCTION IF EXISTS public.fn_mover_inprogress_done(integer, integer, character varying, character varying);
DROP FUNCTION IF EXISTS public.fn_mover_todo_a_inprogress(integer, integer);
DROP FUNCTION IF EXISTS public.fn_nueva_historia(integer, date, time without time zone, integer, time without time zone, character varying, integer);