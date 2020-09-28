<?php

class RegisterModel extends CI_Model
{

    public $response = array(); 
    public $tbl_users      = "users";
    public function __construct()
    {
        parent::__construct();
    }

    //register user
    public function register_user($data)
    {
        $input = $this->db->insert("$this->tbl_users", $data);
        if ($input) {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('register_succes');
            return $response;
        }
        return $this->send_error_response($this->config->item('register_failure'));
    }

    //email exits
    public function email_exist($email)
    {
        $exist = $this->db->select("*")->from("$this->tbl_users")->where("user_email",$email)->get();
        if ($exist->num_rows()) {
            $responseData = $exist->result();
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('email_already_exist');
            $response[$this->config->item('baseUrl')] = base_url();
            $response[$this->config->item('data')] = $responseData[0];
            return $response;
        }
        return $this->send_error_response($this->config->item('email_doesnt_exist'));
    }

 
   
    //error message
    public function send_error_response($Message="")
    {
        $response[$this->config->item('status')] = false;
        $response[$this->config->item('message')] = $Message;
        return $response;
    }

}
