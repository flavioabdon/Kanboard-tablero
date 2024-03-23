<?php
/*
-------------------------------------------------------------------------------------------------------------------------------
Creador:
Descripcion:
*/

class M_tablero extends CI_Model {
    
    public function obtener_usuario_y_rol($codusuario) {
        $query = $this->db->query("SELECT * FROM  fn_obtener_usuario_y_rol ($codusuario);");
        return $query->result();
    }
    public function listar_tablero() {
        $query = $this->db->query("SELECT * FROM  fn_listar_tablero();");
        return $query->result();
    }
    public function nueva_historia($codsprint,$fecha,$hora,$codprioridad,$tiempoestimado,$descripcion,$creadopor) {
        $query = $this->db->query("SELECT fn_nueva_historia($codsprint,  '$fecha','$hora', $codprioridad, '$tiempoestimado', '$descripcion', $creadopor);");
        return $query->result();
    }
    public function asignar_historia($codbacklog,$tiempoestimado,$codasignadoa,$creadopor) {
        $query = $this->db->query("SELECT fn_asignar_historia('$codbacklog','$tiempoestimado' ,'$codasignadoa','$creadopor');");
        return $query->result();
    }
    public function mover_todo_a_inprogress($codbacklog,$creadopor) {
        $query = $this->db->query("SELECT fn_mover_todo_a_inprogress('$codbacklog', '$creadopor');");
        return $query->result();
    }
    public function mover_inprogress_done($codbacklog,$creadopor,$solucion,$incidencia) {
        $query = $this->db->query("SELECT fn_mover_inprogress_done('$codbacklog', '$creadopor','$solucion','$incidencia');");
        return $query->result();
    }
    public function mover_done_backlog($codbacklog,$creadopor) {
        $query = $this->db->query("SELECT fn_mover_done_backlog('$codbacklog','$creadopor');");
        return $query->result();
    }
    public function listar_proyectos() {
        $query = $this->db->query("SELECT * FROM fn_listar_proyecto();");
        return $query->result();
    }
    public function listar_sprints() {
        $query = $this->db->query("SELECT * FROM fn_listar_sprint();");
        return $query->result();
    }
    public function listar_prioridades() {
        $query = $this->db->query("SELECT * FROM fn_listar_prioridad();");
        return $query->result();
    }
    public function listar_usuarios() {
        $query = $this->db->query("SELECT * FROM fn_listar_usuario();");
        return $query->result();
    }
    public function guardar_bonificacion($codbacklog) {
        $query = $this->db->query("SELECT * FROM fn_calcular_bonificacion_y_guardar($codbacklog);");
        return $query->result();
    }
    public function eliminar_historia($codbacklog,$modificadopor) {
        $query = $this->db->query("SELECT fn_eliminar_historia('$codbacklog', '$modificadopor');");
        return $query->result();
    }
    public function historia_revisada($codbacklog,$modificadopor) {
        $query = $this->db->query("SELECT fn_historia_revisada('$codbacklog', '$modificadopor');");
        return $query->result();
    }
}