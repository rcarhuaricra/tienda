<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Almacen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        if (isset($_SESSION['logged']) == FALSE) {
            header("location:" . base_url() . 'home');
        }
        $this->load->model("menu_model", "menu");
        $this->load->model("Almacen_model", "almacen");
    }

    public function actualizarProducto() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_error_delimiters('<spam>', '</spam>');
            $this->form_validation->set_rules('codigoBarra', 'Codigo de Barras', 'required|min_length[13]');
            $this->form_validation->set_rules('producto', 'Producto', 'required');
            $this->form_validation->set_rules('marca', 'Marca', 'required');
            $this->form_validation->set_rules('categoria', 'Categoria', 'required');
            $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
            //$this->form_validation->set_rules('inputimage', 'Imagen', 'required');
            if (empty($_FILES['inputImage']['name'])) {
                $this->form_validation->set_rules('inputimage', 'Imagen', 'required');
            }
            $archivo = "./recursos/images/product/" . $this->input->post('codigoBarra') . ".jpg";
            if (file_exists($archivo)) {
                unlink("./recursos/images/product/" . $this->input->post('codigoBarra') . ".jpg");
            }
            if ($this->form_validation->run() == TRUE) {

                $config['maxsize'] = 2000;
                $config['quality'] = '100%';
                $config['upload_path'] = "./recursos/images/product/";
                $config['allowed_types'] = "jpg";
                $config['file_name'] = $this->input->post('codigoBarra');
                $this->load->library("upload", $config);

                if ($this->upload->do_upload("inputImage")) {
                    // $this->reducirImagen($this->input->post('codigoBarra'));
                    $this->ReemplazarMiniatura($this->input->post('codigoBarra'));
                    $data = array("upload_data" => $this->upload->data());
                    $dato[1] = $this->input->post('codigoBarra');
                    $dato[2] = $this->input->post('producto');
                    $dato[3] = $this->input->post('marca');
                    $dato[4] = $this->input->post('categoria');
                    $dato[5] = $this->input->post('descripcion');
                    $dato[6] = $data['upload_data']['file_name'];
                    $dato[7] = $_SESSION['user'];
                    if ($this->almacen->UpdateProducto($dato) == TRUE) {
                        echo "exito";
                    } else {
                        echo "error";
                    }
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $data['codigoBarra'] = form_error('codigoBarra');
                $data['producto'] = form_error('producto');
                $data['marca'] = form_error('marca');
                $data['categoria'] = form_error('categoria');
                $data['descripcion'] = form_error('descripcion');
                $data['inputimage'] = form_error('inputimage');
                echo json_encode($data);
            }
        } else {
            show_404();
        }
    }

    private function ReemplazarMiniatura($codigoBarras) {
        if (file_exists("./recursos/images/product/thumb/" . $codigoBarras . ".jpg")) {
            unlink("./recursos/images/product/thumb/" . $codigoBarras . ".jpg");
        }

        $config3['source_image'] = "./recursos/images/product/$codigoBarras.jpg";
        $config3['width'] = 100;
        $config3['height'] = 150;
        $config3['maintain_ratio'] = TRUE;
        $config3['new_image'] = "./recursos/images/product/thumb/$codigoBarras.jpg";
        $this->load->library('image_lib', $config3);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
    }

    public function guardarProductos() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_error_delimiters('<spam>', '</spam>');
            $this->form_validation->set_rules('codigoBarra', 'Codigo de Barras', 'required|min_length[13]');
            $this->form_validation->set_rules('producto', 'Producto', 'required');
            $this->form_validation->set_rules('marca', 'Marca', 'required');
            $this->form_validation->set_rules('categoria', 'Categoria', 'required');
            $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
            //$this->form_validation->set_rules('inputimage', 'Imagen', 'required');
            if (empty($_FILES['inputImage']['name'])) {
                $this->form_validation->set_rules('inputImage', 'Imagen', 'required');
            }
            $this->form_validation->set_message('codigoBarra', 'el campo codigo de barras es requerido');
            if ($this->form_validation->run() == TRUE) {
                $config['maxsize'] = 2000;
                $config['quality'] = '100%';
                $config['upload_path'] = "./recursos/images/product/";
                $config['allowed_types'] = "jpg";
                $config['file_name'] = $this->input->post('codigoBarra');
                $this->load->library("upload", $config);

                if ($this->upload->do_upload("inputImage")) {
                    // $this->reducirImagen($this->input->post('codigoBarra'));
                    $this->CrearMiniatura($this->input->post('codigoBarra'));
                    $data = array("upload_data" => $this->upload->data());
                    $dato[1] = $this->input->post('codigoBarra');
                    $dato[2] = $this->input->post('producto');
                    $dato[3] = $this->input->post('marca');
                    $dato[4] = $this->input->post('categoria');
                    $dato[5] = $this->input->post('descripcion');
                    $dato[6] = $data['upload_data']['file_name'];
                    $dato[7] = $_SESSION['user'];
                    if ($this->almacen->guardarProducto($dato) == TRUE) {
                        echo "exito";
                    } else {
                        echo "error";
                    }
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $data['codigoBarra'] = form_error('codigoBarra');
                $data['producto'] = form_error('producto');
                $data['marca'] = form_error('marca');
                $data['categoria'] = form_error('categoria');
                $data['descripcion'] = form_error('descripcion');
                $data['inputImage'] = form_error('inputImage');
                echo json_encode($data);
            }
        } else {
            show_404();
        }
    }

    private function reducirImagen($codigoBarras) {
        $config2['source_image'] = "./recursos/images/product/$codigoBarras.jpg";
        $config2['width'] = 800;
        $config2['height'] = 600;
        $this->load->library('image_lib', $config2);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
    }

    private function CrearMiniatura($codigoBarras) {
        $config3['source_image'] = "./recursos/images/product/$codigoBarras.jpg";
        $config3['width'] = 100;
        $config3['height'] = 150;
        $config3['maintain_ratio'] = TRUE;
        $config3['new_image'] = "./recursos/images/product/thumb/$codigoBarras.jpg";
        $this->load->library('image_lib', $config3);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
    }

    public function productos() {
        //echo $this->GUID();
        $data['titulo'] = 'Panel de Atención';
        $data['iCheck'] = TRUE;
        $data['fileInput'] = TRUE;
        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda', $data);

        $this->load->view('internas/almacen/producto');


        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/footer', $data);
    }

    public function tablaProductos() {
        $datos['Productos'] = $this->General_Model->ListarProductos_model();
        $this->load->view('internas/almacen/tablaProductos', $datos);
    }

    public function marcas() {
        $data['titulo'] = 'Historial de COmpras';
        $data['iCheck'] = TRUE;
        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda', $data);

        $this->load->view('internas/almacen/marcas');
        $this->load->view('plantilla/piedePagina');
        $this->load->view('plantilla/footer', $data);
    }

    public function Marca_action() {
        $this->load->model("JsonMarcas_model");
        if ($_POST["action"] == "Agregar") {
            $marcas = htmlspecialchars(strtoupper($this->input->post('txtMarca')), ENT_QUOTES, 'UTF-8');
            $id_marca = $this->GUID();
            echo $this->JsonMarcas_model->guardarMarca_model($marcas, $id_marca);
        }
        if ($_POST["action"] == "Edit") {
            $id_marca = $this->input->post('id_marca');
            $marcas = htmlspecialchars(strtoupper($this->input->post('txtMarca')), ENT_QUOTES, 'UTF-8');
            echo $this->JsonMarcas_model->UpdateMarca($marcas, $id_marca);
        }
    }

    public function MuestraMarca() {
        $output = array();
        $this->load->model("JsonMarcas_model");
        $data = $this->JsonMarcas_model->MostrarMarcasUpdate($_POST["id_marca"]);
        $output['ID_MARCA'] = $data->ID_MARCA;
        $output['NOMBRE_MARCA'] = htmlspecialchars_decode($data->NOMBRE_MARCA, ENT_QUOTES);
        echo json_encode($output);
    }

    public function MuestraProducto() {
        $output = array();
        $this->load->model("JsonProductos_model");
        $data = $this->JsonProductos_model->MostrarProductosUpdate($_POST["id_Producto"]);
        $output['ID_PRODUCTO'] = $data->ID_PRODUCTO;
        $nombreProducto = htmlspecialchars_decode($data->NOMBRE_PRODUCTO, ENT_QUOTES);
        $output['NOMBRE_PRODUCTO'] = $nombreProducto;
        $output['CODIGO_BARRAS'] = $data->CODIGO_BARRAS;
        $output['DESCRIPCION_PRODUCTO'] = htmlspecialchars_decode($data->DESCRIPCION_PRODUCTO, ENT_QUOTES);
        $output['NOMBRE_MARCA'] = $data->NOMBRE_MARCA;
        $output['NOMBRE_CATEGORIA_PRODUCTO'] = $data->NOMBRE_CATEGORIA_PRODUCTO;
        $direcctorioFoto = base_url() . "recursos/images/product/";
        $direcctorioMiniatura = base_url() . "recursos/images/product/thumb/";
        $output['IMG_PRODUCTO'] = "<a href='$direcctorioFoto/$data->IMG_PRODUCTO' data-lightbox='$nombreProducto' data-title='$nombreProducto'><div id='picture'><img src='$direcctorioMiniatura/$data->IMG_PRODUCTO'  class='img-rounded' width='90'></div></a>";
        echo json_encode($output);
    }

    public function jsonMarcas() {
        $this->load->model("JsonMarcas_model");
        $fetch_data = $this->JsonMarcas_model->MostrarMarcasTabla();
        $data = array();
        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = htmlspecialchars_decode($row->NOMBRE_MARCA, ENT_QUOTES);
            $sub_array[] = $row->USER;
            $sub_array[] = $row->FECHA;
            $sub_array[] = '<button type="button" name="update" id="' . $row->ID_MARCA . '" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i> Editar</button>';
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->JsonMarcas_model->get_all_data(),
            "recordsFiltered" => $this->JsonMarcas_model->get_filtered_data(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function jsonProductos() {
        $this->load->model("JsonProductos_model");
        $fetch_data = $this->JsonProductos_model->MostrarProductosTabla();
        $data = array();
        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $row->CODIGO_BARRAS;
            $nombreProducto = htmlspecialchars_decode($row->NOMBRE_PRODUCTO, ENT_QUOTES);
            $sub_array[] = $nombreProducto;
            $direcctorioFoto = base_url() . "recursos/images/product/";
            $direcctorioMiniatura = base_url() . "recursos/images/product/thumb/";
            $sub_array[] = "<a href='$direcctorioFoto/$row->IMG_PRODUCTO' data-lightbox='$nombreProducto' data-title='$nombreProducto'><div id='picture'><img src='$direcctorioMiniatura/$row->IMG_PRODUCTO'  class='img-rounded' width='90'></div></a>";
            $sub_array[] = htmlspecialchars_decode($row->DESCRIPCION_PRODUCTO, ENT_QUOTES);
            $sub_array[] = htmlspecialchars_decode($row->NOMBRE_MARCA, ENT_QUOTES);
            $sub_array[] = htmlspecialchars_decode($row->NOMBRE_CATEGORIA_PRODUCTO, ENT_QUOTES);
            $sub_array[] = "<a class='btn btn-success' href='#' data-toggle='modal' data-target='#ModalUsuario' onclick='editar(\"$row->CODIGO_BARRAS\");'><i class='fa fa-edit'></i> Editar</a>";
            //$sub_array[] = '<button type="button" name="update" id="' . $row->ID_PRODUCTO . '" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i> Editar</button>';
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->JsonProductos_model->get_all_data(),
            "recordsFiltered" => $this->JsonProductos_model->get_filtered_data(),
            "data" => $data
        );
        echo json_encode($output);
    }

   
    

    public function newProductos() {
        $data['titulo'] = 'Panel de Atención';
        $data['iCheck'] = TRUE;
        $data['fileInput'] = TRUE;
        $this->load->view('plantilla/header', $data);
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/menuizquierda', $data);
        $this->load->helper('form');
        $datos['marcas'] = $this->almacen->buscaMarcas_model_select();
        $datos['categorias'] = $this->almacen->buscaCategoria_model_select();
        $this->load->view('internas/almacen/nuevo', $datos);
        $this->load->view('internas/almacen/modales');
        $this->load->view('plantilla/piedePagina');
        //$this->load->view('plantilla/menuderecha');
        $this->load->view('plantilla/footer', $data);
    }

    public function editarProducto() {
        $idProducto = $this->input->post('id_Producto');
        $datos['Usuario'] = $this->General_Model->MostrarUsuario($idProducto);
        $datos['Documento'] = $this->General_Model->listarDocumento_model();
        $datos['Rol'] = $this->General_Model->ListarRoles_model();

        $datos['producto'] = $this->almacen->mostrarEditarProducto($idProducto);
        $datos['marcas'] = $this->almacen->buscaMarcas_model_select();
        $datos['categorias'] = $this->almacen->buscaCategoria_model_select();
        $this->load->view('internas/almacen/ModalActualizarProducto', $datos);
    }

    public function buscarMarcas() {
        $keyword = $this->input->post('query');
        $data = $this->almacen->buscaMarcas_model($keyword);
        foreach ($data as $row) {
            $dato[] = $row->NOMBRE_MARCA;
        }
        echo json_encode($dato);
    }

    public function buscarProductos() {
        $keyword = $this->input->post('query');
        $data = $this->almacen->buscaProductos_model($keyword);
        foreach ($data as $row) {
            $dato[] = $row->NOMBRE_CATEGORIA_PRODUCTO;
        }
        echo json_encode($dato);
    }

    public function buscarCodigoBarras() {
        $keyword = $this->input->post('query');
        $data = $this->almacen->buscaCodigoBarras($keyword);
        foreach ($data as $row) {
            $dato[] = $row->CODIGO_BARRAS;
        }
        echo json_encode($dato);
    }

    public function guardarCategoria() {
        $categoria = $this->input->post('txtCategoria');
        $id_categoria = $this->GUID();
        echo $this->almacen->guardarCategoria_model($categoria, $id_categoria);
    }

    protected function GUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

}
