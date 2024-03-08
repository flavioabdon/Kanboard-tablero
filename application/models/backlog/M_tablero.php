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

}