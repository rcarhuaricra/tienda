<?php

class Almacen_model extends CI_Model {

    public function buscaMarcas_model($keyword) {
        $sql = "select * from `marca` M where M.`NOMBRE_MARCA` LIKE '$keyword%'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function buscaMarcas_model_select() {
        $sql = "select * from `marca` M";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function guardarMarca_model($marcas) {
        $sql = "select * from `marca` M where M.`NOMBRE_MARCA` = '$marcas'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $data = array(
            'NOMBRE_MARCA' => $marcas
        );
            return $this->db->insert('marca', $data);
        }
    }

}
