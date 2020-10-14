<?php
/**
 * Created by PhpStorm.
 * User: Sourav
 * Date: 26-Sep-16
 * Time: 11:40 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Validator
{

    function __construct()
    {
//         parent::__construct();
        $this->CI =& get_instance();
        $this->CI->load->config('validate_message');
    }

    /*
     * check for valid email-id
     * */
    public function isValidEmail($email)
    {
        $reg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

        if (preg_match($reg, $email)) {
            return true;
        }
        return false;

    }

    /*
     * check  for valid mobile number..
     *
     * */

    public function validate_mobile_number($number)
    {
//        echo preg_match("/^[0-9]{10}*$/",$number)."<br/>";
//		echo strlen($number);

        if (!preg_match('/^0\d{10}$/', $number) && strlen($number) != 10) {
            return false;
        }
        return true;
    }

    /*
     * in this function params will be validated with post or get params
     * */

    public function valid_params($params, $requiredfields)
    {
        $error = "";
        $keys = array_keys($params);
        if (count($params) == count($requiredfields)) {
            for ($i = 0; $i < count($requiredfields); $i++) {
                $feild = $requiredfields[$i];
                if (in_array($feild, $keys)) {
                    if ($params[$feild] == "") {
                        $error = $error . $feild . ",";
                    }
                } else {
                    $error = $error . $feild . ",";
                }
            }
            $error = trim($error);
        } else {
            for ($i = 0; $i < count($requiredfields); $i++) {
                $feild = $requiredfields[$i];
                if (in_array($feild, $keys)) {
                    if ($params[$feild] == "") {
                        $error = $error . $feild . ",";
                    }
                } else {
                    $error = $error . $feild . ",";
                }
            }
            $error = trim($error);
        }
        if ($error != "") {
            $error = rtrim($error, ",");
            $response[$this->CI->config->item('status')] = false;
            $response[$this->CI->config->item('message')] = 'The following fields are required: ' . $error;
            return $response;
        }
        $response[$this->CI->config->item('status')] = true;
        $response[$this->CI->config->item('message')] = '';

        return $response;
    }

    public function do_upload($config, $name)
    {
        $response = array();
        $this->CI->load->library('upload', $config);
        $this->CI->upload->initialize($config);
        if ($this->CI->upload->do_upload($name)) {
            $response[$this->CI->config->item('status')] = true;
            $response[$this->CI->config->item('data')] = $this->CI->upload->data();
            return $response;
        }
        $response[$this->CI->config->item('status')] = false;
        $response[$this->CI->config->item('message')] = $this->CI->upload->display_errors();
        return $response;
    }

    public function do_upload_multiple($path, $files)
    {
        $response = array();
        $title = time();

        $config = array(
            'upload_path'   => $path,
            'allowed_types' => '*',
            'overwrite'     => 1,                       
        );

        $this->CI->load->library('upload', $config);



        $files = $_FILES;
        $cpt = count($_FILES ['multipleUpload'] ['name']);

        $imagesNames = array();
        for ($i = 0; $i < $cpt; $i ++) {

            $name = time().rand(100,10000).$files ['multipleUpload']['name'] [$i];
            $_FILES ['multipleUpload'] ['name'] = $name;
            $_FILES ['multipleUpload'] ['type'] = $files ['multipleUpload'] ['type'] [$i];
            $_FILES ['multipleUpload'] ['tmp_name'] = $files ['multipleUpload'] ['tmp_name'] [$i];
            $_FILES ['multipleUpload'] ['error'] = $files ['multipleUpload'] ['error'] [$i];
            $_FILES ['multipleUpload'] ['size'] = $files ['multipleUpload'] ['size'] [$i];

            if(!($this->CI->upload->do_upload('multipleUpload')) || $files ['multipleUpload'] ['error'] [$i] !=0)
            {
                $response[$this->CI->config->item('status')] = false;
                $response[$this->CI->config->item('message')] = $this->CI->upload->display_errors();
                return $response;
            }
            else
            {
                $imagesNames[] = $name;
            }
        }
        $response[$this->CI->config->item('status')] = true;
        $response[$this->CI->config->item('message')] = "Images upload successfully";
        $response['data'] = $imagesNames;
        return $response;
    }

    function random_num($size)
    {
        $alpha_key = '';
        $keys = range('A', 'Z');

        for ($i = 0; $i < 2; $i++) {
            $alpha_key .= $keys[array_rand($keys)];
        }

        $length = $size - 2;

        $key = '';
        $keys = range(0, 9);

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $alpha_key . $key;
    }
     
    public function readFile($path) {
        $rows = array();
        $file_handle = fopen($path, 'r');
        while (!feof($file_handle) ) {
            $rows[] = fgetcsv($file_handle, 1024);
        }
        fclose($file_handle);

        return $rows;
    }
    public function apiResponse($response)
    {
        header("Content-Type: application/json");
        echo json_encode($response);
    }

// ============================NOTIFICATION MODULE========================================
    /*
     Simple notification
    */
    public function simple_notification($data,$checkType=null)
    {

            define( 'API_ACCESS_KEY',  $this->CI->config->item('FIREBASE_API_KEY'));
            $time = date('Y-m-d H:i:s');
                    $time = new DateTime($time);
                    $minutes_to_add = 1;
                    $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                    $stamp = $time->format('M d,Y h:i A');
            if($checkType == ""){
                $checkType = "OPEN_ACTIVITY_1_U";
            }
            if($checkType == "register"){
                $fcmMsg = array(
                    'body' => $this->CI->config->item('fcm_title'),
                    'title' => $data['fcm_title'],
                    'sound' => "default",
                    'color' => "#203E78" ,
                    "estimate"=>   100
                );
            }
            else{
                $fcmMsg = array(
                    'body' => $this->CI->config->item('fcm_title'),
                    'title' => $data['fcm_title'],
                    'sound' => "default",
                    'color' => "#203E78" ,
                    "estimate"=>    100,
                    'click_action'=>$checkType
                );
            }
            
            $fcmFields = array(
                'to' => $data['to_user'],
                'priority' => 'high',
                'notification' => $fcmMsg
            );

            $headers = array(
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );
            
            $ch = curl_init();
            curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
            curl_setopt( $ch,CURLOPT_POST, true );
            curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
            $result = curl_exec($ch );
            curl_close( $ch ); 
            return $result;
    }

     /*
     Simple notification for multiple users
    */
    public function senNotification_multiple($registration_ids,$notification,$user_type,$data=null)
    {
        $api_access_key ="";
        if($user_type == "shopper"){
            $api_access_key =  $this->CI->config->item('FIREBASE_API_KEY_SHOPPER');
        }
        else if($user_type == "customer"){
            $api_access_key =  $this->CI->config->item('FIREBASE_API_KEY_CUSTOMER');
        }
        else if($user_type == "dispatcher"){
            $api_access_key = $this->CI->config->item('FIREBASE_API_KEY_DISPATCHER');
        }
        define( 'API_ACCESS_KEY_5',$api_access_key);
    
        $fields = array(
            'registration_ids' => $registration_ids,
            'data' =>  array ("message" => $notification),
            'notification' => array (
                "body" => $notification,
                "title" => "Boogie Notification",
              )
        );
        $headers = array(
            'Authorization: key=' . API_ACCESS_KEY_5,
            'Content-Type: application/json'
        );  
    
        if($data != ""){
            $fields['data'] = $data;
        }  
    
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec( $ch );
        curl_close( $ch );
        
        return $result;
    
    }

    /*
     Check type Notification
    */
    public function checktype_notification($data,$checkType=null)
    { 
        define( 'API_ACCESS_KEY', $this->CI->config->item('FIREBASE_API_KEY'));
           
        $time = date('Y-m-d H:i:s');
        $time = new DateTime($time);
        $minutes_to_add = 1;
        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
        $stamp = $time->format('M d,Y h:i A');
       
        
        $fcmMsg = array(
            'body' => $data['fcm_body'],
            'title' => $data['fcm_title'],
            'sound' => "default",
            'color' => "#203E78" ,
            "estimate"=> 100
        );
        
        if($checkType != "" && $checkType != null){
            $fcmMsg['click_action'] = $checkType;
        }
        
        $fcmFields = array(
        'to' => $data['to_user'],
        'priority' => 'high',
        'notification' => $fcmMsg
        );
  
         $headers = array(
             'Authorization: key=' . API_ACCESS_KEY,
             'Content-Type: application/json'
             ); 

        $body_data_obj = (object) array('name' => $data['fcm_body']);
        $body_obj = (object) array('data'=>$body_data_obj);
        
       
        $fcmFields['data'] = $body_obj; 

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        curl_close( $ch );  
         return $result;  
    }
    
    /*
     Topic Notification
    */
    public function topic_notification($topicsArray,$checkType=null)
    {
        $topic = $topicsArray['topic'];
        $fcm_title = $topicsArray['fcm_title'];
        $message = $topicsArray['fcm_body'];

        define( 'API_ACCESS_KEY',$this->CI->config->item('FIREBASE_API_KEY'));

        $fcmMsg = array(
            'body' => $message,
            'title' => $fcm_title,
            'sound' => "default",
            'color' => "#203E78" ,
            "estimate"=>  100
        );

        if($checkType != "" && $checkType != null){
            $fcmMsg['click_action'] = $checkType;
        }


        $fcmFields = array(
            'to' => '/topics/'.$topic
        );
        
        $headers = array(
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        ); 

        $body_data_obj = (object) array('name' => $message,'type' => '1');

        $body_obj = (object) array('to' => '/topics/'.$topic,'data'=>$body_data_obj);

        $fcmFields['data'] = $body_obj; 
        $fcmFields['notification'] = $fcmMsg; 
        
        
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        
        return $result;
    
    }



// ================================EMAIL MODULE===============================================

    /*
    send Email
    */

    public function sendmail($to, $bodyData, $subject){
        $this->CI->load->library('email');
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.stsmentor.com',
            'smtp_port' => 587,
            'smtp_user' => 'story_cap@stsmentor.com',
            'smtp_pass' => 'story_cap',
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );
        $this->CI->email->initialize($config);
        $from = "noreply@sachtechsolution.com";
        $this->CI->email->from("noreply@stsmentor.com");
        $this->CI->email->to($to);
        
        $this->CI->email->subject($subject);
        $this->CI->email->message($bodyData);
        $this->CI->email->set_mailtype("html");
        $this->CI->email->set_newline("\r\n");
        $result = $this->CI->email->send();
        if($result){
            return true;
        }
        return false;
    }


//==============GET ALL STATES IN USA==============================//
public function get_all_states()
{
    $curlRef = curl_init();
    $curlConfig = array(
        CURLOPT_URL  => 'http://nemo-soft.com/bbr/LocationCount_API.php',
        CURLOPT_POST  => true,
        CURLOPT_RETURNTRANSFER => true,
                                    
        CURLOPT_POSTFIELDS     => array(
                'UserName'  => 'schmid@banksbestrates.com',
                'Password'  => '12345678',
                'state'=>'*',
                )
            );
            
         curl_setopt_array($curlRef, $curlConfig); 
         $returned_JSON = curl_exec($curlRef);
         $json = preg_replace('/[[:cntrl:]]/', '', $returned_JSON);
         $json = json_decode($json, true);          
         curl_close($curlRef);
         return $json;
}


//=======================GET ALL CITIES OF STATE ======================//

public function get_all_cities($state_name)
{
    $curlRef = curl_init();
    $curlConfig = array(
        CURLOPT_URL  => 'http://nemo-soft.com/bbr/LocationCount_API.php',
        CURLOPT_POST  => true,
        CURLOPT_RETURNTRANSFER => true,
                                    
        CURLOPT_POSTFIELDS     => array(
              'UserName'  => 'schmid@banksbestrates.com',
                'Password'  => '12345678',
                'city'      => '*',
                'stateCode' => $state_name
                )
            );
            
         curl_setopt_array($curlRef, $curlConfig); 
         $returned_JSON = curl_exec($curlRef);
         $json = preg_replace('/[[:cntrl:]]/', '', $returned_JSON);
         $json = json_decode($json, true);          
         curl_close($curlRef);
         return $json;
}

//========================GET ALL THE BANKS IN PARTICULAR STATE===========//
public function get_banks_in_city($state_code,$city_name)
{
    $curlRef = curl_init();
    $curlConfig = array(
          CURLOPT_URL  => 'http://nemo-soft.com/bbr/Location_API.php',
          CURLOPT_POST  => true,
          CURLOPT_RETURNTRANSFER => true,
                                      
          CURLOPT_POSTFIELDS     => array(
                'UserName'  => 'schmid@banksbestrates.com',
                'Password'  => '12345678',
                'City' => $city_name,
                'StateCode'=>$state_code,
                )
            );
            
            curl_setopt_array($curlRef, $curlConfig); 
            $returned_JSON = curl_exec($curlRef);
            $json = preg_replace('/[[:cntrl:]]/', '', $returned_JSON);
            $json = json_decode($json, true);          
            curl_close($curlRef);

            return $json;
}



public function get_best_banks($limit)
{
    $curlRef = curl_init();
    $curlConfig = array(
          CURLOPT_URL  => 'http://nemo-soft.com/bbr/Rating_API.php',
          CURLOPT_POST  => true,
          CURLOPT_RETURNTRANSFER => true,
                                      
          CURLOPT_POSTFIELDS     => array(
                'UserName'  => 'schmid@banksbestrates.com',
                'Password'  => '12345678',
                'Returning' => $limit,
                )
            );
            
            curl_setopt_array($curlRef, $curlConfig); 
            $returned_JSON = curl_exec($curlRef);
            $json = preg_replace('/[[:cntrl:]]/', '', $returned_JSON);
            $json = json_decode($json, true);          
            curl_close($curlRef);

            return $json;
}


}

?>