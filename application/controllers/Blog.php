<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('BlogModel');	
	}

	public function blog_overview()
	{
		$blog_data = $this->BlogModel->get_blog_overview();
		if($blog_data['Status'])
		{
			$blog_data = $blog_data['data'];
		}else{
			$blog_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/blog/blog',array("page_data"=>$blog_data));
		$this->load->view('website/layout/footer');
    }

}