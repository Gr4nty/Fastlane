<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class UserProfile extends REST_Controller {

    // Get user data
    function user_get() {
        if (!$this->get('id') || is_numeric($this->get('id')) == false) {
            $this->response(array('error' => 'Bad Request'), 400);
        } else {
            $user = $this->UserProfile_model->getUserById($this->get('id'));
        }

        if ($user) {
            $this->response($user, 200); // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'User not found'), 404);
        }
    }

    // Get users
    function users_get() {
        if ($this->get('limit') && is_numeric($this->get('limit')) == true) {
            $users = $this->UserProfile_model->getUsers($this->get('limit'));
        } else if (!$this->get('limit')) {
            $users = $this->UserProfile_model->getUsers('0');
        } else {
            $this->response(array('error' => 'Bad Request'), 400);
        }

        if ($users) {
            $this->response($users, 200); // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'User not found'), 404);
        }
    }

}

