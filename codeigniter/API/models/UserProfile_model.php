<?php

class UserProfile_model extends CI_Model {

    function getUserByID($id) {
        $sql = "SELECT * FROM user WHERE id = ?";
        $q = $this->db->conn_id->prepare($sql);
        // Binding
        $q->bindValue(1, $id, PDO::PARAM_INT);
        $q->execute();
        // Check if user exists
        if ($q->rowCount() > 0) {
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }      
    }

    function getUsers($limit) {
        if ($limit > 0) 
        {   
            $sql = "SELECT * FROM user LIMIT 0,?";
            $q = $this->db->conn_id->prepare($sql);
            // Binding
            $q->bindValue(1, intval($limit), PDO::PARAM_INT);
            $q->execute();
            if ($q->rowCount() > 0) 
            {
                $data = $q->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        else 
        {
            $sql = "SELECT * FROM user";
            $q = $this->db->conn_id->prepare($sql);
            $q->execute();
            if ($q->rowCount() > 0) 
            {
                $data = $q->fetchAll(PDO::FETCH_ASSOC);
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

