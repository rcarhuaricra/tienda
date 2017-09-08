<?php

class Almacen_model extends CI_Model {

    public function guardarProducto($dato) {
        $sql = "CALL `insertProducto`('$dato[1]','$dato[2]','$dato[3]','$dato[4]','$dato[5]','$dato[6]','$dato[7]')";
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function UpdateProducto($dato) {
        $sql = "CALL `updateProducto`('$dato[1]','$dato[2]','$dato[3]','$dato[4]','$dato[5]','$dato[6]','$dato[7]')";
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function mostrarEditarProducto($idProducto) {
        $sql = "CALL MostrarProducto('$idProducto')";
        $query = $this->db->query($sql);
        $this->db->close();
        return $query->row();
    }

    public function buscaMarcas_model($keyword) {
        $sql = "select * from `marca` M where M.`NOMBRE_MARCA` LIKE '$keyword%'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function buscaProductos_model($keyword) {
        $sql = "select * from `categoria_producto` CP where CP.`NOMBRE_CATEGORIA_PRODUCTO` LIKE '$keyword%'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function buscaCodigoBarras($keyword) {
        $sql = "SELECT * FROM `producto` WHERE CODIGO_BARRAS LIKE '$keyword%'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function buscaMarcas_model_select() {
        $sql = "select * from `marca` M";
        $query = $this->db->query($sql);
        $this->db->close();
        return $query->result();
    }

    public function buscaCategoria_model_select() {
        $sql = "CALL ListarCategoria()";
        $query = $this->db->query($sql);
        $this->db->close();
        return $query->result();
    }

    public function guardarMarca_model($marcas, $id_marca) {
        $sql = "select * from `marca` M where M.`NOMBRE_MARCA` = '$marcas'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $data = array(
                'ID_MARCA' => $id_marca,
                'NOMBRE_MARCA' => $marcas
            );
            return $this->db->insert('marca', $data);
        }
    }

    public function guardarCategoria_model($categoria, $id_categoria) {
        $sql = "select * from `categoria_producto` CP where CP.`NOMBRE_CATEGORIA_PRODUCTO` = '$categoria'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $data = array(
                'ID_CATEGORIA_PRODUCTO' => $id_categoria,
                'NOMBRE_CATEGORIA_PRODUCTO' => $categoria
            );
            return $this->db->insert('categoria_producto', $data);
        }
    }

}
