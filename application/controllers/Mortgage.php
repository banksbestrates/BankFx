<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mortgage extends CI_Controller {
	public function __construct()
	{
			parent::__construct();
			$this->load->model('MortgageModel');	
	}

	public function mortgage_overview()
	{
		$mortgage_data = $this->MortgageModel->get_mortgage_overview();
		if($mortgage_data['Status'])
		{
			$mortgage_data = $mortgage_data['data'];
		}else{
			$mortgage_data="";
		}
			$this->load->view('website/layout/header');
			$this->load->view('website/pages/mortgage/mortgage_overview',array("page_data"=>$mortgage_data));
			$this->load->view('website/layout/footer');
    }
		public function mortgage_rates()
		{
			$mortgage_rates = $this->MortgageModel->get_mortgage_rate_content();
			if($mortgage_rates['Status'])
			{
				$mortgage_rates = $mortgage_rates['data'];
			}else{
				$mortgage_rates="";
			}
				$this->load->view('website/layout/header');
				$this->load->view('website/pages/mortgage/mortgage_rates',array("page_data"=>$mortgage_rates));
				$this->load->view('website/layout/footer');
		}


		public function refinance_rates()
		{
			$refinance_rates = $this->MortgageModel->get_refinance_rate_content();
			if($refinance_rates['Status'])
			{
				$refinance_rates = $refinance_rates['data'];
			}else{
				$refinance_rates="";
			}
			
			$this->load->view('website/layout/header');
			$this->load->view('website/pages/mortgage/refinance_rate',array("page_data"=>$refinance_rates));
			$this->load->view('website/layout/footer');
		}

  public function mortgage_calculator()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/mortgage_calculator');
		$this->load->view('website/layout/footer');
    }
    public function mortgage_calculator_list()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/mortgage_calculator_list');
		$this->load->view('website/layout/footer');
    }
  public function house_afford()
	{
		$house_data = $this->MortgageModel->get_house_afford_content();
		if($house_data['Status'])
		{
			$house_data = $house_data['data'];
		}else{
			$house_data="";
		}
		
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/house_afford',array("page_data"=>$house_data));
		$this->load->view('website/layout/footer');
    }
    public function credit_overview()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/credit_card/credit_overview');
		$this->load->view('website/layout/footer');
    }
    public function best_credit_cards()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/credit_card/best_credit_cards');
		$this->load->view('website/layout/footer');
    }
    public function compare_card()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/credit_card/compare_card');
		$this->load->view('website/layout/footer');
		}
		
  public function article_detail($id)
	{
		$article_data = $this->MortgageModel->get_article_detail($id);
		if($article_data['Status'])
		{
			
			$article_data = $article_data['data'];
		}else{
			$article_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/article_detail',array("article_data"=>$article_data));
		$this->load->view('website/layout/footer');
    }
	
}