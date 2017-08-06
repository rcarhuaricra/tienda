<?php

class logingmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
    }

    public function verificarEmailModel($email) {
        $sql = "SELECT * FROM `persona` P WHERE P.EMAIL='$email'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function verificarPasswordModel($email, $password) {
        $sql = "SELECT * FROM `persona` P WHERE P.`EMAIL`='$email' AND P.`PASSWORD`='$password'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function llamarDatos($email, $password) {
        $sql = "SELECT * FROM `persona` P 
INNER JOIN `tipo_documento` TD ON P.`ID_TIPO_DOCUMENTO`=TD.`ID_TIPO_DOCUMENTO`
INNER JOIN `tipo_persona` TP ON P.`ID_TIPO_PERSONA`=TP.`ID_TIPO_PERSONA`
WHERE P.EMAIL='$email' AND P.`PASSWORD`='$password' LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row();
    }

}
