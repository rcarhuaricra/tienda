<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
         if (isset($_SESSION['logged'])==FALSE) {
            header("location:" . base_url() . 'home');
        }
        $this->load->model("menu_model", "menu");
    }

    public function index() {
        $data['titulo'] = 'Historial de COmpras';
        $data['iCheck'] = TRUE;
        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda', $data);
        $this->load->view('internas/marcas/marcas');
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer', $data);
    }
    

}
