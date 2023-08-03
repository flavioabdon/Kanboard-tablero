<?php
/* http://localhost/kanban/index.php/login/inicio_sesion */

defined('BASEPATH') OR exit('No direct script access allowed');

class C_usuarios extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // $this->load->model('login/M_inicio_sesion','inicio_sesion_model');
    }

	public function index()
	{
        echo "........";
		 $this->load->view('usuarios/usuarios');
	}
}
