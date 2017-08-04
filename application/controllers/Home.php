<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('session');
        if ($this->session->userdata('logged')) {
            header("location:" . base_url() . 'dashboard');
        }

        $this->load->library('form_validation');
        $this->load->model('LogingModel');
    }

    public function index() {
        echo isset($_SESSION['logged']);
        $this->form_validation->set_error_delimiters('<div class="text-red">', '</div>');
        $this->form_validation->set_rules('email', 'email', 'callback_verificarEmail');
        $this->form_validation->set_rules('password', 'Password', 'callback_verificarPassword');
        if ($this->form_validation->run() == FALSE) {
            $data['titulo'] = 'Loging';
            $data['iCheck'] = TRUE;
            $data['tipo'] = TRUE;
            $this->load->view('plantilla/header', $data);
            $this->load->view('pages/loging');
            $this->load->view('plantilla/footer', $data);
        } else {
            $email = strtoupper($this->input->post('email'));
            $password = md5(strtoupper($this->input->post('password')));
            $this->IniciarSession($email, $password);
            header("location:" . base_url() . 'Dashboard');
        }
    }

    protected function IniciarSession($email, $password) {
        $data = $this->LogingModel->llamarDatos($email, $password);

        $sesion = array(
            'nombre' => $data->NOMBRES,
            'apellidos' => $data->APELLIDO_PAT .' '. $data->APELLIDO_MAT,
            'email' => $data->EMAIL,
            'rol'=>$data->ROL_NOMBRE,
            'logged' => TRUE
        );
        $this->session->set_userdata($sesion);
    }

    public function verificarEmail() {
        $email = strtoupper($this->input->post('email'));
        if ($email == '') {
            $this->form_validation->set_message('verificarEmail', 'El Campo {field} es Necesario');
            return FALSE;
        } else {
            if ($this->LogingModel->verificarEmailModel($email) == FALSE) {
                $this->form_validation->set_message('verificarEmail', "El correo <strong>$email</strong> no esta registrado");
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

    public function verificarPassword() {
        $email = strtoupper($this->input->post('email'));
        $password = md5(strtoupper($this->input->post('password')));
        if ($password == '') {
            $this->form_validation->set_message('verificarPassword', 'El Campo {field} es Necesario');
            return FALSE;
        } else {
            if ($this->LogingModel->verificarPasswordModel($email, $password) == FALSE) {
                $this->form_validation->set_message('verificarPassword', 'El {field} ingresado es Incorrecto');
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        header("location:" . base_url() . 'home');
    }

}
