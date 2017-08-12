<?php

class Dashboard_model extends CI_Model {

    public function cantidadPersona($tipoPersona) {
        $sql = "SELECT COUNT(*) as cantidad FROM `persona` P
                INNER JOIN `tipo_persona` TP ON P.`ID_TIPO_PERSONA`=TP.`ID_TIPO_PERSONA`
                WHERE TP.`TXT_TIPO_PERSONA`='$tipoPersona'";
        $query = $this->db->query($sql);
        $row = $query->row();
        return $row->cantidad;
    }

}
