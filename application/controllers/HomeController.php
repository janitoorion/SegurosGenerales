<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
    
    public function __construct() {
		parent::__construct();
        $this->load->model('MenuModel');
	}
    
	public function index()	{
        $id = "";
        $nombre = "";
        $usuario = "";

        if ($this->session->userdata('logged_in')) {
            $userdata = $this->session->userdata('logged_in');
            $id = $userdata['id'];
            $nombre = $userdata['nombre'];
            $usuario = $userdata['usuario'];
        }
        else {
            if ($this->session->userdata('logged_remember')) {
                $userdata = $this->session->userdata('logged_remember');
                $remember = $userdata['remember'];
                $usuario = $userdata['usuario'];
                
                if ($remember == 'on'){
                    //echo "remember";
                    //redirect('LockController', 'refresh');
                    redirect('HomeController', 'refresh');
                }
                else{
                    redirect('LoginController', 'refresh');
                }
            }
            else {
                redirect('LoginController', 'refresh');
            }
            redirect('LoginController', 'refresh');
        }
        $datos['datosUsuario'] = $this->session->userdata('logged_in');
        $datos['menuUsuario'] = $this->crear_menu((int)$id);
        $this->load->view('v_home', $datos);
	}
    
    public function crear_menu($codusuario) {
        $menu = "<li class=''><a href='Inicio/Index' title='Inicio'><i class='fa fa-lg fa-fw txt-color-blue fa-home'></i><span class='menu-item-parent'>Inicio</span></a></li>";
        $menu = $menu . $this->crear_menu_nivel_1($codusuario);
        return $menu;
    }
    
    function crear_menu_nivel_1($codusuario) {
        $nivel1 = "";
        $padre = $this->MenuModel->menu_padre($codusuario)["cursor"];
        if (!$padre) {
            return "";
        } else {
            foreach ($padre as $row) {  
                $hijo = $this->MenuModel->menu_hijo($codusuario, $row['OPCCODIGO'])['cursor'];
                $item = "";
                if (!$hijo) {
                    $item = $item . "<li><a href='" . $row['OPCURL'] . "'>" . $row['OPCICONO'] . $row['TEXCODIGO'] . "</a></li>";
                } else {
                    $item = $item . "<li class='class='top-menu-invisible'>";
                    $item = $item . "<a href='#'>" . $row['OPCICONO'] . "<span class='menu-item-parent'>" . $row['TEXCODIGO'] . "</span></a>";
                    $item = $item . "<ul>";
                    $item = $item . $this->crear_menu_sub_niveles($codusuario, $row['OPCCODIGO']);
                    $item = $item . "</ul>";
                    $item = $item . "</li>";
                }
                $nivel1 = $nivel1 . $item;
            
            }
        }
        return $nivel1;
    }
    
    function crear_menu_sub_niveles($codusuario, $opccodigo) {
        $masnivel = "";
        $hijos = $this->MenuModel->menu_hijo($codusuario, $opccodigo)['cursor'];
        if (!$hijos) {
            return "";
        }
        else{
            foreach ($hijos as $row) {          
                $masHijos = $this->MenuModel->menu_hijo($codusuario, $opccodigo)['cursor'];
                $item = "";
                if (!$masHijos) {
                    $item = $item . "<li><a href='" . $row['OPCURL'] . "'>" . $row['OPCICONO'] . $row['TEXCODIGO'] . "</a></li>";
                } else {
                    $item = $item . "<li>";
                    $item = $item . "<a href='#'>" . $row['OPCICONO'] . $row['TEXCODIGO'] . "</a>";
                    $item = $item . "<ul>";
                    $item = $item . $this->crear_menu_sub_niveles($codusuario, $row['OPCCODIGO']);
                    $item = $item . "</ul>";
                    $item = $item . "</li>";
                }
                $masnivel = $masnivel . $item;
            }
        }
        return $masnivel;
    }
            
    function logout() {
        if ($this->session->userdata('logged_in')) {
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('logged_remember');
        }
        
        redirect('HomeController', 'refresh');
    }
    
}