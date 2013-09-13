<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class team extends REST_Controller {

    function team_get() {
        // Check if it empty or not
        if (!$this->get('id')) 
        { 
            $this->response(NULL, 500);
        }
        // Check if it is numeric or not
        if (is_numeric($this->get('id'))==true)
        {
        // autoload later
            $this->load->model('view_model');
        // user data from db
            $user = $this->team_model->getUserByID($this->get('id'));
        }
        else
        {
            $this->response(NULL, 500);  
        }    
        
        // Check if user exists or not
        if ($user) {
            $this->response($user, 200); // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'User could not be found'), 404);
        }
    }
}