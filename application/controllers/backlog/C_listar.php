<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_listar extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('backlog/M_listado','listado');
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
		$this->layout->view('backlog/inicio');
	}
	public function listar_backlog(){
        $json = $this->listado->mostrar_backlog();
		echo json_encode($json);
		
    }
}
