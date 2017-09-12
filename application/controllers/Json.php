<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->model("Json_Model");
    }

    public function generarProveedores() {
        $buscar=$_POST["search"];
        $result= $this->Json_Model->ListarProveedoresSelect('PROVEEDOR',$buscar);
        echo json_encode($result);        
    }
    public function generarMarcas() {
        $buscar=$_POST["search"];
        $result= $this->Json_Model->ListarMarcasSelect($buscar);
        echo json_encode($result);        
    }

    public function logout() {
        $this->session->sess_destroy();
        header("location:" . base_url() . 'home');
    }

}
