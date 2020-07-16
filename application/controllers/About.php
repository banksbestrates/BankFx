<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/about_us');
		$this->load->view('website/layout/footer');
    }
	public function privacy_policy()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/privacy_policy');
		$this->load->view('website/layout/footer');
    }
	public function terms_conditions()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/terms_conditions');
		$this->load->view('website/layout/footer');
    }
    
    
}