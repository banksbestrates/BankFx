<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Credit extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model('CreditModel');	
    }

    public function credit_overview()
	{
        $credit_data = $this->CreditModel->get_credit_overview();
		if($credit_data['Status'])
		{
			$credit_data = $credit_data['data'];
		}else{
			$credit_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/credit_card/credit_overview',array("page_data"=>$credit_data));
		$this->load->view('website/layout/footer');
    }
    
    public function best_credit_cards()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/credit_card/best_credit_cards');
		$this->load->view('website/layout/footer');
    }
    public function card_review()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/credit_card/card_review');
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
		$article_data = $this->CreditModel->get_article_detail($id);
		if($article_data['Status'])
		{
			
			$article_data = $article_data['data'];
		}else{
			$article_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/credit_card/article_detail',array("article_data"=>$article_data));
		$this->load->view('website/layout/footer');
    }
	
}