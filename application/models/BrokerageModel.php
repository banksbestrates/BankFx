<?php

class BrokerageModel extends CI_Model
{

    public $response = array(); 
    public $tbl_brokerage_overview      = "brokerage_overview";
    public $tbl_best_online_broker      = "best_online_broker";
    public $tbl_beginner_broker         = "best_beginner_broker";
    public function __construct()
    {
        parent::__construct();
    }

    //credit overview
    public function get_brokerage_overview()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_brokerage_overview");
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
    public function update_brokerage_overview($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_brokerage_overview,$data);
        $update = $this->db->affected_rows();
        if($update)
        {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }

    //===================BEST ONLILNE BROKERAGE======================//
    public function get_best_online_broker_data()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_best_online_broker");
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

    //update online best broker data
    public function update_best_online_broker($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_best_online_broker,$data);
        $update = $this->db->affected_rows();
        if($update)
        {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }


    //===================BEST BROKERAGE FOR BEGINNERS======================//
    public function get_beginner_broker_data()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_beginner_broker");
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

    //update online best broker data
    public function update_beginner_broker($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_beginner_broker,$data);
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
