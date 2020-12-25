<?php

defined('BASEPATH') or exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

require APPPATH . '/libraries/REST_Controller.php';

class Admin extends \Restserver\Libraries\REST_Controller
{
    public $curr_date 			= "";
	public $unix_timestamp 		= "";
	public $timeStamp 			= "";
	public $responseData 		= array();
	
    public function __construct()
    {
        parent::__construct();
		$this->load->model('AdminModel');	
    }

    // Authentication
	public function login_post()
	{
        $_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('email','email', 'trim|required|max_length[100]');					
		$this->form_validation->set_rules('password','passowrd', 'trim|required|max_length[100]');					
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}
        $email	    =   trim($this->input->post('email',true));
        $password	=	trim(md5($this->input->post('password',true)));

        $data = array(
            "email"=>$email,
            "password"=>$password,
        );
		$query = $this->AdminModel->login($data);
        if ($query['Status']) {
            $this->setSession($query['data']);
            return $this->set_response($query, REST_Controller::HTTP_OK);
        }
        return $this->send_error_response($query['Message']);  
		
    }

    public function setSession($data)
    {
        $sessionData = array(
            "bankfx_admin_login"=>true,
            "admin_id"=>$data->id,
            "admin_name"=>$data->name,
            "admin_email"=>$data->email,
        );

        $this->session->set_userdata($sessionData);
        return $sessionData;
    }

    public function logout_get()
    {
        $this->session->unset_userdata('bankfx_admin_login');
        redirect('admin/login', 'refresh');
    }

    // profile
    public function get_admin_detail_post()
	{

        $_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('admin_id','admin_id', 'trim|required|max_length[100]');									
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}
        $admin_id	    =	trim($this->input->post('admin_id',true));
     
        $query = $this->AdminModel->get_admin_detail($admin_id);
        if ($query['Status']) {
            return $this->set_response($query, REST_Controller::HTTP_OK);
        }
        return $this->send_error_response($query['Message']);  
		
    }

    // update profile
    public function update_profile_post()
	{

        $_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('admin_id','admin_id', 'trim|required|max_length[100]');									
		$this->form_validation->set_rules('email','email', 'trim|required|max_length[100]');									
		$this->form_validation->set_rules('name','name', 'trim|required|max_length[100]');									
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}
        $admin_id	=	trim($this->input->post('admin_id',true));
        $email	    =	trim($this->input->post('email',true));
        $name	    =	trim($this->input->post('name',true));

        $data = array(
            "id"          => $admin_id,
            "email"       => $email,
            "name"        => $name,
            "updated_on"  => $this->curr_date
        );
     
        $query = $this->AdminModel->update_profile($data);
        if ($query['Status']) {
            return $this->set_response($query, REST_Controller::HTTP_OK);
        }
        return $this->send_error_response($query['Message']);  
		
    }
    
    // reset password
    public function reset_password_post()
	{
        $_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('admin_id','admin_id', 'trim|required|max_length[100]');									
		$this->form_validation->set_rules('current_password','current_password', 'trim|required|max_length[100]');									
		$this->form_validation->set_rules('new_password','new_password', 'trim|required|max_length[100]');									
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}
        $admin_id	        =	trim($this->input->post('admin_id',true));
        $current_password   =	trim($this->input->post('current_password',true));
        $new_password       =	trim($this->input->post('new_password',true));

        $data = array(
            "id"               => $admin_id,
            "password"         => md5($new_password),
            "updated_on"       => $this->curr_date
        );

        $current_password = md5($current_password);

        //check current password 
        $password_verify = $this->AdminModel->verify_password($admin_id,$current_password);
        if(!$password_verify['Status'])
        {
            return $this->send_error_response($password_verify['Message']);  
        }
        //update password
        $query = $this->AdminModel->reset_password($data);
        if ($query['Status']) {
            return $this->set_response($query, REST_Controller::HTTP_OK);
        }
        return $this->send_error_response($query['Message']);  
		
    }

    //get registed user list 
    public function get_user_list_post()
    {
        $query = $this->AdminModel->get_user_list();
        if ($query['Status']) {
            return $this->set_response($query, REST_Controller::HTTP_OK);
        }
        return $this->send_error_response($query['Message']); 
    }
    
    //Error message
    public function send_error_response($Message)
    {
        $response[$this->config->item('status')] = false;
        $response[$this->config->item('message')] = $Message;
        return $this->set_response($response, REST_Controller::HTTP_OK);
    }
  
}