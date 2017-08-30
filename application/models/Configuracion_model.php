<?php

class Configuracion_model extends CI_Model {

    public function ListarLocales() {
        $sql = "CALL mostrarLocales";
        $query = $this->db->query($sql);
        
        return $query;
    }

    public function updateLocalTienda_modal($dato) {
        $sql = "CALL updateInfoLocales('$dato[1]','$dato[2]','$dato[3]','$dato[4]','$dato[5]','$dato[6]','$dato[7]','$dato[8]')";
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function updateTrabajador_modal($dato) {
        $sql = "CALL updateTrabajadores('$dato[1]','$dato[2]','$dato[3]','$dato[4]','$dato[5]','$dato[6]','$dato[7]','$dato[8]','$dato[9]','$dato[10]','$dato[11]','$dato[12]','$dato[13]')";
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function updatePassword($dato){
        $sql = "CALL updatePasswordTrabajadores('$dato[1]','$dato[2]','$dato[3]')";
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function insertNewUser($dato) {
        $sql = "CALL insertPersona('$dato[1]','$dato[2]','$dato[3]','$dato[4]',$dato[5],'$dato[6]','$dato[7]','$dato[8]','$dato[9]','$dato[10]','$dato[11]','$dato[12]','$dato[13]')";
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
