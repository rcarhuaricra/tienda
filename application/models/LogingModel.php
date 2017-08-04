<?php

class logingmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
    }

    public function verificarEmailModel($email) {
        $sql = "SELECT * FROM `usuario` U WHERE U.`EMAIL`='$email'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function verificarPasswordModel($email, $password) {
        $sql = "SELECT * FROM `usuario` U WHERE U.`EMAIL`='$email' AND U.`PASSWORD`='$password'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function llamarDatos($email, $password) {
        $sql = "  SELECT * FROM `usuario` U 
  INNER JOIN `tipo_documento` TD ON U.`ID_TIPO_DOCUMENTO`=TD.`ID_TIPO_DOCUMENTO`
  INNER JOIN `roles` R ON U.`ID_ROL`=R.`ID_ROL`
  WHERE U.`EMAIL`='$email' AND U.`PASSWORD`='$password'";
        $query = $this->db->query($sql);
        return $query->row();
    }

}
