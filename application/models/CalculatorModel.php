<?php

class CalculatorModel extends CI_Model
{

    public $response = array();
    public $tbl_calculator_overview      = "calculator_overview";


    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/New_York');
        $date = new DateTime();
        $this->timeStamp = $date->getTimestamp();
        $this->unix_timestamp = date('U');
        $this->curr_date = date('Y-m-d H:i:s');
    }

    //bank overview
    public function get_cal_overview_data()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_calculator_overview");
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


//error message
    public function send_error_response($Message="")
    {
        $response[$this->config->item('status')] = false;
        $response[$this->config->item('message')] = $Message;
        return $response;
    }

}
