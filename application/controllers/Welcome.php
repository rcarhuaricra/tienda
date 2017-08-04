<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $this->load->view('plantilla/header');
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda');
        $this->load->view('welcome_message');
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer');
    }

}
