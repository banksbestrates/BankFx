
<?php

defined('BASEPATH') or exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

require APPPATH . '/libraries/REST_Controller.php';

class Register extends \Restserver\Libraries\REST_Controller
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
		$this->load->model('RegisterModel');	
    }
 

	public function register_user_post()
	{
		$_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('user_email','user_email', 'trim|required|max_length[100]');	
		// $this->form_validation->set_rules('user_password','user_password', 'trim|required');	
							
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}

		$user_email		    =	trim($this->input->post('user_email',true));
		$user_password		=	trim($this->input->post('user_password',true));
        
        $data = array(
			"user_email"=>$user_email,
			"user_password"=>md5($user_password),
			"created_on"=>$this->curr_date
		);
		$email_exist = $this->RegisterModel->email_exist($user_email);
		if($email_exist['Status'])
		{
			return $this->send_error_response($email_exist['Message']);
		}
		$query = $this->RegisterModel->register_user($data);
		if ($query['Status']) {
			// API to mailchimp ########################################################
				$list_id = '8948971bd3';
				$authToken = '02d428894063a453176ff6f8c50bd0db-us2';
				// The data to send to the API

				$postData = array(
					"email_address" => $user_email, 
					"status" => "subscribed", 
					"merge_fields" => array(
					"FNAME"=> "User")
				);

				// Setup cURL
				$ch = curl_init('https://us2.api.mailchimp.com/3.0/lists/'.$list_id.'/members/');
				curl_setopt_array($ch, array(
					CURLOPT_POST => TRUE,
					CURLOPT_RETURNTRANSFER => TRUE,
					CURLOPT_HTTPHEADER => array(
						'Authorization: apikey '.$authToken,
						'Content-Type: application/json'
					),
					CURLOPT_POSTFIELDS => json_encode($postData)
				));
				// Send the request
				$response = curl_exec($ch);
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query['Message']);
	}
	

	//get overview details 
	public function get_best_bank_overview_post()
	{  
        $query = $this->BankModel->get_best_bank_overview();
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}

	public function update_best_bank_overview_post()
	{
		$_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('heading','heading', 'trim|required|max_length[100]');	
		$this->form_validation->set_rules('content','content', 'trim|required');	
		$this->form_validation->set_rules('id','id', 'trim|required');	
							
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}

		$heading		    =	$this->input->post('heading',true);
		$content		    =	$this->input->post('content',true);
		$id		    		=	$this->input->post('id',true);
        
        $data = array(
			"id"=>$id,
			"heading"=>$heading,
			"content"=>$content,
			"updated_on"=>$this->curr_date
		);

		    //if image added
			if (isset($_FILES['image'])) {    
                $file_name = md5($this->unix_timestamp) . "." . substr($_FILES['image']['name'],
                                    strpos($_FILES['image']['name'], ".") + 1);
            
                $upPath   =    getcwd() .'/'. $this->config->item('bank_media_path');

                $config = array(
                    'upload_path'   => $upPath,
                    'file_name'     => $file_name,
                    'allowed_types' => "*",
                    'overwrite'     => TRUE,
                    'max_size'		=> "524288000"
                );
                $img_response = $this->validator->do_upload($config, 'image');

                $img_status = $img_response[$this->config->item('status')];
                if (!$img_status) {
                    return $this->validator->apiResponse($img_response);
                }
                $img_data   = $img_response[$this->config->item('data')];
                $file_name  = $img_data['file_name'];
                $file_path  = $this->config->item('bank_media_path');

            $image = $file_path.$file_name;
            $data['image']= $image;
        }

		$query = $this->BankModel->update_best_bank($data);
		
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}
	
	//get best bank review details 
	public function get_best_bank_review_overview_post()
	{  
        $query = $this->BankModel->get_best_bank_review_overview();
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}

	public function update_best_bank_review_overview_post()
	{
		$_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('heading','heading', 'trim|required|max_length[100]');	
		$this->form_validation->set_rules('content','content', 'trim|required');	
		$this->form_validation->set_rules('id','id', 'trim|required');	
							
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}

		$heading		    =	$this->input->post('heading',true);
		$content		    =	$this->input->post('content',true);
		$id		    		=	$this->input->post('id',true);
        
        $data = array(
			"id"=>$id,
			"heading"=>$heading,
			"content"=>$content,
			"updated_on"=>$this->curr_date
		);

		    //if image added
			if (isset($_FILES['image'])) {    
                $file_name = md5($this->unix_timestamp) . "." . substr($_FILES['image']['name'],
                                    strpos($_FILES['image']['name'], ".") + 1);
            
                $upPath   =    getcwd() .'/'. $this->config->item('bank_media_path');

                $config = array(
                    'upload_path'   => $upPath,
                    'file_name'     => $file_name,
                    'allowed_types' => "*",
                    'overwrite'     => TRUE,
                    'max_size'		=> "524288000"
                );
                $img_response = $this->validator->do_upload($config, 'image');

                $img_status = $img_response[$this->config->item('status')];
                if (!$img_status) {
                    return $this->validator->apiResponse($img_response);
                }
                $img_data   = $img_response[$this->config->item('data')];
                $file_name  = $img_data['file_name'];
                $file_path  = $this->config->item('bank_media_path');

            $image = $file_path.$file_name;
            $data['image']= $image;
        }

		$query = $this->BankModel->update_best_bank_review($data);
		
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}
	

	//search bank by zip 

public function search_bank_by_zip_post()
	{
		$_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('zipcode','zipcode', 'trim|required|max_length[100]');	
		
							
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}

		$zipcode		    =	$this->input->post('zipcode',true);
	

		$curlRef = curl_init();
		$curlConfig = array(
			  CURLOPT_URL  => 'http://nemo-soft.com/bbr/Location_API.php',
			  CURLOPT_POST  => true,
			  CURLOPT_RETURNTRANSFER => true,
										  
			  CURLOPT_POSTFIELDS     => array(
					'UserName'  => 'schmid@banksbestrates.com',
					'Password'  => '12345678',
					'Zip' => $zipcode,
					)
				);
				
				curl_setopt_array($curlRef, $curlConfig); 
				$returned_JSON = curl_exec($curlRef);
				$json = preg_replace('/[[:cntrl:]]/', '', $returned_JSON);
				$json = json_decode($json, true);          
				curl_close($curlRef);

		if ($json) {
			return $this->set_response($json, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response("No Bank Available");
	}

    


  //Error message
  public function send_error_response($Message)
  {
      $response[$this->config->item('status')] = false;
      $response[$this->config->item('message')] = $Message;
      return $this->set_response($response, REST_Controller::HTTP_OK);
  }
  
}

