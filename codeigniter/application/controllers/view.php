<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class view extends REST_Controller {

    function user_get() {
        if (!$this->get('id')) {
            $this->response(NULL, 500);
        }
        if (is_numeric($this->get('id'))==true)
        {
        // autoload later
        $this->load->model('view_model');
        // user data from db
        $user = $this->view_model->getUserByID($this->get('id'));
        }else
        {
          $this->response(NULL, 500);  
        }    
        
        
        if ($user) {
            $this->response($user, 200); // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'User could not be found'), 404);
        }
    }

    function user_post() {
        //$this->some_model->updateUser( $this->get('id') );
//        $message = array('id' => $this->get('id'), 'name' => $this->post('name'), 'email' => $this->post('email'), 'message' => 'ADDED!');

        $this->response($message, 200); // 200 being the HTTP response code
    }

    function user_delete() {
        //$this->some_model->deletesomething( $this->get('id') );
//        $message = array('id' => $this->get('id'), 'message' => 'DELETED!');

        $this->response($message, 200); // 200 being the HTTP response code
    }

    function users_get() {
//
//        $users = $this->view_model->getUsers($this->get('limit'));
//
//        if ($users) {
//            $this->response($users, 200); // 200 being the HTTP response code
//        } else {
//            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
//        }
    }

    public function send_post() {
//        var_dump($this->request->body);
    }

    public function send_put() {
//        var_dump($this->put('foo'));
    }

    function car_get() {
        
    }

}