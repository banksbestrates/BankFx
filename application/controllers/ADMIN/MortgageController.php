<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MortgageController extends CI_Controller {


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
	
    public function mortgage_overview()
    {     
        $this->check_admin_logged_in();
        $data = array(
            "admin_id"=>$this->admin_id
        );
    
		$this->load->view('admin_panel/layout/header',array("admin_data"=>$data));
		$this->load->view('admin_panel/mortgage/mortgage_overview');
		$this->load->view('admin_panel/layout/footer');
    }

    public function best_mortgage_rates()
    {     
        $this->check_admin_logged_in();
        $data = array(
            "admin_id"=>$this->admin_id
        );
    
		$this->load->view('admin_panel/layout/header',array("admin_data"=>$data));
		$this->load->view('admin_panel/mortgage/best_mortgage_rates');
		$this->load->view('admin_panel/layout/footer');
    }

    public function best_refinance_rates()
    {     
        $this->check_admin_logged_in();
        $data = array(
            "admin_id"=>$this->admin_id
        );
    
		$this->load->view('admin_panel/layout/header',array("admin_data"=>$data));
		$this->load->view('admin_panel/mortgage/best_refinance_rates');
		$this->load->view('admin_panel/layout/footer');
    }

    public function house_afford()
    {     
        $this->check_admin_logged_in();
        $data = array(
            "admin_id"=>$this->admin_id
        );
		$this->load->view('admin_panel/layout/header',array("admin_data"=>$data));
		$this->load->view('admin_panel/mortgage/house_afford');
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