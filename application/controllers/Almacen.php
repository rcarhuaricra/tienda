<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Almacen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (isset($_SESSION['logged']) == FALSE) {
            header("location:" . base_url() . 'home');
        }
        $this->load->model("menu_model", "menu");
        $this->load->model("Almacen_model", "almacen");
    }

    public function productos() {
        
        echo $this->GUID();
        $data['titulo'] = 'Panel de Atención';
        $data['iCheck'] = TRUE;
        $data['fileInput'] = TRUE;
        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda', $data);
        $datos['marcas'] = $this->almacen->buscaMarcas_model_select();
        $this->load->view('internas/almacen/producto', $datos);
        $this->load->view('internas/almacen/modales');
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer', $data);
    }

    public function marcas() {
        $data['titulo'] = 'Historial de COmpras';
        $data['iCheck'] = TRUE;
        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda', $data);
        $this->load->view('internas/almacen/marcas');
        $this->load->view('internas/almacen/modales');
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer', $data);
    }

    public function historial() {
        $data['titulo'] = 'Historial de Compras';
        $data['iCheck'] = TRUE;
        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda', $data);
        $this->load->view('internas/almacen/historial');
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer', $data);
    }

    public function newProductos() {
        $this->load->view('internas/almacen/nuevo');
    }

    public function buscarMarcas() {
        $keyword = $this->input->post('query');
        $data = $this->almacen->buscaMarcas_model($keyword);
        foreach ($data as $row) {
            $dato[] = $row->NOMBRE_MARCA;
        }
        echo json_encode($dato);
    }

    public function buscarCodigoBarras() {
        $keyword = $this->input->post('query');
        $data = $this->almacen->buscaMarcas_model($keyword);
        foreach ($data as $row) {
            $dato[] = $row->NOMBRE_MARCA;
        }
        echo json_encode($dato);
    }

    public function guardarMarcas() {
        $marcas = $this->input->post('txtMarca');


        echo $this->almacen->guardarMarca_model($marcas);
    }

    protected function GUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

}
