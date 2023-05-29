<?php
/* http://localhost/kanban/index.php/login/inicio_sesion */

defined('BASEPATH') OR exit('No direct script access allowed');

class C_inicio_sesion extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('login/M_inicio_sesion','inicio_sesion_model');
    }

	public function index()
	{
		 $this->load->view('login/login');
	}
	public function verificar_usuario(){
		$usuario_post=$this->input->post('input_usuario');
		$contrasena_post=$this->input->post('input_contrasena');
		$devolucion = $this->inicio_sesion_model->verifica_login($usuario_post, md5($contrasena_post));		
		echo json_encode ($devolucion);
	}
	public function set_usuario (){
		$usuario_post=$this->input->post('input_usuario');
		$this->session->set_userdata("usuario_login", $usuario_post);
		echo "Usuario logeado:".$this->session->userdata('usuario_login');;
	}
}
