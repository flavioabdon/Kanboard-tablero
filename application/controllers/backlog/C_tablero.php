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
		$idusu 			= $this->session->userdata('id_usuario');
        $json = $this->tablero->obtener_usuario_y_rol($idusu);

		$json = json_encode($json);
		$datos = json_decode($json, true);		
		$resultado = $datos[0]['resultado'];
		$datosResultado = json_decode($resultado, true);
		$rol = $datosResultado['nombrerol'];
		if($rol =='Administrador' or $rol == 'Responsable'){
			$this->layout->view('backlog/tablero');
		}
		else{
			$this->layout->view('backlog/tablero_usuario');
		}
		
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
		$codbacklog  		= $this->input->post('e_id_backlog');
		$tiempoestimado		= $this->input->post('e_tiempo_estimado');
		$asignadoa 			= $this->input->post('e_id_usuario');
		$creadopor 			= $this->session->userdata('id_usuario');
        $json 				= $this->tablero->asignar_historia($codbacklog,$tiempoestimado,$asignadoa,$creadopor);
		echo json_encode($json);
    }
	public function mover_todo_a_inprogress(){
		$codbacklog  		= $this->input->post('e_id_backlog');
		$creadopor 			= $this->session->userdata('id_usuario');
        $json 				= $this->tablero->mover_todo_a_inprogress($codbacklog,$creadopor);
		echo json_encode($json);
    }
	public function mover_inprogress_done(){
		$codbacklog  		= $this->input->post('e_id_backlog');
		$solucion  			=$this->input->post('e_solucion');
		$incidencia  		= $this->input->post('e_incidencia');
		$creadopor 			= $this->session->userdata('id_usuario');
		$json_bonificacion = $this->tablero->guardar_bonificacion($codbacklog);
        $json = $this->tablero->mover_inprogress_done($codbacklog,$creadopor,$solucion,$incidencia);
		echo json_encode($json);
    }
	public function mover_done_backlog(){
		$codbacklog  		= $this->input->post('e_id_backlog');
		$creadopor 			= $this->session->userdata('id_usuario');
        $json 				= $this->tablero->mover_done_backlog($codbacklog,$creadopor);
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
	public function lista_usuarios(){
        $json = $this->tablero->listar_usuarios();
		echo json_encode($json);
    }
	public function eliminar_historia(){
		$codbacklog  		= $this->input->post('e_id_backlog');
		$modificadopor 			= $this->session->userdata('id_usuario');
        $json 				= $this->tablero->eliminar_historia($codbacklog,$modificadopor);
		echo json_encode($json);
    }
	public function historia_revisada(){
		$codbacklog  		= $this->input->post('e_id_backlog');
		$modificadopor 			= $this->session->userdata('id_usuario');
        $json 				= $this->tablero->historia_revisada($codbacklog,$modificadopor);
		echo json_encode($json);
    }
	public function upload_file() {
		$config['upload_path']          = './uploads'; // Cambia esto a la ruta de tu carpeta de carga
		$config['allowed_types']        = 'gif|jpg|png'; // Cambia esto a los tipos de archivos que quieras permitir
		$config['max_size']             = 10000; // Cambia esto al tamaño máximo de archivo que quieras permitir (en KB)
	
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload('archivo')) { // 'archivo' debe coincidir con el nombre del campo de entrada de archivo
			$error = array('error' => $this->upload->display_errors());
	
			// manejar el error de carga aquí
		}
		else {
			$data = array('upload_data' => $this->upload->data());
			echo $config['upload_path'] ;
			// el archivo se cargó con éxito, puedes acceder a la información del archivo cargado a través de $data['upload_data']
		}
	}
}
