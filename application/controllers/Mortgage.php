<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mortgage extends CI_Controller {

	public function mortgage_overview()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/mortgage_overview');
		$this->load->view('website/layout/footer');
    }
    public function mortgage_rates()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/mortgage_rates');
		$this->load->view('website/layout/footer');
    }
    public function refinance_rates()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/refinance_rate');
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
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/house_afford');
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
	
}