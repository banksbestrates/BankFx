<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/home');
		$this->load->view('website/layout/footer');
    }
	
	public function mortgage_rates()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/mortgage_rates');
		$this->load->view('website/layout/footer');
    }
	public function mortgage_fha()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/mortgage_fha');
		$this->load->view('website/layout/footer');
    }
	public function mortgage_va_loan()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/mortgage_va_loan');
		$this->load->view('website/layout/footer');
    }
	public function mortgage_jumbo_loan()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/mortgage_jumbo_loan');
		$this->load->view('website/layout/footer');
    }
	public function mortgage_arm_loan()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/mortgage_arm_loan');
		$this->load->view('website/layout/footer');
    }
    
    
}