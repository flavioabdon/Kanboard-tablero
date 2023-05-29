<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_inicio_sesion extends CI_Model {
	function __construct(){
        parent::__construct();
    }

    public function verifica_login($usuario, $contrasena){
        $query = $this->db->query("SELECT * FROM fn_verificar_usuario('$usuario','$contrasena')");
        return $query->result();
    }
}