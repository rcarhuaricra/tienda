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
        $USER = '';
        $NOMBRES = strtoupper(trim($datos['nombres']));
        $APELLIDO_PATERNO = strtoupper(trim($datos['apellidoPaterno']));
        $APELLIDO_MATERNO = strtoupper(trim($datos['apellidoMaterno']));
        $ID_TIPO_DOCUMENTO = trim($datos['tipoDocumento']);
        $NUMERO_DOCUMENTO = trim($datos['numeroDocumento']);
        $DIRECCION = trim($datos['direccion']);
        $TELEFONO = trim($datos['celular']);
        $EMAIL = strtoupper(trim($datos['email']));
        $ID_TIPO_PERSONA = CLIENTE;
        $USER_REG = $_SESSION['user'];
        $sql = "CALL insertPersona('$USER','$NOMBRES','$APELLIDO_PATERNO','$APELLIDO_MATERNO',$ID_TIPO_DOCUMENTO,'$NUMERO_DOCUMENTO','$DIRECCION','$TELEFONO','$EMAIL','','',$ID_TIPO_PERSONA,'$USER_REG')";
        $query = $this->db->query($sql);
        echo $query;
    }

    public function validarDocumento() {
        $tipopersona=CLIENTE;
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
        $USER = '';
        $NOMBRES = strtoupper(trim($datos['nombres']));
        $APELLIDO_PATERNO = strtoupper(trim($datos['apellidoPaterno']));
        $APELLIDO_MATERNO = strtoupper(trim($datos['apellidoMaterno']));
        $NOMBRE_CONTACTO = strtoupper(trim($datos['nombreContacto']));
        $ID_TIPO_DOCUMENTO = trim($datos['tipoDocumento']);
        $NUMERO_DOCUMENTO = trim($datos['numeroDocumento']);
        $DIRECCION = trim($datos['direccion']);
        $TELEFONO = trim($datos['celular']);
        $EMAIL = strtoupper(trim($datos['email']));
        $ID_TIPO_PERSONA = PROVEEDOR;
        $USER_REG = $_SESSION['user'];
        $sql = "CALL insertPersona('$USER','$NOMBRES','$APELLIDO_PATERNO','$APELLIDO_MATERNO',$ID_TIPO_DOCUMENTO,'$NUMERO_DOCUMENTO','$DIRECCION','$TELEFONO','$EMAIL','','$NOMBRE_CONTACTO',$ID_TIPO_PERSONA,'$USER_REG')";
        $query = $this->db->query($sql);
        echo $query;
    }

}
