<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

	public function bank_overview()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/bank/bank_overview');
		$this->load->view('website/layout/footer');
    }
	public function best_banks()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/bank/best_banks');
		$this->load->view('website/layout/footer');
	}
	public function best_bank_reviews()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/bank/best_bank_reviews');
		$this->load->view('website/layout/footer');
    }
	public function branch_locator()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/bank/branch_locator');
		$this->load->view('website/layout/footer');
    }
	public function bank_state()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/bank/bank_state');
		$this->load->view('website/layout/footer');
    }
	public function bank_review()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/bank/bank_review');
		$this->load->view('website/layout/footer');
    }
}