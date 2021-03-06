<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {
	public function __construct()
	{
			parent::__construct();
			$this->load->model('BankModel');	
	}

	public function bank_overview()
	{
		$bank_data = $this->BankModel->get_bank_overview();
		if($bank_data['Status'])
		{
			$bank_data = $bank_data['data'];
		}else{
			$bank_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/bank/bank_overview',array("page_data"=>$bank_data));
		$this->load->view('website/layout/footer');
	}
	
	public function best_banks()
	{
		$bank_data = $this->BankModel->get_best_bank_overview();
		if($bank_data['Status'])
		{
			$bank_data = $bank_data['data'];
		}else{
			$bank_data="";
		}

		$best_bank_list = $this->validator->get_best_banks('100');
		if($best_bank_list['RowCount'] > 0 )
		{
			$this->load->view('website/layout/header',array("page_name"=>"best_banks"));
			$this->load->view('website/pages/bank/best_banks',array("page_data"=>$bank_data , "data"=>$best_bank_list));
			$this->load->view('website/layout/footer');
		}
	

	}
	public function best_bank_reviews()
	{
		$bank_data = $this->BankModel->get_best_bank_review_overview();
		if($bank_data['Status'])
		{
			$bank_data = $bank_data['data'];
		}else{
			$bank_data="";
		}
	
		$best_bank_review = $this->validator->get_best_banks('10');
		if($best_bank_review['RowCount'] > 0 )
		{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/bank/best_bank_reviews',array("page_data"=>$bank_data,"data"=>$best_bank_review));
		$this->load->view('website/layout/footer');
		}
	}
	public function bank_full_review($bank_name)
	{
		$bank_name = str_replace('%20', ' ', $bank_name);
		$bank_review = $this->validator->get_bank_review($bank_name);
		if($bank_review['RowCount'] > 0)
		{
			$this->load->view('website/layout/header');
			$this->load->view('website/pages/bank/bank_review',array("bank_data"=>$bank_review['Returned']));
			$this->load->view('website/layout/footer');
		}

	}
	public function best_large_banks()
	{
		$bank_data = $this->validator->best_large_banks();
		if($bank_data['RowCount'] > 0)
		{
			$this->load->view('website/layout/header');
			$this->load->view('website/pages/bank/best_large_banks',array("data"=>$bank_data));
			$this->load->view('website/layout/footer');
		}
	}
	public function best_online_banks()
	{
		$bank_data = $this->validator->best_online_banks();
		if($bank_data['RowCount'] > 0)
		{
			$this->load->view('website/layout/header');
			$this->load->view('website/pages/bank/best_online_banks',array("data"=>$bank_data));
			$this->load->view('website/layout/footer');
		}
	}
	public function best_credit_unions()
	{
		$bank_data = $this->validator->best_credit_unions();
		if($bank_data['RowCount'] > 0)
		{
			$this->load->view('website/layout/header');
			$this->load->view('website/pages/bank/best_credit_unions',array("data"=>$bank_data));
			$this->load->view('website/layout/footer');
		}
	}
	public function best_regional_banks()
	{
		$bank_data = $this->validator->best_regional_banks();
		if($bank_data['RowCount'] > 0)
		{
			$this->load->view('website/layout/header');
			$this->load->view('website/pages/bank/best_regionl_banks',array("data"=>$bank_data));
			$this->load->view('website/layout/footer');
		}
	}
	public function branch_locator()
	{
		$all_states = $this->validator->get_all_states();
		if($all_states['Returning'])
		{		
			$top_banks = $this->validator->get_best_banks('50');
			if($top_banks['RowCount'] > 0)
			{
				$this->load->view('website/layout/header');
				$this->load->view('website/pages/bank/branch_locator',array("data"=>$top_banks,"all_states"=>$all_states));
				$this->load->view('website/layout/footer');
			}
		}
		
		// else{
		// 	$this->load->view('website/pages/page_not_found');
		// }
	
	}
	public function bank_state()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/bank/bank_state');
		$this->load->view('website/layout/footer');
  	}	
	public function best_money_market()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/bank/best_money_market');
		$this->load->view('website/layout/footer');
  	}
	public function bank_details()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/bank/bank_details');
		$this->load->view('website/layout/footer');
    }
	public function article_detail($id)
	{
		$article_data = $this->BankModel->get_article_detail($id);
		if($article_data['Status'])
		{
			
			$article_data = $article_data['data'];
		}else{
			$article_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/bank/article_detail',array("article_data"=>$article_data));
		$this->load->view('website/layout/footer');
	}

	public function all_cities($state_name)
	{
		$city_data = $this->validator->get_all_cities($state_name);
		if($city_data['Returning']){
				$this->load->view('website/layout/header',array("page_name"=>"state_banks"));
				$this->load->view('website/pages/bank/all_cities',array("city_data"=>$city_data ,"state_code"=>$state_name));
				$this->load->view('website/layout/footer');	
		}
		else{
			$this->load->view('website/pages/page_not_found');
		}
		
	}

	public function bank_city($state_code,$city)
	{
		$city_name = str_replace('%20', ' ', $city);
		$data = $this->validator->get_banks_in_city($state_code,$city_name);
		if($data)
		{
			if($data['RowCount'] > 0 )
			{
				$city_name = $data['City']['FullList'][0];	

				$this->load->view('website/layout/header', array("page_name"=>"city_banks"));
				$this->load->view('website/pages/bank/bank_city',array("data"=>$data,"city_name"=>$city_name,"state_code"=>$state_code));
				$this->load->view('website/layout/footer');
			}
		}
		
		else{
			$this->load->view('website/pages/page_not_found');
		}
  	}
	public function credit_unions($state_code,$city)
	{
		$city_name = str_replace('%20', ' ', $city);
		$data = $this->validator->get_credit_unions($state_code,$city_name);
		if($data)
		{
			$this->load->view('website/layout/header');
			$this->load->view('website/pages/bank/credit_unions',array("data"=>$data,
			"city_name"=>$city_name,"state_code"=>$state_code));
			$this->load->view('website/layout/footer');
		}
		
		else{
			$this->load->view('website/pages/page_not_found');
		}
	  }
	  
	public function best_cd_rates()
	{
		$non_jumbo_rates = $this->validator->get_best_cd_rates('Jumbo Deposits');
		if($non_jumbo_rates)
		{
			$jumbo_rates = $this->validator->get_best_cd_rates('Non-Jumbo Deposits');
			 if($jumbo_rates)
			 {
				$this->load->view('website/layout/header');
				$this->load->view('website/pages/bank/best_cd_rates',
				array("non_jumbo_rates"=>$non_jumbo_rates,"jumbo_rates"=>$jumbo_rates,"non_jumbo_rates"));
				$this->load->view('website/layout/footer');
			 }
		} 
	} 
	public function top_100_banks()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/bank/top-100-banks');
		$this->load->view('website/layout/footer');
  	}
	public function calculator()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/bank/calculators');
		$this->load->view('website/layout/footer');
  	}
	public function calculator_detail($page)
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/bank/calculator_detail',array("page"=>$page));
		$this->load->view('website/layout/footer');
  	}
	
}