<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('InsuranceModel');	
    }

	public function insurance_overview()
	{
        $insurance_data = $this->InsuranceModel->get_insurance_overview();
		if($insurance_data['Status'])
		{
			$insurance_data = $insurance_data['data'];
		}else{
			$insurance_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/insurance/insurance_overview',array("page_data"=>$insurance_data));
		$this->load->view('website/layout/footer');
    }
	public function homeowner_insurance()
	{
		$insurance_data = $this->InsuranceModel->get_homeowner_insurance();
		if($insurance_data['Status'])
		{
			$insurance_data = $insurance_data['data'];
		}else{
			$insurance_data="";
		}

		$this->load->view('website/layout/header');
		$this->load->view('website/pages/insurance/homeowner_insurance',array("page_data"=>$insurance_data));
		$this->load->view('website/layout/footer');
    }
	public function auto_insurance()
	{
		$insurance_data = $this->InsuranceModel->get_auto_insurance();
		if($insurance_data['Status'])
		{
			$insurance_data = $insurance_data['data'];
		}else{
			$insurance_data="";
		}

		$this->load->view('website/layout/header');
		$this->load->view('website/pages/insurance/auto_insurance',array("page_data"=>$insurance_data));
		$this->load->view('website/layout/footer');
    }
	public function life_insurance()
	{
		$insurance_data = $this->InsuranceModel->get_life_insurance();
		if($insurance_data['Status'])
		{
			$insurance_data = $insurance_data['data'];
		}else{
			$insurance_data="";
		}

		$this->load->view('website/layout/header');
		$this->load->view('website/pages/insurance/life_insurance',array("page_data"=>$insurance_data));
		$this->load->view('website/layout/footer');
    }
	public function health_insurance()
	{
		$insurance_data = $this->InsuranceModel->get_health_insurance();
		if($insurance_data['Status'])
		{
			$insurance_data = $insurance_data['data'];
		}else{
			$insurance_data="";
		}

		$this->load->view('website/layout/header');
		$this->load->view('website/pages/insurance/health_insurance',array("page_data"=>$insurance_data));
		$this->load->view('website/layout/footer');
    }

}