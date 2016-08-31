<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParametrosController extends CI_Controller {
    
    public function __construct() {
		parent::__construct();
        $this->load->model('Sistema/ParametrosModel');

        if (!$this->session->userdata('logged_in')) {
            redirect('LoginController', 'refresh');
        }
	}
    
	public function index()	{
        $datos['grilla'] = "";
        $this->load->view('ajax/sistema/parametros/v_parametros', $datos);
	}
    
}