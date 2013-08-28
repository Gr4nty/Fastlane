<?php

class profile_model extends CI_Model {

    function getUserByID($id) {
        $q = $this->db->query("SELECT * FROM user WHERE id= $id");
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data = get_object_vars($row);
            }
            return $data;
        }
    }

}
