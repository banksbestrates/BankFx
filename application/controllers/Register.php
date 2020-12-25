<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/signup');
		// $this->load->view('website/layout/footer');
    }
    
    
}