<!-- controlador inicial -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicial extends CI_Controller {
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
		// $this->layout->view('inicial/inicio');
		$session_data = $this->session->all_userdata();

		if (!isset($session_data['usuario_login'])) { //Si no encruentra en el array el objeto usuario_login redireccionar al login
		  redirect('/login', 'location');
		} else {
			$idusu= $this->session->userdata('id_usuario');
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
	}
}
