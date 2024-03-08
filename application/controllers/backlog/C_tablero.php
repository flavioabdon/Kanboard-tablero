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
}
