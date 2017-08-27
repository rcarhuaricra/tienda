<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (isset($_SESSION['logged']) == FALSE) {
            header("location:" . base_url() . 'home');
        }
        $this->load->library('form_validation');
        $this->load->model("menu_model", "menu");
        $this->load->model("configuracion_model", "configuracion");
    }

    public function index() {
        $data['titulo'] = 'Panel de Atención';
        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda');
        $datos['locales'] = $this->configuracion->ListarLocales();
        $this->load->view('internas/configuracion/configuracion', $datos);
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer', $data);
    }

    public function updateLocal($idlocal) {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_error_delimiters('<spam>', '</spam>');
            $this->form_validation->set_rules('nombreTienda', 'Nombre de La Tienda', 'required');
            $this->form_validation->set_rules('ruc', 'RUC', 'required');
            $this->form_validation->set_rules('email', 'E-mail', 'required');
            $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
            $this->form_validation->set_rules('igv', 'IGV', 'required');
            $this->form_validation->set_rules('direccion', 'Dirección', 'required');
            if ($this->form_validation->run() == TRUE) {
                $dato[1] = $idlocal;
                $dato[2] = $this->input->post('nombreTienda');
                $dato[3] = $this->input->post('ruc');
                $dato[4] = $this->input->post('email');
                $dato[5] = $this->input->post('telefono');
                $dato[6] = $this->input->post('igv');
                $dato[7] = $this->input->post('direccion');
                $dato[8] = $_SESSION['id'];
                if ($this->configuracion->updateLocalTienda_modal($dato) == TRUE) {
                    echo "exito";
                } else {
                    echo "error";
                }
            } else {
                $data['nombreTienda'] = form_error('nombreTienda');
                $data['ruc'] = form_error('ruc');
                $data['email'] = form_error('email');
                $data['telefono'] = form_error('telefono');
                $data['igv'] = form_error('igv');
                $data['direccion'] = form_error('direccion');
                echo json_encode($data);
            }
        }
    }

    public function trabajadores() {
        $data['titulo'] = 'Trabajadores';
        $data['iCheck'] = TRUE;
        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda');
        $this->load->view('internas/configuracion/trabajadores');
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer', $data);
    }

    public function tablaTrabajadores() {
        $datos['Usuarios'] = $this->General_Model->ListarUsuarios('TRABAJADOR');
        $this->load->view('internas/configuracion/tablaTrabajadores', $datos);
    }

    public function editarUsuario() {
        $idpersona = $this->input->post('ID');
        $datos['Usuario'] = $this->General_Model->MostrarUsuario($idpersona);
        $datos['Documento'] = $this->General_Model->listarDocumento_model();
        $datos['Rol'] = $this->General_Model->ListarRoles_model();
        $this->load->view('internas/configuracion/ModalActualizarUsuario', $datos);
    }

    public function editarClave() {
        $idpersona = $this->input->post('ID');
        $datos['Usuario'] = $this->General_Model->MostrarUsuario($idpersona);
        $this->load->view('internas/configuracion/ModalActualizarPassword', $datos);
    }

    public function updateTrabajador() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_error_delimiters('<spam>', '</spam>');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('apePat', 'Apellido Paterno', 'required');
            $this->form_validation->set_rules('apeMat', 'Apellido Materno', 'required');
            $this->form_validation->set_rules('tipoDocumento', 'Tipo Documento', 'required');
            $this->form_validation->set_rules('numeroDoc', 'Número de Documento', 'required');
            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
            $this->form_validation->set_rules('rol', 'Rol', 'required');
            $this->form_validation->set_rules('estado', 'Estado', 'required');
            if ($this->form_validation->run() == TRUE) {
                $dato[1] = $this->input->post('user_id');
                $dato[2] = $this->input->post('nombre');
                $dato[3] = $this->input->post('apePat');
                $dato[4] = $this->input->post('apeMat');
                $dato[5] = $this->input->post('tipoDocumento');
                $dato[6] = $this->input->post('numeroDoc');
                $dato[7] = $this->input->post('email');
                $dato[8] = $this->input->post('rol');
                $dato[9] = $this->input->post('estado');
                $dato[10] = $_SESSION['id'];
                if ($this->configuracion->updateTrabajador_modal($dato) == TRUE) {
                    echo "exito";
                } else {
                    echo "error";
                }
            } else {
                $data['nombre'] = form_error('nombre');
                $data['apePat'] = form_error('apePat');
                $data['apeMat'] = form_error('apeMat');
                $data['tipoDocumento'] = form_error('tipoDocumento');
                $data['numeroDoc'] = form_error('numeroDoc');
                $data['email'] = form_error('email');
                $data['rol'] = form_error('rol');
                $data['estado'] = form_error('estado');
                echo json_encode($data);
            }
        }
    }

    public function NuevoTrabajador() {
        $data['titulo'] = 'Nuevo Trabajador';        
        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda');
        $this->load->view('internas/configuracion/trabajadores');
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer', $data);
    }

}
