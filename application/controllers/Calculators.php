<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calculators extends CI_Controller {
	public function __construct()
	{
            parent::__construct();
            $this->load->model('CalculatorModel');	
				
	}

	public function all_calculators()
	{
        $cal_data = $this->CalculatorModel->get_cal_overview_data();
		if($cal_data['Status'])
		{
			$cal_data = $cal_data['data'];
		}else{
			$cal_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/calculators/all_calculators',array("page_data"=>$cal_data));
		$this->load->view('website/layout/footer');
    }
      
	public function calculator_detail($page)
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/calculators/calculator_detail',array("page"=>$page));
		$this->load->view('website/layout/footer');
  	}
	
}