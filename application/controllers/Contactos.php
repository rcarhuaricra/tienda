<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contactos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (isset($_SESSION['logged']) == FALSE) {
            header("location:" . base_url() . 'home');
        }
        $this->load->model("menu_model", "menu");
        $this->load->model("Persona_model", "personas");
    }

    public function clientes() {
        
        $data['titulo'] = 'Clientes';

        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda', $data);
        $datos['tipoDocumento'] = $this->personas->tipodocumento();
        $datos['clientes'] = $this->personas->personas(CLIENTE);
        $this->load->view('internas/contactos/clientes', $datos);
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer', $data);
    }

    public function guardarCliente() {
        $datos = $this->input->post();
        $insertCliente = array(
            'USER' => strtoupper(substr(trim($datos['nombres']), 0, 1) . str_replace(' ', '', trim($datos['apellidoPaterno'])) . trim($datos['numeroDocumento'])),
            'NOMBRES' => strtoupper(trim($datos['nombres'])),
            'APELLIDO_PATERNO' => strtoupper(trim($datos['apellidoPaterno'])),
            'APELLIDO_MATERNO' => strtoupper(trim($datos['apellidoMaterno'])),
            'ID_TIPO_DOCUMENTO' => trim($datos['tipoDocumento']),
            'NUMERO_DOCUMENTO' => trim($datos['numeroDocumento']),
            'DIRECCION' => trim($datos['direccion']),
            'TELEFONO' => trim($datos['celular']),
            'EMAIL' => strtoupper(trim($datos['email'])),
            'USER_REG' => $_SESSION['user'],
            'ID_TIPO_PERSONA' => CLIENTE
        );
        echo $guardo = $this->personas->GuardaClienteModel($insertCliente);
    }

    public function validarDocumento() {
        $tipopersona='5';
        $documento = $this->input->post('documento');
        echo $this->personas->validarDocumentomodel($documento, $tipopersona);
    }

    public function proveedores() {
        $data['titulo'] = 'Proveedores';

        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda', $data);
        $datos['tipoDocumento'] = $this->personas->tipodocumento();
        $datos['clientes'] = $this->personas->personas(PROVEEDOR);
        $this->load->view('internas/contactos/proveedores', $datos);
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer', $data);
    }

    public function guardarProveedor() {
        $datos = $this->input->post();
        $insertCliente = array(
            'USER' => strtoupper(substr(trim($datos['nombres']), 0, 1) . str_replace(' ', '', trim($datos['apellidoPaterno'])) . trim($datos['numeroDocumento'])),
            'NOMBRES' => strtoupper(trim($datos['nombres'])),
            'APELLIDO_PATERNO' => strtoupper(trim($datos['apellidoPaterno'])),
            'APELLIDO_MATERNO' => strtoupper(trim($datos['apellidoMaterno'])),
            'PERSONA_CONTACTO' => strtoupper(trim($datos['nombreContacto'])),
            'ID_TIPO_DOCUMENTO' => trim($datos['tipoDocumento']),
            'NUMERO_DOCUMENTO' => trim($datos['numeroDocumento']),
            'DIRECCION' => trim($datos['direccion']),
            'TELEFONO' => trim($datos['celular']),
            'EMAIL' => strtoupper(trim($datos['email'])),
            'USER_REG' => $_SESSION['user'],
            'ID_TIPO_PERSONA' => PROVEEDOR
        );
        echo $guardo = $this->personas->GuardaClienteModel($insertCliente);
    }

}
