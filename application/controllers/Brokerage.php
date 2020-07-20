<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brokerage extends CI_Controller {

	public function brokerage_overview()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/brokerage/brokerage_overview');
		$this->load->view('website/layout/footer');
    }

}