<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/customer_dashboard/header');
		$this->load->view('website/pages/customer_dashboard/profile');
		$this->load->view('website/pages/customer_dashboard/footer');
		$this->load->view('website/layout/footer');
    }
    
    
}