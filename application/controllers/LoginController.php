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
             
        $this->load->view('Login/v_login');
	}
    
    public function validar_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $remember = $this->input->post('remember');
        
        $result = $this->LoginModel->busca_usuario_login($username);

        if ($result['coderror'] <> "0"){
            $status = array("STATUS" => $result['descerror']);
        }
        else{
            $usuario = array();
            $status = '';

            $des_password_db = $this->desencriptar($result['usupassword']);
            if (strcmp($des_password_db, $password) == 0) {
                
                $status = array("STATUS" => "TRUE");
                $user = array('id'      => $result['usucodigo'],
                              'nombre'  => $result['usunombre'],
                              'usuario' => $result['usunomusu']
                );

                $this->session->set_userdata('logged_in', $user);
                
                if ($remember == 'on'){
                    $recuerdame = array('remember' => $remember,
                                        'usuario'   => $result['usunomusu'],
                                        'nombre'    => $result['usunombre']);
                                        
                    $this->session->set_userdata('logged_remember', $recuerdame);
                }
                else{
                    if ($this->session->userdata('logged_remember')) {
                        $this->session->unset_userdata('logged_remember');
                    }
                }  
            }
            else{
                $status = array("STATUS" => 'Los datos no son válidos');
            }
            
        }
            
        echo json_encode($status);
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