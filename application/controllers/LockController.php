<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LockController extends CI_Controller {
    
    public function __construct() {
		parent::__construct();
	}
    
	public function index()	{
        
        if (!$this->session->userdata('logged_remember')){
            redirect('Login', 'refresh');
        }
        
        $datos['rememberData'] = $this->session->userdata('logged_remember');          
        $this->load->view('Lock/v_lock', $datos);
        
	}
    
}