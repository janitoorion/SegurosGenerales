<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
    
    public function __construct() {
		parent::__construct();
        $this->load->library('Encrypt');
        $this->load->model('LoginModel');
    }
    
	public function index()	{
        if ($this->session->userdata('logged_remember')) {
            $this->session->unset_userdata('logged_remember');
        }
             
        $this->load->view('v_login');
	}
    
    public function validar_login() {
        $username = 'admin';//$this->input->post('username');
        $password = '123';//$this->input->post('password');
        $remember = '';//$this->input->post('remember');
        
        $result = $this->LoginModel->busca_usuario_login($username);

        if (!$result) {
            $status = array("STATUS" => $result[0]['deserror']);
        } else {
            $usuario = array();
            foreach ($result[0]['cursor'] as $row){
                echo $row->usupassword;
            }
            /*
            foreach ($result as $row) {
                $des_password_db = $this->desencriptar($row->password);

                if (strcmp($des_password_db, $password) == 0) {
                    $status = array("STATUS" => "TRUE");
                    $user = array('id' => $row->id,
                        'nombre' => $row->nombre,
                        'usuario' => $row->usuario,
                        'perfil' => $row->id_perfil,
                        'id_sistema' => $row->id_sistema,
                        'rut_empresa' => $row->rut_empresa,
                        'nombre_empresa' => $row->nombre_empresa
                    );

                    $this->session->set_userdata('logged_in', $user);
                    
                    if ($remember == 'on'){
                        $recuerdame = array('remember' => $remember,
                                            'usuario' => $row->usuario,
                                            'nombre' => $row->nombre,
                                            'id_sistema' => $row->id_sistema);
                        $this->session->set_userdata('logged_remember', $recuerdame);
                    }
                    else{
                        if ($this->session->userdata('logged_remember')) {
                            $this->session->unset_userdata('logged_remember');
                        }
                    }
                    
                } else {
                    $status = array("STATUS" => $this->lang->line('datosNoValidos', FALSE));
                }
            }*/
        }
        //echo json_encode($status);
    }
        
    function encriptar($msg) {
        $encrypted_string = $this->encrypt->encode($msg);
        //echo $encrypted_string;
		return $encrypted_string;
    }

    function desencriptar($msg) {
        $plaintext_string = $this->encrypt->decode($msg);
        return $plaintext_string;
    }
}