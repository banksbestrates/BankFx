<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function blog_overview()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/blog/blog');
		$this->load->view('website/layout/footer');
    }

}