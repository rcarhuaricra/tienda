<?php

class JsonProductos_model extends CI_Model {

    var $order_column = array(null, "NOMBRE_PRODUCTO", null, "DESCRIPCION_PRODUCTO", "NOMBRE_MARCA", "IMG_PRODUCTO", "USER", "FECHA");

    function make_query() {

        $sql = 'SELECT 
            P.`ID_PRODUCTO` AS ID_PRODUCTO,
	P.`CODIGO_BARRAS` as CODIGO_BARRAS,
	P.`NOMBRE_PRODUCTO` AS NOMBRE_PRODUCTO,
	P.`DESCRIPCION_PRODUCTO` AS DESCRIPCION_PRODUCTO,
	M.`NOMBRE_MARCA` AS NOMBRE_MARCA,
	P.`IMG_PRODUCTO` AS IMG_PRODUCTO,
	CP.`NOMBRE_CATEGORIA_PRODUCTO` AS NOMBRE_CATEGORIA_PRODUCTO,
	IFNULL(P.`USERMOD`,P.`USERREG`) AS USER,
        IFNULL(P.`FECMOD`,P.`FECREG`) AS FECHA
	FROM `producto` P
	INNER JOIN `marca` M ON P.`ID_MARCA`=M.`ID_MARCA`
	INNER JOIN `categoria_producto` CP ON P.`ID_CATEGORIA_PRODUCTO`=CP.`ID_CATEGORIA_PRODUCTO` ';
        if (isset($_POST["search"]["value"])) {
            $busqueda = $_POST["search"]["value"];
            $sql.="WHERE NOMBRE_PRODUCTO LIKE '%$busqueda%' ";
            $sql.="or DESCRIPCION_PRODUCTO LIKE '%$busqueda%' ";
        }
        if (isset($_POST["order"])) {
            $columna = $this->order_column[$_POST['order']['0']['column']];
            $direccion = $_POST['order']['0']['dir'];
            $sql.="ORDER BY $columna $direccion ";
        } else {
            $sql.="ORDER BY ID_PRODUCTO ";
        }
        return $sql;
    }

    function MostrarProductosTabla() {
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
        $sql = 'select * from producto';
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function MostrarProductosUpdate($IdProducto) {
        $sql = "select * from producto P
                INNER JOIN `marca` M ON P.`ID_MARCA`=M.`ID_MARCA`
                INNER JOIN `categoria_producto` CP ON P.`ID_CATEGORIA_PRODUCTO`=CP.`ID_CATEGORIA_PRODUCTO`
                where P.ID_PRODUCTO='$IdProducto'";
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
