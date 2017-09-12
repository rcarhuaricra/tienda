<?php

class Json_Model extends CI_Model {

    public function ListarProveedoresSelect($tipoPersona,$buscar) {
        $sql = "SELECT 
                P.`ID_PERSONA` AS id,
                P.`NOMBRES` AS text
                FROM `persona` P
                INNER JOIN `tipo_persona` TP ON TP.`ID_TIPO_PERSONA`=P.`ID_TIPO_PERSONA`
                WHERE TP.`TXT_TIPO_USUARIO` = '$tipoPersona' and P.NOMBRES LIKE '%$buscar%'";
        $query = $this->db->query($sql);
        $this->db->close(); 
        return $query->result();
    }
    public function ListarMarcasSelect($buscar) {
            $sql = "SELECT 
                    m.`ID_MARCA` AS id
                    , m.`NOMBRE_MARCA` AS text
                    FROM `marca` m
                    WHERE NOMBRE_MARCA like '%$buscar%'";
        $query = $this->db->query($sql);
        $this->db->close(); 
        return $query->result();
    }

    public function MostrarUsuario($idpersona) {
        $sql = "CALL mostrarUsuario('$idpersona')";
        $query = $this->db->query($sql);
        $this->db->close(); 
        return $query->row();        
    }
    
    public function listarDocumento_model(){
        $sql = "CALL listarDocumento()";
        $query = $this->db->query($sql);
        $this->db->close(); 
        return $query->result();
    }
    public function ListarRoles_model(){
        $sql = "CALL ListarRoles()";
        $query = $this->db->query($sql);
        $this->db->close(); 
        return $query->result();
    }
    public function ListarMarcas_model(){
        $sql = "CALL listarMarcas()";
        $query = $this->db->query($sql);
        $this->db->close(); 
        return $query->result();
    }
    
    public function ListarProductos_model(){
        $sql = "CALL ListarProductos()";
        $query = $this->db->query($sql);
        $this->db->close(); 
        return $query->result();
    }
    
}
