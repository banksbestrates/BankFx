<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	public function login()
	{
		$this->load->view('admin_panel/login');
    }
    
	public function dashboard()
	{
		$this->load->view('admin_panel/layout/header');
		$this->load->view('admin_panel/index');
		$this->load->view('admin_panel/layout/footer');
    }
	public function profile()
	{
		$this->load->view('admin_panel/layout/header');
		$this->load->view('admin_panel/profile');
		$this->load->view('admin_panel/layout/footer');
    }
	public function about_us()
	{
		$this->load->view('admin_panel/layout/header');
		$this->load->view('admin_panel/website_content/about_us');
		$this->load->view('admin_panel/layout/footer');
    }
	public function terms_conditions()
	{
		$this->load->view('admin_panel/layout/header');
		$this->load->view('admin_panel/index');
		$this->load->view('admin_panel/layout/footer');
    }
	public function user_list()
	{
		$this->load->view('admin_panel/layout/header');
		$this->load->view('admin_panel/user/user_list');
		$this->load->view('admin_panel/layout/footer');
    }
    
    
}