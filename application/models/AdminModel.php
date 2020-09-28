<?php

class AdminModel extends CI_Model
{

    public $response = array();
    public $tbl_admin        = "bankfx_admin";
    public $tbl_users        = "users";


    public function __construct()
    {
        parent::__construct();
      
    }

// login
    public function login($data)
    {
        $exist = $this->db->select('*')->where('email',$data['email'])
                ->where('password',$data['password'])->from($this->tbl_admin)->get();
        if ($exist->num_rows()) {
            $responseData = $exist->result();
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('admin_login_success');
            $response[$this->config->item('baseUrl')] = base_url();
            $response[$this->config->item('data')] = $responseData[0];
            return $response;
        }
        return $this->send_error_response($this->config->item('admin_login_failure'));
    }
// profile
    public function get_admin_detail($admin_id)
    {
        $exist = $this->db->select('*')->where('id',$admin_id)
              ->from($this->tbl_admin)->get();
        if ($exist->num_rows()) {
            $responseData = $exist->result();
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('admin_data_found_success');
            $response[$this->config->item('baseUrl')] = base_url();
            $response[$this->config->item('data')] = $responseData[0];
            return $response;
        }
        return $this->send_error_response($this->config->item('admin_data_found_failure'));
    }

    // update profile
    public function update_profile($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_admin,$data);
        $affected_rows = $this->db->affected_rows();
        if ($affected_rows) {   
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('profile_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('profile_update_failure'));
    }

    // profile
    public function verify_password($admin_id,$current_password)
    {
        $exist = $this->db->select('*')->where('id',$admin_id)->where("password",$current_password)
              ->from($this->tbl_admin)->get();
        if ($exist->num_rows()) {
            $responseData = $exist->result();
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('password_verify_success');
            $response[$this->config->item('baseUrl')] = base_url();
            $response[$this->config->item('data')] = $responseData[0];
            return $response;
        }
        return $this->send_error_response($this->config->item('password_verify_failure'));
    }
 
    //reset password
    public function reset_password($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_admin,$data);
        $affected_rows = $this->db->affected_rows();
        if ($affected_rows) {   
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('password_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('password_update_failure'));
    }

    // profile
    public function get_user_list()
    {
           $exist = $this->db->select('*')->from($this->tbl_users)->get();
           if ($exist->num_rows()) {
               $responseData = $exist->result();
               $response[$this->config->item('status')] = true;
               $response[$this->config->item('message')] = $this->config->item('data_found_success');
               $response[$this->config->item('baseUrl')] = base_url();
               $response[$this->config->item('data')] = $responseData;
               return $response;
           }
           return $this->send_error_response($this->config->item('data_found_failure'));
    }

  


    public function send_error_response($Message="")
    {
        $response[$this->config->item('status')] = false;
        $response[$this->config->item('message')] = $Message;
        return $response;
    }

}
