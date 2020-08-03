<?php

class MortgageModel extends CI_Model
{

    public $response = array();
    
    public $tbl_mortgage_rates      = "mortgage_rates";
    public $tbl_refinance_rates     = "refinance_rates";
    public $tbl_house_afford        = "house_afford";
    public $tbl_mortgage_overview   = "mortgage_overview";

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta');
        $date = new DateTime();
        $this->timeStamp = $date->getTimestamp();
        $this->unix_timestamp = date('U');
        $this->curr_date = date('Y-m-d H:i:s');
    }

    // get mortgage rate content
    public function get_mortgage_rate_content()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_mortgage_rates");
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

    public function update_mortgage_rate_content($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_mortgage_rates,$data);
        $update = $this->db->affected_rows();
        if($update)
        {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }
    // get refinance rate content
    public function get_refinance_rate_content()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_refinance_rates");
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

    public function update_refinance_rate_content($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_refinance_rates,$data);
        $update = $this->db->affected_rows();
        if($update)
        {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }
   
    // get how much house afford
    public function get_house_afford_content()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_house_afford");
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

    public function update_house_afford_content($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_house_afford,$data);
        $update = $this->db->affected_rows();
        if($update)
        {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }


    //mortgage overview
    public function get_mortgage_overview()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_mortgage_overview");
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
    //update mortgage overview
    public function update_mortgage_overview($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_mortgage_overview,$data);
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
