<?php

defined('BASEPATH') or exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

require APPPATH . '/libraries/REST_Controller.php';

class Analytics extends \Restserver\Libraries\REST_Controller
{
    public $curr_date 			= "";
	public $unix_timestamp 		= "";
	public $timeStamp 			= "";
	public $responseData 		= array();
	
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/New_York');

        $date = new DateTime();
        $this->curr_date = date('Y-m-d H:i:s');
        $this->unix_timestamp = date('U');
		$this->timeStamp = $date->getTimestamp();
        $this->load->model('AnalyticModel');	
    }

   
	public function get_script_data_post()
	{
		$query = $this->AnalyticModel->get_script_data();
        if ($query['Status']) {
            return $this->set_response($query, REST_Controller::HTTP_OK);
        }
        return $this->send_error_response($query['Message']);  
		
    }
	public function update_script_data_post()
	{
        $_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('type','type', 'trim|required|max_length[100]');	
		$this->form_validation->set_rules('data','data', 'trim|required');						
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}

		$type		    =	$this->input->post('type',true);
        $data		    =	$this->input->post('data',true);
        
        $data_array = array (
            "id"=>1,
            "updated_on"=> $this->curr_date,
        );

        if($type=="header")
        {
            $data_array['header_script']=strip_tags($data);
        }else if($type=="footer")
        {
            $data_array['footer_script']=$data;
        }

		$query = $this->AnalyticModel->update_script_data($data_array);
        if ($query['Status']) {
            return $this->set_response($query, REST_Controller::HTTP_OK);
        }
        return $this->send_error_response($query['Message']);  
		
    }

    // get footer data
	public function get_footer_data_post()
	{
		$query = $this->AnalyticModel->get_footer_data();
        if ($query['Status']) {
            return $this->set_response($query, REST_Controller::HTTP_OK);
        }
        return $this->send_error_response($query['Message']);  
		
    }

	public function update_footer_links_post()
	{
        $_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('id','id', 'trim|required|max_length[100]');	
		$this->form_validation->set_rules('facebook_link','facebook_link', 'trim|required');	
		$this->form_validation->set_rules('twitter_link','twitter_link', 'trim|required');	
		$this->form_validation->set_rules('google_link','google_link', 'trim|required');	
		$this->form_validation->set_rules('instagram_link','instagram_link', 'trim|required');	
					
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}

		$id    		      =	$this->input->post('id',true);
        $facebook_link    =	$this->input->post('facebook_link',true);
        $twitter_link     =	$this->input->post('twitter_link',true);
        $google_link      =	$this->input->post('google_link',true);
        $instagram_link   =	$this->input->post('instagram_link',true);
        
        $data = array (
            "id"=>$id,
            "facebook_link"=>$facebook_link,
            "twitter_link"=>$twitter_link,
            "google_link"=>$google_link,
            "instagram_link"=>$instagram_link,
            "updated_on"=> $this->curr_date,
        );

		$query = $this->AnalyticModel->update_footer_links($data);
        if ($query['Status']) {
            return $this->set_response($query, REST_Controller::HTTP_OK);
        }
        return $this->send_error_response($query['Message']);  
		
    }
	public function update_footer_data_post()
	{
        $_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('id','id', 'trim|required|max_length[100]');	
		$this->form_validation->set_rules('type','type', 'trim|required');	
		$this->form_validation->set_rules('content','content', 'trim|required');	
					
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}

		$id    		        =	$this->input->post('id',true);
        $type               =	$this->input->post('type',true);
        $content            =	$this->input->post('content',true);

        $data = array (
            "id"=>$id,
            "updated_on"=> $this->curr_date,
        );

        if($type=="about")
        {
            $data['about_desc'] = $content;
        }else if($type=="newsletter")
        {
            $data['newsletter_desc'] = $content;
        }

		$query = $this->AnalyticModel->update_footer_data($data);
        if ($query['Status']) {
            return $this->set_response($query, REST_Controller::HTTP_OK);
        }
        return $this->send_error_response($query['Message']);  
		
    }

    public function send_error_response($Message)
    {
        $response[$this->config->item('status')] = false;
        $response[$this->config->item('message')] = $Message;
        return $this->set_response($response, REST_Controller::HTTP_OK);
    }
  
}