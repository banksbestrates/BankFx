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
	public function student_loan_rates()
	{
			$loan_data = $this->LoanModel->get_student_loan_rate_content();
			if($loan_data['Status'])
			{
				$loan_data = $loan_data['data'];
			}else{
				$loan_data="";
			}
			$this->load->view('website/layout/header');
			$this->load->view('website/pages/loan/student_loan_rates', array("page_data"=>$loan_data));
			$this->load->view('website/layout/footer');
	}
	
	public function personal_loan()
	{
		$loan_data = $this->LoanModel->get_personal_loan();
		if($loan_data['Status'])
		{
			$loan_data = $loan_data['data'];
		}else{
			$loan_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/personal_loan',array("page_data"=>$loan_data));
		$this->load->view('website/layout/footer');
	}
	public function personal_loan_rate()
	{
		$loan_data = $this->LoanModel->get_personal_loan_rate_content();
		if($loan_data['Status'])
		{
			$loan_data = $loan_data['data'];
		}else{
			$loan_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/personal_loan_rate', array("page_data"=>$loan_data));
		$this->load->view('website/layout/footer');
	}
	
	public function auto_loan()
	{
			$loan_data = $this->LoanModel->get_auto_loan();
			if($loan_data['Status'])
			{
				$loan_data = $loan_data['data'];
			}else{
				$loan_data="";
			}
			$this->load->view('website/layout/header');
			$this->load->view('website/pages/loan/auto_loan',array("page_data"=>$loan_data));
			$this->load->view('website/layout/footer');
	}
	
	public function auto_loan_rates()
	{
		$loan_data = $this->LoanModel->get_auto_loan_rate_content();
		if($loan_data['Status'])
		{
			$loan_data = $loan_data['data'];
		}else{
			$loan_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/auto_loan_rate', array("page_data"=>$loan_data));
		$this->load->view('website/layout/footer');
	}

	public function student_loan()
	{
			$loan_data = $this->LoanModel->get_student_loan();
			if($loan_data['Status'])
			{
				$loan_data = $loan_data['data'];
			}else{
				$loan_data="";
			}
			$this->load->view('website/layout/header');
			$this->load->view('website/pages/loan/student_loan',array("page_data"=>$loan_data));
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
	
	public function loan_calculator()
	{
		$loan_data = $this->LoanModel->get_loan_calculator_content();
		if($loan_data['Status'])
		{
			$loan_data = $loan_data['data'];
		}else{
			$loan_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/loan_calculator', array("page_data"=>$loan_data));
		$this->load->view('website/layout/footer');
	}
	public function amortization_schedule_calculator()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/amortization_schedule_calculator');
		$this->load->view('website/layout/footer');
	}
	public function saving_goal_calculator()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/saving_goal_calculator');
		$this->load->view('website/layout/footer');
	}
	public function simple_savings_calculator()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/simple_savings_calculator');
		$this->load->view('website/layout/footer');
	}
	

	public function debt_consolidation()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/debt_consolidation');
		$this->load->view('website/layout/footer');
	}

	public function article_detail($id)
	{
		$article_data = $this->LoanModel->get_article_detail($id);
		if($article_data['Status'])
		{
			
			$article_data = $article_data['data'];
		}else{
			$article_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/loan/article_detail',array("article_data"=>$article_data));
		$this->load->view('website/layout/footer');
    }
	 
}