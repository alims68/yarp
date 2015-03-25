<?php
class register_price extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->lang->load('admin', 'persian');
		$this->load->helper('form');
		$this->load->model('number_model');
		
		$this->auth->restrict('Admin.Accounting.Registerprice',"dashboard");
		
		// If the user is already logged in, go home.
        if ($this->auth->is_logged_in() == false) {
            Template::redirect('/');
        }
	}

	//--------------------------------------------------------------------

	public function index()
	{
		Template::set_theme('melker-admin');
		$config = array(
           array(
                 'field'   => 'agencya_value',
                 'label'   => 'نمایندگی نوع A',
                 'rules'   => 'required'
              ),
           array(
                 'field'   => 'agencyb_value',
                 'label'   => 'نمایندگی نوع B',
                 'rules'   => 'required'
              ),
           array(
                 'field'   => 'estate_value',
                 'label'   => 'نمایندگی',
                 'rules'   => 'required'
              ),
           array(
                 'field'   => 'user_value',
                 'label'   => 'کاریر',
                 'rules'   => 'required'
              ),
        );
		
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run()) {
			$data_price = array(
	        	// 'value' 				=> $this->input->post('value'),
	        	// 'agencya' 				=> $this->input->post('agencya'),
	        	'agencya_value' 		=> $this->input->post('agencya_value'),
	        	// 'agencyb' 				=> $this->input->post('agencyb'),
	        	'agencyb_value' 		=> $this->input->post('agencyb_value'),
	        	// 'estate' 				=> $this->input->post('estate'),
	        	'estate_value' 			=> $this->input->post('estate_value'),
	        	// 'user' 					=> $this->input->post('user'),
	        	'user_value' 			=> $this->input->post('user_value')
	        );
	        $this->db->where('option', 'price');
        	$this->db->update('setting', $data_price);
	        Template::set_message($this->lang->line('register_price_updated'), 'success');
			Template::redirect('accounting');
		}

		$this->db->where('option', 'price');
		$this->db->select();
		$query = $this->db->get('setting');

		if($query->result())
		{

			$row = $query->first_row();

			Template::set('row', $row);
			Template::set('title', $this->lang->line('register_price'));
			Template::render();
		}
	}

	//--------------------------------------------------------------------

}