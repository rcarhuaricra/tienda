<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Facturacion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
         if (isset($_SESSION['logged'])==FALSE) {
            header("location:" . base_url() . 'home');
        }
        $this->load->model("menu_model", "menu");
    }

    public function administrar() {
        $data['titulo'] = 'Historial de COmpras';
        $data['iCheck'] = TRUE;
        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda', $data);
        $this->load->view('internas/facturacion/administrar');
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer', $data);
    }

    public function nuevo() {
        $data['titulo'] = 'Nueva Compra';
        $data['iCheck'] = TRUE;
        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda', $data);
        $this->load->view('internas/facturacion/nueva');
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer', $data);
    }

}
