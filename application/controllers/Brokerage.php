<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brokerage extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
	$this->load->model('BrokerageModel');	
	}
	public function brokerage_overview()
	{
		$brokerage_data = $this->BrokerageModel->get_brokerage_overview();
		if($brokerage_data['Status'])
		{
			$brokerage_data = $brokerage_data['data'];
		}else{
			$brokerage_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/brokerage/brokerage_overview',array("page_data"=>$brokerage_data));
		$this->load->view('website/layout/footer');
	}
	
	public function best_online_brokerage()
	{
		$brokerage_data = $this->BrokerageModel->get_best_online_broker_data();
		if($brokerage_data['Status'])
		{
			$brokerage_data = $brokerage_data['data'];
		}else{
			$brokerage_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/brokerage/best_online_brokerage',array("page_data"=>$brokerage_data));
		$this->load->view('website/layout/footer');
	}
	
	public function best_beginner_broker()
	{
		$brokerage_data = $this->BrokerageModel->get_beginner_broker_data();
		if($brokerage_data['Status'])
		{
			$brokerage_data = $brokerage_data['data'];
		}else{
			$brokerage_data="";
		}
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/brokerage/best_beginner_broker',array("page_data"=>$brokerage_data));
		$this->load->view('website/layout/footer');
    }

}