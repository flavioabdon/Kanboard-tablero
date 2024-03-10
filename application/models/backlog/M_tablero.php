<?php
/*
-------------------------------------------------------------------------------------------------------------------------------
Creador:
Descripcion:
*/

class M_tablero extends CI_Model {
    
    public function listar_tablero() {
        $query = $this->db->query("SELECT * FROM  fn_listar_tablero();");
        return $query->result();
    }
    public function nueva_historia($codsprint,$fecha,$hora,$codprioridad,$tiempoestimado,$descripcion,$creadopor) {
        //$query = $this->db->query("SELECT * FROM  SELECT fn_nueva_historia('$codsprint', '$fecha','$hora', '$codprioridad', '$tiempoestimado', '$descripcion', '$creadopor');");
        $query = $this->db->query("SELECT fn_nueva_historia($codsprint,  '$fecha','$hora', $codprioridad, '$tiempoestimado', '$descripcion', $creadopor);");
        return $query->result();
    }
    public function asignar_historia() {
        $query = $this->db->query("SELECT fn_asignar_historia('$codbacklog', '$codasignadoa','$creadopor');");
        return $query->result();
    }
    public function mover_todo_a_inprogress() {
        $query = $this->db->query("SELECT fn_mover_todo_a_inprogress('$codbacklog', '$creadorpor');");
        return $query->result();
    }
    public function mover_inprogress_done() {
        $query = $this->db->query("SELECT fn_mover_inprogress_done('$codbacklog', '$creadopor','$solucion','$incidencia');");
        return $query->result();
    }
    public function mover_done_backlog() {
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
}