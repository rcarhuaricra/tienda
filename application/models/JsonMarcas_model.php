<?php

class JsonMarcas_model extends CI_Model {

    var $order_column = array("NOMBRE_MARCA", "USER", "FECHA", null, null);

    function make_query() {

        $sql = 'SELECT M.`ID_MARCA`, M.`NOMBRE_MARCA`, IFNULL(`USERMOD`,`USERREG`) AS USER,IFNULL(`FECMOD`,`FECREG`) AS FECHA FROM marca M ';
        if (isset($_POST["search"]["value"])) {
            $busqueda = $_POST["search"]["value"];
            $sql.="WHERE M.`NOMBRE_MARCA` LIKE '%$busqueda%' ";
        }
        if (isset($_POST["order"])) {
            $columna = $this->order_column[$_POST['order']['0']['column']];
            $direccion = $_POST['order']['0']['dir'];
            $sql.="ORDER BY $columna $direccion ";
        } else {
            $sql.="ORDER BY M.NOMBRE_MARCA ASC";
        }
        return $sql;
    }

    function MostrarMarcasTabla() {
        $sql = $this->make_query();
        if ($_POST["length"] != -1) {
            $longitud = $_POST['length'];
            $inicio = $_POST['start'];
            $sql.=" LIMIT $longitud OFFSET $inicio";
        }
        //echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_filtered_data() {
        $sql = $this->make_query();
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function get_all_data() {
        $sql = 'select * from marca';
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function MostrarMarcasUpdate($IdMarca) {
        $sql = "select * from marca where ID_MARCA='$IdMarca'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    function UpdateMarca($marcas, $id_marca) {
        $user = $_SESSION['user'];
        $sql = "select * from `marca` M where M.`NOMBRE_MARCA` = '$marcas'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return "existe";
        } else {
            $sql = "UPDATE `marca`
                SET `NOMBRE_MARCA` = '$marcas', `USERMOD`= '$user', `FECMOD`=NOW()	
                WHERE `ID_MARCA` = '$id_marca'";
        return $this->db->query($sql);
        }
        
    }

    function guardarMarca_model($marcas, $id_marca) {
        $user = $_SESSION['user'];
        $sql = "select * from `marca` M where M.`NOMBRE_MARCA` = '$marcas'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return "existe";
        } else {
            $sql = "INSERT INTO `marca`
                   (`ID_MARCA`, `NOMBRE_MARCA`, `USERREG`, FECREG)
            VALUES ('$id_marca', '$marcas', '$user', NOW())";
            return $this->db->query($sql);
        }
    }

}
