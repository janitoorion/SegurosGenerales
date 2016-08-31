<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParametrosController extends CI_Controller {
    
    public function __construct() {
		parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('LoginController', 'refresh');
        }
	}
    
	public function index()	{
        $datos['asdf'] = "asdf";
        $this->load->view('ajax/sistema/parametros/v_parametros', $datos);
	}
    
}