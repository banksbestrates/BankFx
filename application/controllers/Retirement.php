<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retirement extends CI_Controller {

	public function retirement_overview()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/retirement/retirement_overview');
		$this->load->view('website/layout/footer');
    }

}