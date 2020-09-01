<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retirement extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('RetirementModel');	
	}
	public function retirement_overview()
	{
		$retirement_data = $this->RetirementModel->get_retirement_overview();
		if($retirement_data['Status'])
		{
			$retirement_data = $retirement_data['data'];
		}else{
			$retirement_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/retirement/retirement_overview',array("page_data"=>$retirement_data));
		$this->load->view('website/layout/footer');
    }
	public function article_detail($id)
	{
		$article_data = $this->RetirementModel->get_article_detail($id);;
		if($article_data['Status'])
		{
			
			$article_data = $article_data['data'];
		}else{
			$article_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/retirement/article_detail',array("article_data"=>$article_data));
		$this->load->view('website/layout/footer');
    }

}