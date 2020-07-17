<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {


	private function check_admin_logged_in()
    {
        if ($this->session->userdata('bankfx_admin_login')) {
            $this->admin_id = $this->session->userdata('admin_id');
            $this->admin_name = $this->session->userdata('admin_name');
            $this->admin_email = $this->session->userdata('admin_email');
         
        } else {
            redirect('admin/login', 'refresh');
        }
    }
	public function login()
	{
		
		$this->load->view('admin_panel/login');
    }

    public function dashboard()
    {     
        $this->check_admin_logged_in();
        $data = array(
            "admin_id"=>$this->admin_id
        );
    
		$this->load->view('admin_panel/layout/header',array("admin_data"=>$data));
		$this->load->view('admin_panel/index');
		$this->load->view('admin_panel/layout/footer');
    }

    public function profile()
    {     
        $this->check_admin_logged_in();

        $data = array(
            "admin_id"=>$this->admin_id
        );
        
        $this->load->view("admin_panel/layout/header",array("admin_data"=>$data));     
        $this->load->view("admin_panel/profile");     
        $this->load->view("admin_panel/layout/footer");     
    }

	public function page_content($page_type)
	{
        $this->check_admin_logged_in();
        $data = array(
            "admin_id"=>$this->admin_id,
            "page_type"=>$page_type
        ); 
        $this->load->view("admin_panel/layout/header",array("admin_data"=>$data)); 
		$this->load->view('admin_panel/website_content/about_us');
		$this->load->view('admin_panel/layout/footer');
    }
	public function contact_us()
	{
        $this->check_admin_logged_in();
        $data = array(
            "admin_id"=>$this->admin_id,  
        ); 
        $this->load->view("admin_panel/layout/header",array("admin_data"=>$data)); 
		$this->load->view('admin_panel/website_content/contact_us');
		$this->load->view('admin_panel/layout/footer');
    }
	public function mortgage_articles()
	{
        $this->check_admin_logged_in();
        $data = array(
            "admin_id"=>$this->admin_id,  
        ); 
        $this->load->view("admin_panel/layout/header",array("admin_data"=>$data)); 
		$this->load->view('admin_panel/mortgage/related_articles');
		$this->load->view('admin_panel/layout/footer');
    }

    
    
}