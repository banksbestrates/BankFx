<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan extends CI_Controller {

	public function loan_calculator()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/loan_calculator');
		$this->load->view('website/layout/footer');
    }
    
    
}