<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contactos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (isset($_SESSION['logged']) == FALSE) {
            header("location:" . base_url() . 'home');
        }
        $this->load->library('form_validation');
        $this->load->model("menu_model", "menu");
        $this->load->model("Persona_model", "personas");
        $this->load->model("configuracion_model", "configuracion");
    }

    public function clientes() {

        $data['titulo'] = 'Clientes';
        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda', $data);
        $this->load->view('internas/contactos/clientes');
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer', $data);
    }

    public function tablaClientes() {
        $datos['Usuarios'] = $this->General_Model->ListarUsuarios('CLIENTE');
        $this->load->view('internas/contactos/tablaClientes', $datos);
    }

    public function editarUsuario() {
        $idpersona = $this->input->post('ID');
        $datos['Usuario'] = $this->General_Model->MostrarUsuario($idpersona);
        $datos['Documento'] = $this->General_Model->listarDocumento_model();
        $datos['Rol'] = $this->General_Model->ListarRoles_model();
        $this->load->view('internas/contactos/ModalActualizarCliente', $datos);
    }

    public function updateClientes() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_error_delimiters('<spam>', '</spam>');
            $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
            $this->form_validation->set_rules('apePat', 'Apellido Paterno', 'trim|required');
            $this->form_validation->set_rules('apeMat', 'Apellido Materno', 'required');
            $this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required|is_natural_no_zero|min_length[8]|max_length[11]');
            $this->form_validation->set_rules('tipoDocumento', 'Tipo Documento', 'required');
            $this->form_validation->set_rules('numeroDoc', 'Número de Documento', 'trim|required');
            $this->form_validation->set_rules('direccion', 'Dirección', 'trim|required');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
            $this->form_validation->set_rules('rol', 'Rol', 'required');
            $this->form_validation->set_rules('estado', 'Estado', 'required');
            if ($this->form_validation->run() == TRUE) {
                $dato[1] = strtoupper($this->input->post('user_id')); //ID_PERSONA
                $dato[2] = strtoupper($this->input->post('nombre')); //NOMBRES
                $dato[3] = strtoupper($this->input->post('apePat')); //APELLIDO_PATERNO
                $dato[4] = strtoupper($this->input->post('apeMat')); //APELLIDO_MATERNO
                $dato[5] = strtoupper($this->input->post('tipoDocumento')); //ID_TIPO_DOCUMENTO
                $dato[6] = strtoupper($this->input->post('numeroDoc')); //NUMERO_DOCUMENTO
                $dato[7] = strtoupper($this->input->post('direccion')); //DIRECCION
                $dato[8] = strtoupper($this->input->post('telefono')); //TELEFONO
                $dato[9] = strtoupper($this->input->post('email')); //EMAIL
                $dato[10] = ""; //PERSONA_CONTACTO
                $dato[11] = strtoupper($this->input->post('rol')); //ID_TIPO_PERSONA
                $dato[12] = strtoupper($_SESSION['id']); //USERMOD
                $dato[13] = strtoupper($this->input->post('estado')); //USERESTADO
                if ($this->configuracion->updateTrabajador_modal($dato) == TRUE) {
                    echo "exito";
                } else {
                    echo "error";
                }
            } else {
                $data['nombre'] = form_error('nombre');
                $data['apePat'] = form_error('apePat');
                $data['apeMat'] = form_error('apeMat');
                $data['telefono'] = form_error('telefono');
                $data['tipoDocumento'] = form_error('tipoDocumento');
                $data['numeroDoc'] = form_error('numeroDoc');
                $data['direccion'] = form_error('direccion');
                $data['email'] = form_error('email');
                $data['rol'] = form_error('rol');
                $data['estado'] = form_error('estado');
                echo json_encode($data);
            }
        } else {
            show_404();
        }
    }

    public function NuevoCliente() {
        $data['titulo'] = 'Nuevo Cliente';
        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda');
        $datos['Documento'] = $this->General_Model->listarDocumento_model();
        $datos['Rol'] = $this->General_Model->ListarRoles_model();
        $this->load->view('internas/contactos/nuevoCliente', $datos);
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer', $data);
    }

    public function GuardarNuevoCliente() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_error_delimiters('<spam>', '</spam>');
            $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
            $this->form_validation->set_rules('apePat', 'Apellido Paterno', 'trim|required');
            $this->form_validation->set_rules('apeMat', 'Apellido Materno', 'trim|required');
            $this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required|is_natural_no_zero|min_length[8]|max_length[11]');
            $this->form_validation->set_rules('tipoDocumento', 'Tipo Documento', 'trim|required');
            $this->form_validation->set_rules('numeroDoc', 'Número de Documento', 'trim|required|is_natural_no_zero|min_length[8]|max_length[11]');
            $this->form_validation->set_rules('direccion', 'Dirección', 'trim|required');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
            $this->form_validation->set_rules('rol', 'Rol', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $dato[1] = ''; //USER
                $dato[2] = strtoupper($this->input->post('nombre')); //NOMBRES
                $dato[3] = strtoupper($this->input->post('apePat')); //APELLIDO PATERNO
                $dato[4] = strtoupper($this->input->post('apeMat')); //APELLIDO MATERNO
                $dato[5] = strtoupper($this->input->post('tipoDocumento')); //ID TIPO DOCUMENTO INT
                $dato[6] = strtoupper($this->input->post('numeroDoc')); //NUMERO DE DOCUMENTO
                $dato[7] = strtoupper($this->input->post('direccion')); //DIRECCION
                $dato[8] = strtoupper($this->input->post('telefono')); //TELEFONO
                $dato[9] = strtoupper($this->input->post('email')); //EMAIL
                $dato[10] = ""; //PASSWORD
                $dato[11] = ""; //PERSONA_CONTACTO
                $dato[12] = strtoupper($this->input->post('rol')); //TIPO_PERSONA
                $dato[13] = $_SESSION['id']; //USERREG
                if ($this->configuracion->insertNewUser($dato) == TRUE) {
                    echo "exito";
                } else {
                    echo "error";
                }
            } else {
                $data['nombre'] = form_error('nombre');
                $data['apePat'] = form_error('apePat');
                $data['apeMat'] = form_error('apeMat');
                $data['telefono'] = form_error('telefono');
                $data['tipoDocumento'] = form_error('tipoDocumento');
                $data['numeroDoc'] = form_error('numeroDoc');
                $data['direccion'] = form_error('direccion');
                $data['email'] = form_error('email');
                $data['rol'] = form_error('rol');
                $data['clave'] = form_error('clave');
                $data['confirmarClave'] = form_error('confirmarClave');
                echo json_encode($data);
            }
        } else {
            show_404();
        }
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
        $tipopersona = CLIENTE;
        $documento = $this->input->post('documento');
        echo $this->personas->validarDocumentomodel($documento, $tipopersona);
    }

    public function proveedores() {
        $data['titulo'] = 'Proveedores';
        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda');
        $this->load->view('internas/contactos/proveedores');
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer', $data);
    }

    public function tablaProveedor() {
        $datos['Usuarios'] = $this->General_Model->ListarUsuarios('PROVEEDOR');
        $this->load->view('internas/contactos/tablaProveedor', $datos);
    }

    public function editarProveedor() {
        $idpersona = $this->input->post('ID');
        $datos['Usuario'] = $this->General_Model->MostrarUsuario($idpersona);
        $datos['Documento'] = $this->General_Model->listarDocumento_model();
        $datos['Rol'] = $this->General_Model->ListarRoles_model();
        $this->load->view('internas/contactos/ModalActualizarProveedor', $datos);
    }

    public function updateProveedor() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_error_delimiters('<spam>', '</spam>');
            $this->form_validation->set_rules('nombre', 'Nombre y/o Razón Social', 'trim|required');
            $this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required|is_natural_no_zero|min_length[8]|max_length[11]');
            $this->form_validation->set_rules('tipoDocumento', 'Tipo Documento', 'required');
            $this->form_validation->set_rules('numeroDoc', 'Número de Documento', 'trim|required');
            $this->form_validation->set_rules('PersonaContacto', 'Datos de Contacto', 'trim|required');
            $this->form_validation->set_rules('direccion', 'Dirección', 'trim|required');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
            $this->form_validation->set_rules('rol', 'Rol', 'required');
            $this->form_validation->set_rules('estado', 'Estado', 'required');
            if ($this->form_validation->run() == TRUE) {
                $dato[1] = strtoupper($this->input->post('user_id')); //ID_PERSONA
                $dato[2] = strtoupper($this->input->post('nombre')); //NOMBRES
                $dato[3] = strtoupper($this->input->post('apePat')); //APELLIDO_PATERNO
                $dato[4] = strtoupper($this->input->post('apeMat')); //APELLIDO_MATERNO
                $dato[5] = strtoupper($this->input->post('tipoDocumento')); //ID_TIPO_DOCUMENTO
                $dato[6] = strtoupper($this->input->post('numeroDoc')); //NUMERO_DOCUMENTO
                $dato[7] = strtoupper($this->input->post('direccion')); //DIRECCION
                $dato[8] = strtoupper($this->input->post('telefono')); //TELEFONO
                $dato[9] = strtoupper($this->input->post('email')); //EMAIL
                $dato[10] = strtoupper($this->input->post('PersonaContacto')); //PERSONA_CONTACTO
                $dato[11] = strtoupper($this->input->post('rol')); //ID_TIPO_PERSONA
                $dato[12] = strtoupper($_SESSION['id']); //USERMOD
                $dato[13] = strtoupper($this->input->post('estado')); //USERESTADO
                if ($this->configuracion->updateTrabajador_modal($dato) == TRUE) {
                    echo "exito";
                } else {
                    echo "error";
                }
            } else {
                $data['nombre'] = form_error('nombre');
                $data['apePat'] = form_error('apePat');
                $data['apeMat'] = form_error('apeMat');
                $data['telefono'] = form_error('telefono');
                $data['tipoDocumento'] = form_error('tipoDocumento');
                $data['numeroDoc'] = form_error('numeroDoc');
                $data['direccion'] = form_error('direccion');
                $data['PersonaContacto'] = form_error('PersonaContacto');
                $data['email'] = form_error('email');
                $data['rol'] = form_error('rol');
                $data['estado'] = form_error('estado');
                echo json_encode($data);
            }
        } else {
            show_404();
        }
    }

    public function NuevoProveedor() {
        $data['titulo'] = 'Nuevo Cliente';
        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda');
        $datos['Documento'] = $this->General_Model->listarDocumento_model();
        $datos['Rol'] = $this->General_Model->ListarRoles_model();
        $this->load->view('internas/contactos/NuevoProveedor', $datos);
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer', $data);
    }

    public function GuardarNuevoProveedor() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_error_delimiters('<spam>', '</spam>');
            $this->form_validation->set_rules('nombre', 'Nombre y/o Razón Social', 'trim|required');
            $this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required|is_natural_no_zero|min_length[8]|max_length[11]');
            $this->form_validation->set_rules('tipoDocumento', 'Tipo Documento', 'trim|required');
            $this->form_validation->set_rules('numeroDoc', 'Número de Documento', 'trim|required|is_natural_no_zero|min_length[8]|max_length[11]');
            $this->form_validation->set_rules('PersonaContacto', 'Datos de Contacto', 'trim|required');
            $this->form_validation->set_rules('direccion', 'Dirección', 'trim|required');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
            $this->form_validation->set_rules('rol', 'Rol', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $dato[1] = ''; //USER
                $dato[2] = strtoupper($this->input->post('nombre')); //NOMBRES
                $dato[3] = ""; //APELLIDO PATERNO
                $dato[4] = ""; //APELLIDO MATERNO
                $dato[5] = strtoupper($this->input->post('tipoDocumento')); //ID TIPO DOCUMENTO INT
                $dato[6] = strtoupper($this->input->post('numeroDoc')); //NUMERO DE DOCUMENTO
                $dato[7] = strtoupper($this->input->post('direccion')); //DIRECCION
                $dato[8] = strtoupper($this->input->post('telefono')); //TELEFONO
                $dato[9] = strtoupper($this->input->post('email')); //EMAIL
                $dato[10] = ""; //PASSWORD
                $dato[11] = strtoupper($this->input->post('PersonaContacto')); //PERSONA_CONTACTO
                $dato[12] = strtoupper($this->input->post('rol')); //TIPO_PERSONA
                $dato[13] = $_SESSION['id']; //USERREG
                if ($this->configuracion->insertNewUser($dato) == TRUE) {
                    echo "exito";
                } else {
                    echo "error";
                }
            } else {
                $data['nombre'] = form_error('nombre');
                $data['telefono'] = form_error('telefono');
                $data['tipoDocumento'] = form_error('tipoDocumento');
                $data['numeroDoc'] = form_error('numeroDoc');
                $data['PersonaContacto'] = form_error('PersonaContacto');
                $data['direccion'] = form_error('direccion');
                $data['email'] = form_error('email');
                $data['rol'] = form_error('rol');
                $data['clave'] = form_error('clave');
                $data['confirmarClave'] = form_error('confirmarClave');
                echo json_encode($data);
            }
        } else {
            show_404();
        }
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
