<?php

defined('BASEPATH') or exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

require APPPATH . '/libraries/REST_Controller.php';

class Pages extends \Restserver\Libraries\REST_Controller
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
		$this->load->model('PageModel');	
    }
    
	public function get_page_data_post()
	{
		$_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('page_type','page_type', 'trim|required|max_length[100]');	
							
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}

		$page_type		=	$this->input->post('page_type',true);
		$query = $this->PageModel->get_page_data($page_type);
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}

	public function page_data_update_post()
	{
		$_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('page_type','page_type', 'trim|required|max_length[100]');	
		$this->form_validation->set_rules('page_data','page_data', 'trim|required');	
							
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}

		$page_type		    =	$this->input->post('page_type',true);
		$page_data		    =	$this->input->post('page_data',true);
        
        $data = array(
			"id"=>"1",
			"updated_on"=>$this->curr_date
		);
		if($page_type=="about_us")
		{
			$data['about_us'] = $page_data;
		}
		else if($page_type=="terms_conditions")
		{
			$data['terms_conditions'] = $page_data;
		}
		else if($page_type=="privacy_policy")
		{
			$data['privacy_policy'] = $page_data;
		}
		else{
			return $this->send_error_response("Invalid Page Type");
		}
		$query = $this->PageModel->update_page_data($data);
		
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}

	//update page banner
	public function update_page_banner_post()
	{
		$_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('page_type','page_type', 'trim|required|max_length[100]');	
		$this->form_validation->set_rules('id','id', 'trim|required');	
							
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}

		$page_type		    =	$this->input->post('page_type',true);
		$id		    =	$this->input->post('id',true);
        
        $data = array(
			"id"=>$id,
			"updated_on"=>$this->curr_date
		);
		
			 //if image added
			 if (isset($_FILES['image'])) {    
                $file_name = md5($this->unix_timestamp) . "." . substr($_FILES['image']['name'],
                                    strpos($_FILES['image']['name'], ".") + 1);
            
                $upPath   =    getcwd() .'/'. $this->config->item('pages_media_path');

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
                $file_path  = $this->config->item('pages_media_path');

           		$image = $file_path.$file_name;
           			if($page_type=="about_us")
					{
						$data['about_image'] = $image;
					}
					else if($page_type=="terms_conditions")
					{
						$data['term_image'] = $image;
					}
					else if($page_type=="privacy_policy")
					{
						$data['privacy_image'] = $image;
					}
					else{
						return $this->send_error_response("Invalid Page Type");
					}
        	}


		$query = $this->PageModel->update_page_data($data);
		
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}





	public function update_contact_detail_post()
	{
		$_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('phone','phone', 'trim|required|max_length[100]');	
		$this->form_validation->set_rules('email','email', 'trim|required');	
		$this->form_validation->set_rules('address','address', 'trim|required');	
							
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}

		$phone		    =	$this->input->post('phone',true);
		$email		    =	$this->input->post('email',true);
		$address		=	$this->input->post('address',true);
        
        $data = array(
			"id"=>"1",
			"phone"=>$phone,
			"address"=>$address,
			"email"=>$email,
			"updated_on"=>$this->curr_date
		);
	
		$query = $this->PageModel->update_contact_detail($data);
		
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}

	public function get_contact_detail_post()
	{
		$query = $this->PageModel->get_contact_detail();
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}


  //Error message
  public function send_error_response($Message)
  {
      $response[$this->config->item('status')] = false;
      $response[$this->config->item('message')] = $Message;
      return $this->set_response($response, REST_Controller::HTTP_OK);
  }

//   public function send_notification_post(){
// 	define( 'API_ACCESS_KEY',  "AAAAkBSyr6U:APA91bEiyRXUOGLI_saOGB1qCdCQpkwWcj640FxbrRhlyIgjln0OGO-ayAg9l_Zaq8RtFppEKTB-Twsz7dw2O2SsboMW2_zEGmwa2Ti0XPnYYBvgisR79mg9cZVUqOyRjRjAkypylrfr");
// 	$time = date('Y-m-d H:i:s');
// 			$time = new DateTime($time);
// 			$minutes_to_add = 1;
// 			$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
// 			$stamp = $time->format('M d,Y h:i A');
	
// 		$fcmMsg = array(
// 			'body' => "Test",
// 			'title' => "test_data",
// 			'sound' => "default",
// 			'color' => "#203E78" ,
// 			"estimate"=>   100
// 		);

	
// 	$fcmFields = array(
// 		'to' => "fIEc9aM3APs:APA91bGV1m4PgS8AwUH_LgjXo-8Du1gBBOUdkPE95S_VhCMvZuq--8SNzeUBub-bnd5zgOcXwtUGmrzPq9kgO8yRLwrZ3rnWgEwDmqSVeDpT3LoF5pKcw2co266TyNWsgSdRZxAV1y10",
// 		'priority' => 'high',
// 		'notification' => $fcmMsg
// 	);

// 	$headers = array(
// 		'Authorization: key=' . "AAAAkBSyr6U:APA91bEiyRXUOGLI_saOGB1qCdCQpkwWcj640FxbrRhlyIgjln0OGO-ayAg9l_Zaq8RtFppEKTB-Twsz7dw2O2SsboMW2_zEGmwa2Ti0XPnYYBvgisR79mg9cZVUqOyRjRjAkypylrfr",
// 		'Content-Type: application/json'
// 	);
	
// 	$ch = curl_init();
// 	curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
// 	curl_setopt( $ch,CURLOPT_POST, true );
// 	curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
// 	curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
// 	curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
// 	curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
// 	$result = curl_exec($ch );
// 	curl_close( $ch ); 
// 	echo $result;
//   }
  
  
}