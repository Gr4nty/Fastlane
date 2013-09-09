<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class user extends REST_Controller
{
	function user_get()
    {
        if(!$this->get('id') || is_numeric($this->get('id'))==false)
        {
        	$this->response(array('error' => 'Bad Request'), 400);
        }
        
        $user = $this->user_model->getUserById( $this->get('id') );
    	
        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'User not found'), 404);
        }
    }
    
    function user_post()
    {
        $this->user_model->updateUser( $this->get('id') );
        
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
}