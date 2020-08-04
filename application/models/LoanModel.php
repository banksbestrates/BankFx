<?php

class LoanModel extends CI_Model
{

    public $response = array();
    
    public $tbl_loan_overview      = "loan_overview";
    public $tbl_personal_loan      = "personal_loan";
    public $tbl_auto_loan          = "auto_loan";
    public $tbl_student_loan       = "student_loan";
    public $tbl_debt_consolidation = "debt_consolidation";


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
   

    //===============PERSONAL LOAN==============
    public function get_personal_loan()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_personal_loan");
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
    
    public function update_personal_loan($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_personal_loan,$data);
        $update = $this->db->affected_rows();
        if($update)
        {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }
       
    //===============AUTO LOAN==============
    public function get_auto_loan()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_auto_loan");
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
    
    public function update_auto_loan($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_auto_loan,$data);
        $update = $this->db->affected_rows();
        if($update)
        {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }
       
    //===============STUDENT LOAN==============
    public function get_student_loan()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_student_loan");
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
    
    public function update_student_loan($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_student_loan,$data);
        $update = $this->db->affected_rows();
        if($update)
        {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }


    //===============debt CONSOLIDATION==============
    public function get_debt_consolidation_data()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_debt_consolidation");
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
    
    public function update_debt_consolidation($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_debt_consolidation,$data);
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
