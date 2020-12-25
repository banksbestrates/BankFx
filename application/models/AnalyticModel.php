<?php

class AnalyticModel extends CI_Model
{

    public $response = array();
    public $tbl_analytics        = "bankfx_analytics";
    public $tbl_footer          = "bankfx_footer";


    public function __construct()
    {
        parent::__construct();
      
    }

    public function get_script_data()
    {
        $exist = $this->db->select('*')->from($this->tbl_analytics)->get();
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

    public function update_script_data($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_analytics,$data);
        $affected_rows = $this->db->affected_rows();
        if ($affected_rows) {   
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }

    public function get_footer_data()
    {
        $exist = $this->db->select('*')->from($this->tbl_footer)->get();
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

    public function update_footer_links($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_footer,$data);
        $affected_rows = $this->db->affected_rows();
        if ($affected_rows) {   
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }


    
    public function update_footer_data($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_footer,$data);
        $affected_rows = $this->db->affected_rows();
        if ($affected_rows) {   
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }


  


    public function send_error_response($Message="")
    {
        $response[$this->config->item('status')] = false;
        $response[$this->config->item('message')] = $Message;
        return $response;
    }

}
