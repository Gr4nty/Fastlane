<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class view extends REST_Controller {

    function user_get() {
        if (!$this->get('id')) 
        {
            $this->response(NULL, 500);
        }
        // autoload later
        $this->load->model('view_model');
        // user data from db
        $user = $this->view_model->getUserByID($this->get('id'));

        if ($user) 
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }
  
        else 
        {
            $this->response(array('error' => 'User could not be found'), 404);
        }
    }

    function user_post() {
        //$this->some_model->updateUser( $this->get('id') );
        $message = array('id' => $this->get('id'), 'name' => $this->post('name'), 'email' => $this->post('email'), 'message' => 'ADDED!');

        $this->response($message, 200); // 200 being the HTTP response code
    }

    function user_delete() {
        //$this->some_model->deletesomething( $this->get('id') );
        $message = array('id' => $this->get('id'), 'message' => 'DELETED!');

        $this->response($message, 200); // 200 being the HTTP response code
    }

    function users_get() {
        //$users = $this->some_model->getSomething( $this->get('limit') );
        $users = array(
            array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com'),
            array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com'),
            3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => array('hobbies' => array('fartings', 'bikes'))),
        );

        if ($users) {
            $this->response($users, 200); // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
    }

    public function send_post() {
        var_dump($this->request->body);
    }

    public function send_put() {
        var_dump($this->put('foo'));
    }

    function car_get() {
        if (!$this->get('id')) {
            $this->response(NULL, 400);
        }

        // $user = $this->some_model->getSomething( $this->get('id') );
        $users = array(
            1 => array('id' => 1, 'name' => 'Ferrari', 'hp' => '500', 'weight' => '2000 lbs'),
            2 => array('id' => 2, 'name' => 'Porshe', 'hp' => '345', 'weight' => '1789 lbs'),
            3 => array('id' => 3, 'name' => 'Trabant', 'hp' => '40', 'weight' => '450 lbs'),
        );

        $user = @$users[$this->get('id')];

        if ($user) {
            $this->response($user, 200); // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'User could not be found'), 404);
        }
    }

}