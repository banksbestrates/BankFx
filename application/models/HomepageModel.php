<?php

class HomepageModel extends CI_Model
{

    public $response = array();
    
    public $tbl_homepage      = "homepage";


    public function __construct()
    {
        parent::__construct();
      
    }

    //homepagedata get
    public function get_homepage_slider()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_homepage");
        $exist = $this->db->get();
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

    //update homepage data
    public function update_homepage_data($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_homepage,$data);
        $update = $this->db->affected_rows();
        if($update)
        {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }
   

//error message
    public function send_error_response($Message="")
    {
        $response[$this->config->item('status')] = false;
        $response[$this->config->item('message')] = $Message;
        return $response;
    }

}
