<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan extends CI_Controller {

	public function loan_overview()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/loan_overview');
		$this->load->view('website/layout/footer');
    }
	public function personal_loan()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/personal_loan');
		$this->load->view('website/layout/footer');
    }
	public function auto_loan()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/auto_loan');
		$this->load->view('website/layout/footer');
    }
	public function student_loan()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/student_loan');
		$this->load->view('website/layout/footer');
    }
	public function top_lenders()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/top_lenders');
		$this->load->view('website/layout/footer');
    }
	public function investment_overview()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/investing/investing_overview');
		$this->load->view('website/layout/footer');
    }
	public function loan_calculator()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/loan_calculator');
		$this->load->view('website/layout/footer');
    }
    
    
}