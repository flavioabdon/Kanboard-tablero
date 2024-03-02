<?php
/*
-------------------------------------------------------------------------------------------------------------------------------
Creador:
Descripcion:
*/

class M_listado extends CI_Model {
    
    public function mostrar_backlog() {
        $query = $this->db->query("SELECT * FROM fn_listar_backlog()");
        return $query->result();
    }

}