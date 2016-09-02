<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {
    
    public function __construct() {
		parent::__construct();
        //$this->load->model('Sistema/ParametrosModel');
        $this->load->model('Persona/PersonasModel');
        if (!$this->session->userdata('logged_in')) {
            redirect('LoginController', 'refresh');
        }
	}
    
	public function index()	{
        //$datos['grilla'] = $this->ParametrosModel->grilla(true, true);
        //$this->load->view('ajax/sistema/parametros/v_parametros', $datos);
        echo "Index";
	}

    public function nuevaPersona()	{
        //Lista Tipos de Personas
        $result = $this->PersonasModel->listaSexoPersonas();
        $datos["tipopersona"] = $result["cursor"];

        //Lista Sexo de Personas
        $result = $this->PersonasModel->listaTiposDePersonas();
        $datos["sexopersona"] = $result["cursor"];

        

        $this->load->view('ajax/personas/persona/v_nuevapersona',$datos);
	}

    public function adminPersona()	{
        $this->load->view('ajax/personas/persona/v_administrarpersona');
	}
    public function buscarPersona($a)	{
        //se buscara en el modelo
        echo $a;//$this->input->post('a');
        //$this->load->view('ajax/personas/persona/v_administrarpersona');
	}

    
}