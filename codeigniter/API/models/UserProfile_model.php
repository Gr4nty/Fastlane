<?php

class UserProfile_model extends CI_Model {

    function getUserByID($id) {
        $q = $this->db->query("SELECT * FROM user WHERE id= $id");
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data = get_object_vars($row);
            }
            return $data;
        }
    }

    function getUsers($limit) {
        if ($limit == 0) {
            $q = $this->db->query("SELECT * FROM user");
            if ($q->num_rows() > 0) {
                foreach ($q->result() as $row) {
                    $data [] = get_object_vars($row);
                }
            }
        } else {
            $q = $this->db->query("SELECT * FROM user LIMIT 0,$limit");
            if ($q->num_rows() > 0) {
                foreach ($q->result() as $row) {
                    $data [] = get_object_vars($row);
                }
            }
        }

        return $data;
    }

    function CreateUser($fbid) {
        $check = $this->db->query("SELECT * FROM user WHERE fbid= $fbid");
        if ($check->num_rows() > 0) {
            $data = '';
            return $data;
        } else {
            $fname = 'testpost';
            $fpass = 'posttest';
            $q = $this->db->query("INSERT INTO user (fbid, username, password) VALUES ('$fbid', '$fname', '$fpass')");
            $data = 'Success';
            return $data;
        }
    }

}

