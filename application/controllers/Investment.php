<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Investment extends CI_Controller {
	
	public function __construct()
	{
			parent::__construct();
			$this->load->model('InvestingModel');	
	}

	public function investment_overview()
	{
        $investment_data = $this->InvestingModel->get_investing_overview();
		if($investment_data['Status'])
		{
			$investment_data = $investment_data['data'];
		}else{
			$investment_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/investing/investing_overview',array("page_data"=>$investment_data));
		$this->load->view('website/layout/footer');
    }
	public function best_investment()
	{
		$investment_data = $this->InvestingModel->get_best_investment();
		if($investment_data['Status'])
		{
			$investment_data = $investment_data['data'];
		}else{
			$investment_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/investing/best_investment',array("page_data"=>$investment_data));
		$this->load->view('website/layout/footer');
	}
	

	public function article_detail($id)
	{
		$article_data = $this->InvestingModel->get_article_detail($id);
		if($article_data['Status'])
		{
			
			$article_data = $article_data['data'];
		}else{
			$article_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/investing/article_detail',array("article_data"=>$article_data));
		$this->load->view('website/layout/footer');
    }
	public function debt_income_ratio_calculator()
	{

		$this->load->view('website/layout/header');
		$this->load->view('website/pages/investing/debt_income_ratio_calculator');
		$this->load->view('website/layout/footer');
    }
	public function income_earned_calculator()
	{

		$this->load->view('website/layout/header');
		$this->load->view('website/pages/investing/income_earned_calculator');
		$this->load->view('website/layout/footer');
    }
	public function interest_paid_life_calculator()
	{

		$this->load->view('website/layout/header');
		$this->load->view('website/pages/investing/interest_paid_life_calculator');
		$this->load->view('website/layout/footer');
    }
	public function college_savings_calculator()
	{

		$this->load->view('website/layout/header');
		$this->load->view('website/pages/investing/college_savings_calculator');
		$this->load->view('website/layout/footer');
    }
	public function compare_saving_rates()
	{

		$this->load->view('website/layout/header');
		$this->load->view('website/pages/investing/compare_saving_rates');
		$this->load->view('website/layout/footer');
    }

    
    
}