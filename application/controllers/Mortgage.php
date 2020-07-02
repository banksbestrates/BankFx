<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mortgage extends CI_Controller {

	public function mortgage_overview()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/mortgage_overview');
		$this->load->view('website/layout/footer');
    }
    public function mortgage_rates()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/mortgage_rates');
		$this->load->view('website/layout/footer');
    }
	
}