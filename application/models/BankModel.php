<?php

class BankModel extends CI_Model
{

    public $response = array();
    
    public $tbl_bank_overview      = "bank_overview";
    public $tbl_best_bank      = "best_bank";
    public $tbl_best_bank_review      = "best_bank_review";


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
    public function get_bank_overview()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_bank_overview");
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

    //update bank overview
    public function update_bank_overview($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_bank_overview,$data);
        $update = $this->db->affected_rows();
        if($update)
        {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }



    //best bank get
    public function get_best_bank_overview()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_best_bank");
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
      //update bank overview
      public function update_best_bank($data)
      {
          $this->db->where('id',$data['id']);
          $this->db->update($this->tbl_best_bank,$data);
          $update = $this->db->affected_rows();
          if($update)
          {
              $response[$this->config->item('status')] = true;
              $response[$this->config->item('message')] = $this->config->item('data_update_success');
              return $response;
          }
          return $this->send_error_response($this->config->item('data_update_failure'));
      }


    //bank overview
    public function get_best_bank_review_overview()
    {
        $this->db->select("*");
        $this->db->from("$this->tbl_best_bank_review");
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

      //update bank overview
      public function update_best_bank_review($data)
      {
          $this->db->where('id',$data['id']);
          $this->db->update($this->tbl_best_bank_review,$data);
          $update = $this->db->affected_rows();
          if($update)
          {
              $response[$this->config->item('status')] = true;
              $response[$this->config->item('message')] = $this->config->item('data_update_success');
              return $response;
          }
          return $this->send_error_response($this->config->item('data_update_failure'));
      }

      public function get_article_detail($id)
      {
          $this->db->select("*");
          $this->db->from("$this->tbl_bank_overview")->where("id",$id);
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
