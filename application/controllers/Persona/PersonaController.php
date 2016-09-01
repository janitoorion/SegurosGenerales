<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonaController extends CI_Controller {
    
    public function __construct() {
		parent::__construct();
        //$this->load->model('Sistema/ParametrosModel');
        if (!$this->session->userdata('logged_in')) {
            redirect('LoginController', 'refresh');
        }
	}
    
	public function index()	{
        //$datos['grilla'] = $this->ParametrosModel->grilla(true, true);
        //$this->load->view('ajax/sistema/parametros/v_parametros', $datos);
	}

    public function nuevaPersona()	{
        $this->load->view('ajax/persona/persona/v_nuevapersona');
	}

    
}