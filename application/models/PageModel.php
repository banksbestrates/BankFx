<?php

class PageModel extends CI_Model
{

    public $response = array();
    public $tbl_pages         = "bankfx_pages";
    public $tbl_contact_us    = "bankfx_contact_us";
 
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/New_York');
        $date = new DateTime();
        $this->timeStamp = $date->getTimestamp();
        $this->unix_timestamp = date('U');
        $this->curr_date = date('Y-m-d H:i:s');
    }

    // get page data
    public function get_page_data($page_type)
    {
        if($page_type=="about_us")
        {
            $this->db->select('id,about_us as page_data,about_image as image');
        }else if($page_type=="terms_conditions")
        {
            $this->db->select('id,terms_conditions as page_data , term_image as image');
        }else if($page_type=="privacy_policy")
        {
            $this->db->select('id,privacy_policy as page_data, privacy_image as image');
        }
        
        $this->db->from("$this->tbl_pages");
        $exist = $this->db->get();
        if ($exist->num_rows()) {
            $responseData = $exist->result();
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_found_success');
            $response[$this->config->item('baseUrl')] = base_url();
            $response[$this->config->item('data')] = $responseData[0];
            return $response;
        }
        return $this->send_error_response($this->config->item('data_found_failure'));
    }

    public function update_page_data($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_pages,$data);
        $update = $this->db->affected_rows();
        if($update)
        {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }
    public function update_contact_detail($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_contact_us,$data);
        $update = $this->db->affected_rows();
        if($update)
        {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }

    public function get_contact_detail()
    {
        $this->db->select('*');
        $this->db->from("$this->tbl_contact_us");
        $exist = $this->db->get();
        if ($exist->num_rows()) {
            $responseData = $exist->result();
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_found_success');
            $response[$this->config->item('baseUrl')] = base_url();
            $response[$this->config->item('data')] = $responseData[0];
            return $response;
        }
        return $this->send_error_response($this->config->item('data_found_failure'));
    }


//error message
    public function send_error_response($Message="")
    {
        $response[$this->config->item('status')] = false;
        $response[$this->config->item('message')] = $Message;
        return $response;
    }

}
