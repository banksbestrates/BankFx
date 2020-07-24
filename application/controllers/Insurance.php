<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance extends CI_Controller {

	public function insurance_overview()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/insurance/insurance_overview');
		$this->load->view('website/layout/footer');
    }
	public function homeowner_insurance()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/insurance/homeowner_insurance');
		$this->load->view('website/layout/footer');
    }

}