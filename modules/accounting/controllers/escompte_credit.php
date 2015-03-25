<?php
class escompte_credit extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->lang->load('admin', 'persian');
		$this->load->helper('form');
		$this->load->model('number_model');


		$this->auth->restrict('Admin.Accounting.Escompte_credit',"dashboard");
		
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
           // array(
           //       'field'   => 'value',
           //       'label'   => 'قیمت',
           //       'rules'   => 'required'
           //    ),
           array(
                 'field'   => 'agencya',
                 'label'   => 'نمایندگی نوع A',
                 'rules'   => 'required'
              ),
           array(
                 'field'   => 'agencyb',
                 'label'   => 'نمایندگی نوع B',
                 'rules'   => 'required'
              ),
           array(
                 'field'   => 'estate',
                 'label'   => 'نمایندگی',
                 'rules'   => 'required'
              ),
           array(
                 'field'   => 'user',
                 'label'   => 'کاربر',
                 'rules'   => 'required'
              ),
        );
		
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run()) {
			// $value=$this->input->post('value')/100;
			$data_escompte = array(
	        	// 'value' 				=> $this->input->post('value'),
	        	'agencya' 				=> $this->input->post('agencya'),
	        	// 'agencya_value' 		=> $value*$this->input->post('agencya'),
	        	'agencyb' 				=> $this->input->post('agencyb'),
	        	// 'agencyb_value' 		=> $value*$this->input->post('agencyb'),
	        	'estate' 				=> $this->input->post('estate'),
	        	// 'estate_value' 			=> $value*$this->input->post('estate'),
	        	'user' 					=> $this->input->post('user'),
	        	// 'user_value' 			=> $value*$this->input->post('user')
	        );
	        $this->db->where('option', 'escompte_credit');
        	$this->db->update('setting', $data_escompte);
	        Template::set_message($this->lang->line('escompte_updated'), 'success');
			Template::redirect('accounting');
		}

		$this->db->where('option', 'escompte_credit');
		$this->db->select();
		$query = $this->db->get('setting');

		if($query->result())
		{
			$row = $query->first_row();

			Template::set('row', $row);
			Template::set('title', $this->lang->line('escompte_credit'));
			Template::render();
		}
	}

	//--------------------------------------------------------------------

}