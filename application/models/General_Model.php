<?php

class General_Model extends CI_Model {

    public function ListarUsuarios($tipoPersona) {
        $sql = "CALL listarUsuarios('$tipoPersona')";
        $query = $this->db->query($sql);
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
        return $query->result();
    }
}
