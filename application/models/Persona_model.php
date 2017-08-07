<?php

class Persona_model extends CI_Model {

    public function tipodocumento() {
        $sql = "SELECT * FROM `tipo_documento`";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function personas($tipopersona) {
        $sql = "SELECT * FROM `persona` P
                INNER JOIN `tipo_documento` TD ON TD.`ID_TIPO_DOCUMENTO`=P.`ID_TIPO_DOCUMENTO`
                WHERE `ID_TIPO_PERSONA`='$tipopersona'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function validarDocumentomodel($documento,$tipopersona) {
        $sql = "SELECT * FROM `persona` P WHERE `NUMERO_DOCUMENTO`='$documento' and ID_TIPO_PERSONA=$tipopersona";
        $query = $this->db->query($sql);
        $row = $query->row();
        if (isset($row)) {
            echo TRUE;
        } else {
            echo FALSE;
        }
    }

    public function submenu($id) {

        $sql = "SELECT * FROM `menus` WHERE `parent` = '$id'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function GuardaClienteModel($insertCliente) {
        $this->db->insert('persona', $insertCliente);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
