<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
		parent::__construct();
        $this->load->model('Menu');
	}
    
	public function index()	{
        /* LOGIN */
        if ($this->session->userdata('logged_in')) {
            $userdata = $this->session->userdata('logged_in');
            $id = $userdata['codusuario'];
            $nombre = $userdata['nombre'];
            $perfil = $userdata['perfil'];
            $usuario = $userdata['usuario'];
        }
        else {
            if ($this->session->userdata('logged_remember')) {
                $userdata = $this->session->userdata('logged_remember');
                $remember = $userdata['remember'];
                $usuario = $userdata['usuario'];
                
                if ($remember == 'on'){
                    redirect('Lock', 'refresh');
                }
                else{
                    redirect('Login', 'refresh');
                }
            }
            else {
                redirect('Login', 'refresh');
            }
            redirect('Login', 'refresh');
        }
        $datos['datosUsuario'] = $this->session->userdata('logged_in');
        /* --- */
                  
        $datos['menuUsuario'] = $this->crear_menu((int)$codusuario);
        $this->load->view('v_home', $datos);
	}
    
    function crear_menu($codusuario) {
        $menu = "<li class=''><a href='Inicio/Index' title='Inicio'><i class='fa fa-lg fa-fw txt-color-blue fa-home'></i><span class='menu-item-parent'>Inicio</span></a></li>";
        $menu = $menu . $this->crear_menu_nivel_1($codusuario));
        return $menu;
    }
    
    function crear_menu_nivel_1($codusuario) {
        $nivel1 = "";
        
        $padre = $this->Menus->menu_padre($codusuario);
        if (!$padre) {
            return "";
        } else {
            foreach ($padre as $row) {          
                $hijo = $this->Menus->menu_hijo($codusuario, $row->opccodigo);
                $item = "";
                if (!$hijo) {
                    if ($idioma == "es"){
                        $item = $item . "<li><a href='" . $row->url . "'>" . $row->icono . $row->texto . "</a></li>";
                    }else{
                        $item = $item . "<li><a href='" . $row->url . "'>" . $row->icono . $row->texto_en . "</a></li>";
                    }
                } else {
                    $item = $item . "<li class='class='top-menu-invisible'>";
                    if ($idioma == "es"){
                        $item = $item . "<a href='#'>" . $row->icono . "<span class='menu-item-parent'>" . $row->texto . "</span></a>";
                    }else{
                        $item = $item . "<a href='#'>" . $row->icono . "<span class='menu-item-parent'>" . $row->texto_en . "</span></a>";
                    }
                    $item = $item . "<ul>";
                    $item = $item . $this->crear_menu_sub_niveles($sistema, $perfil, $row->id, $idioma);
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
        
        $hijos = $this->Menus->menu_hijo($codusuario, $opccodigo);
        if (!$hijos) {
            return "";
        }
        else{
            foreach ($hijos as $row) {          
                $masHijos = $this->Menus->menu_hijo($codusuario, $opccodigo);
                $item = "";
                if (!$masHijos) {
                    if ($idioma == "es"){
                        $item = $item . "<li><a href='" . $row->url . "'>" . $row->icono . $row->texto . "</a></li>";
                    }else{
                        $item = $item . "<li><a href='" . $row->url . "'>" . $row->icono . $row->texto_en . "</a></li>";
                    }
                } else {
                    $item = $item . "<li>";
                    if ($idioma == "es"){
                        $item = $item . "<a href='#'>" . $row->icono . $row->texto . "</a>";
                    }else{
                        $item = $item . "<a href='#'>" . $row->icono . $row->texto_en . "</a>";
                    }
                    $item = $item . "<ul>";
                    $item = $item . $this->crear_menu_sub_niveles($codusuario, $opccodigo);
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
        }
        
        redirect('Home', 'refresh');
    }
    
}