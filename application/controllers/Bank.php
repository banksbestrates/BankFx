<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

	public function bank_overview()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/bank/bank_overview');
		$this->load->view('website/layout/footer');
    }
	public function best_banks()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/bank/best_banks');
		$this->load->view('website/layout/footer');
    }
    
    
}