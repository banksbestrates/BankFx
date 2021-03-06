<?php

class ReviewModel extends CI_Model
{

    public $response = array(); 
    public $tbl_user_bank_review      = "user_bank_reviews";
    public function __construct()
    {
        parent::__construct();
    }

    //get review list
    public function get_review_list()
    {
        $this->db->select("*")->where("review_status!=","delete");
        $this->db->from("$this->tbl_user_bank_review");
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
    public function update_review_status($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($this->tbl_user_bank_review,$data);
        $update = $this->db->affected_rows();
        if($update)
        {
            $response[$this->config->item('status')] = true;
            $response[$this->config->item('message')] = $this->config->item('data_update_success');
            return $response;
        }
        return $this->send_error_response($this->config->item('data_update_failure'));
    }

       //credit overview
       public function get_article_detail($id)
       {
           $this->db->select("*");
           $this->db->from("$this->tbl_retirement_overview")->where("id",$id);
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
