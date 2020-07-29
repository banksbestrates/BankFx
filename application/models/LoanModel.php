<?php

class LoanModel extends CI_Model
{

    public $response = array();
    
    public $tbl_loan_overview      = "loan_overview";


    public function __construct()
    {
        parent::__construct();
    }

    //credit overview
    public function get_loan_overview()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_loan_overview");
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

    //update credit overview
    public function update_loan_overview($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_loan_overview,$data);
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
