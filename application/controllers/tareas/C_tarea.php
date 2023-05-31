<?php
/* http://localhost/kanban/index.php/login/inicio_sesion */

defined('BASEPATH') OR exit('No direct script access allowed');

class C_tarea extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // $this->load->model('login/M_mostrar_tablero','mostrar_tablero_model');
    }

	public function index()
	{
		$this->layout->view('tareas/listado');
	}
}