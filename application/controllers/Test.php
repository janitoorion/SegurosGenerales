<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
        $this->load->model('Oracle');
	}
    
	public function index()
	{
		echo "ok";
	}
	
	public function padre($id)
	{
		$datos = $this->Oracle->lista_menu_padre($id);
		var_dump($datos);
	}

	public function hijo($id, $codigo)
	{
		$datos = $this->Oracle->lista_menu_hijo($id, $codigo);
		var_dump($datos);
	}

}
