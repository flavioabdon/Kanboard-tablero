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
		//Verificar si es que ya se inicio el login
		$session_data = $this->session->all_userdata();
		if (!isset($session_data['usuario_login'])) { //Si no encruentra en el array el objeto usuario_login redireccionar al login
			$this->load->view('login/login');
		  } else {
			$this->layout->view('inicial/inicio');
		  }   
	}
	public function verificar_usuario(){
		$usuario_post=$this->input->post('input_usuario');
		$contrasena_post=$this->input->post('input_contrasena');
		$devolucion = $this->inicio_sesion_model->verifica_login($usuario_post, md5($contrasena_post));		
		echo json_encode ($devolucion);
	}
	public function set_usuario (){
		$usuario_post=$this->input->post('input_usuario');
		$idusuario_post=$this->input->post('input_idusuario');
		$usuario_data = array(
			'usuario_login'  => $usuario_post,
			'id_usuario'     => $idusuario_post,
			'logged_in' 	 => TRUE
		);
		$this->session->set_userdata($usuario_data);
		echo "Usuario login:".$this->session->userdata('usuario_login'). " id_usuario:". $this->session->userdata('id_usuario');
	}
}
