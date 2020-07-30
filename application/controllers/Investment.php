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
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/investing/best_investment');
		$this->load->view('website/layout/footer');
    }

    
    
}