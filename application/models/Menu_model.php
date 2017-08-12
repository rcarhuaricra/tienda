<?php

class Menu_model extends CI_Model {

    public function all() {
        return $this->db->get("menus")
                        ->result_array();
    }

    public function menu() {
        $sql = "SELECT * FROM `menus` WHERE `parent` is null";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function submenu($id) {

        $sql = "SELECT * FROM `menus` M WHERE M.`parent` = '$id' ORDER BY M.`number` ASC";
        $query = $this->db->query($sql);
        return $query;
    }

}
