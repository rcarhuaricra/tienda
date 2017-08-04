<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (!$_SESSION['logged']) {
            header("location:" . base_url() . 'home');
        }
    }

    public function index() {
        $data['titulo'] = 'Panel de Atención';
        $data['iCheck'] = TRUE;        
        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda');
        $this->load->view('welcome_message');
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer', $data);
    }

}
