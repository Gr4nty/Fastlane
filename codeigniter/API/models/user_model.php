<?php

class user_model extends CI_Model {

    function getUserByID($id) {
        $q = $this->db->query("SELECT * FROM user WHERE id= $id");
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data = get_object_vars($row);
            }
            return $data;
        }
    }
    
    function CreateUser($fbid) {
        $check = $this->db->query("SELECT * FROM user WHERE fbid= $fbid");
        if ($check->num_rows() > 0) {
            $data = '';
            return $data;
        }else
        {  
            $fname = 'testpost';
            $fpass = 'posttest';
        $q = $this->db->query("INSERT INTO user (fbid, username, password) VALUES ('$fbid', '$fname', '$fpass')");
            $data = 'Success';
            return $data;
        }
        
    }

}
