<?php

class InsuranceModel extends CI_Model
{

    public $response = array(); 
    public $tbl_insurance_overview      = "insurance_overview";
    public $tbl_homeowner_insurance     = "homeowner_insurance";
    public $tbl_auto_insurance          = "auto_insurance";
    public $tbl_life_insurance          = "life_insurance";
    public $tbl_health_insurance        = "health_insurance";
    public function __construct()
    {
        parent::__construct();
    }

    //insuranc overview
    public function get_insurance_overview()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_insurance_overview");
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

    //update insurance overview
    public function update_insurance_overview($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_insurance_overview,$data);
        $update = $this->db->affected_rows();
        if($update)
        {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }
   
    //============HOMEOWNER Insurance=================//
    public function get_homeowner_insurance()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_homeowner_insurance");
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

    public function update_homeowner_insurance($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_homeowner_insurance,$data);
        $update = $this->db->affected_rows();
        if($update)
        {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }
   
    //============Auto Insurance=================//
    public function get_auto_insurance()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_auto_insurance");
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

    public function update_auto_insurance($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_auto_insurance,$data);
        $update = $this->db->affected_rows();
        if($update)
        {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }
   
    //============Life Insurance=================//
    public function get_life_insurance()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_life_insurance");
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

    public function update_life_insurance($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_life_insurance,$data);
        $update = $this->db->affected_rows();
        if($update)
        {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }
    //============Health Insurance=================//
    public function get_health_insurance()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_health_insurance");
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

    public function update_health_insurance($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_health_insurance,$data);
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
