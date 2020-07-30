<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan extends CI_Controller {
	
	public function __construct()
	{
			parent::__construct();
			$this->load->model('LoanModel');	
	}

	public function loan_overview()
	{
			$loan_data = $this->LoanModel->get_loan_overview();
			if($loan_data['Status'])
			{
				$loan_data = $loan_data['data'];
			}else{
				$loan_data="";
			}
			$this->load->view('website/layout/header');
			$this->load->view('website/pages/loan/loan_overview',array("page_data"=>$loan_data));
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
	public function best_investment()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/investing/best_investment');
		$this->load->view('website/layout/footer');
    }
	public function leander_loan_review()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/leander_loan_review');
		$this->load->view('website/layout/footer');
    }
	public function personal_loan_rate()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/personal_loan_rate');
		$this->load->view('website/layout/footer');
    }
	public function loan_calculator()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/loan_calculator');
		$this->load->view('website/layout/footer');
    }
    
    
}