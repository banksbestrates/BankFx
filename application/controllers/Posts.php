<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

	public function post_detail($id,$title)
	{
        $this->load->view('website/layout/header');
		$this->load->view('website/pages/posts/post_detail',array("post_id"=>$id));
		$this->load->view('website/layout/footer');

    }
	
    
    
}