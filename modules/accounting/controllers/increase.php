<?php
class increase extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->lang->load('admin', 'persian');
		$this->load->helper('form');
		$this->load->model('number_model');
		

		// $this->auth->restrict('Admin.Accounting.Increase',"dashboard");


		// If the user is already logged in, go home.
        if ($this->auth->is_logged_in() == false) {
            Template::redirect('/');
        }
	}

	//--------------------------------------------------------------------

	public function index()
	{
		Template::set_theme('yarp');

		// print_r($this->input->post());
		// exit();

		Template::set('title', $this->lang->line('online_pay'));
		Template::render();
	}

	//--------------------------------------------------------------------

}