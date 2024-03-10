<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tablero extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('backlog/M_tablero','tablero');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->layout->view('backlog/tablero');
	}
	public function lista_tablero(){
        $json = $this->tablero->listar_tablero();
		echo json_encode($json);
    }
	public function nueva_historia(){
		//
		$codsprint 			= $this->input->post('e_id_sprint');
		$fecha 				= $this->input->post('e_fecha');
		$hora 				= $this->input->post('e_hora');
		$codprioridad 		= $this->input->post('e_id_prioridad');
		$tiempoestimado 	= $this->input->post('e_tiempo_estimado');
		$descripcion 		= $this->input->post('e_descripcion');
		$creadopor 			= $this->session->userdata('id_usuario');
        $json 				= $this->tablero->nueva_historia($codsprint,$fecha,$hora,$codprioridad,$tiempoestimado,$descripcion,$creadopor);
		echo json_encode($json);
    }
	public function asignar_historia(){
		$codbacklog  = $this->input->post('codbacklog');
		$asignadoa = $this->input->post('asignadoa');
		$creadopor = $this->session->userdata('id_usuario');
        $json = $this->tablero->asignar_historia($codbacklog,$asignadoa,$creadopor);
		echo json_encode($json);
    }
	public function mover_todo_a_inprogress(){
		$codbacklog  = $this->input->post('codbacklog');
		$creadopor = $this->session->userdata('id_usuario');
        $json = $this->tablero->mover_todo_a_inprogress($codbacklog,$creadopor);
		echo json_encode($json);
    }
	public function mover_inprogress_done(){
		$codbacklog  = $this->input->post('codbacklog');
		$creadopor = $this->session->userdata('id_usuario');
        $json = $this->tablero->mover_inprogress_done($codbacklog,$creadopor);
		echo json_encode($json);
    }
	public function mover_done_backlog(){
		$codbacklog  = $this->input->post('codbacklog');
		$creadopor = $this->session->userdata('id_usuario');
        $json = $this->tablero->mover_done_backlog($codbacklog,$creadopor);
		echo json_encode($json);
    }
	public function lista_proyectos(){
        $json = $this->tablero->listar_proyectos();
		echo json_encode($json);
    }
	public function lista_sprints(){
        $json = $this->tablero->listar_sprints();
		echo json_encode($json);
    }
	public function lista_prioridades(){
        $json = $this->tablero->listar_prioridades();
		echo json_encode($json);
    }
}
