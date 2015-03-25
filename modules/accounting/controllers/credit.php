<?php
class credit extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->lang->load('admin', 'persian');
		$this->load->helper('form');
		$this->load->model('number_model');

		$this->auth->restrict('Admin.Accounting.Credit',"dashboard");
		
		
		// If the user is already logged in, go home.
        if ($this->auth->is_logged_in() == false) {
            Template::redirect('/');
        }
	}

	//--------------------------------------------------------------------

	public function index($id)
	{
		$this->db->where('option', 'escompte_credit');
		$query = $this->db->get('setting');
		if ($query->result()) {
			$escompte['agencya'] = $query->row()->agencya;
			$escompte['agencyb'] = $query->row()->agencyb;
			$escompte['estate'] = $query->row()->estate;
			$escompte['user'] = $query->row()->user;
		}
		Template::set_theme('melker-admin');
		$config = array(
           array(
                 'field'   => 'amount',
                 'label'   => 'قیمت',
                 'rules'   => 'required'
              ),
           array(
                 'field'   => 'amount_sign',
                 'label'   => 'ماهیت',
                 'rules'   => 'required'
              ),
           array(
                 'field'   => 'type',
                 'label'   => 'نوع',
                 'rules'   => 'required'
              ),
        );
		
		$this->form_validation->set_rules($config);
	if ($this->current_user->role_id == 1 AND $this->input->post('amount_sign') != 3) {
		if ($this->form_validation->run()) {
			if ($this->input->post('amount_sign')==1) {
				# افزایش
				$amount = abs($this->input->post('amount'));
			}
			if ($this->input->post('amount_sign')==2) {
				# کاهش
				$amount = "-".abs($this->input->post('amount'));
			}

			$data_credit = array(
	        	'user_id' 			=> $id,
	        	'amount' 			=> $amount,
	        	'wallet' 			=> $this->input->post('type'),
	        	'date' 				=> date("Y-m-d H:m:s"),
	        	'description' 		=> $this->input->post('description')
	        );
			if ($this->db->insert('accounting', $data_credit)) {
				add_credit($id,$amount);
	        }
	        Template::set_message($this->lang->line('creadit_complate'), 'success');
			Template::redirect('accounting');
		}
	}

	if( $this->input->post('amount_sign') == 3 ) {
		if ($this->form_validation->run()) {
			$amount = abs($this->input->post('amount'));
			$amount_percent = $amount / 100;
			if( $this->current_user->role_id == 1 ){
				$data_credit = array(
		        	'wallet' 			=> $this->input->post('type')
	        	);
			}else{
				$data_credit = array(
		        	'wallet' 			=> 1
	        	);
			}

			$data_credit = array(
	        	'user_id' 			=> $id,
	        	'amount' 			=> $amount,
	        	'date' 				=> date("Y-m-d H:m:s"),
	        	'description' 		=> $this->input->post('description')
	        );
	        if ($this->db->insert('accounting', $data_credit)) {
				add_credit($id,$amount);
	        }

			$this->db->where('id', $id);
			$query = $this->db->get('users');
			if ($query->result()) {
				$user['agencya'] = $query->row()->agencya_id;
				$user['agencyb'] = $query->row()->agencyb_id;
				$user['estate'] = $query->row()->estate_id;
			}

			$description = $this->input->post('description').' - '.$this->current_user->id;
			$escompte_price = $amount_percent * $escompte['agencya'];
			if ( $escompte_price > 0 AND $user['agencya'] != 0) {
				register_pay_userid($user['agencya'], $escompte_price, 0, $description);
			}
			$escompte_price = $amount_percent * $escompte['agencyb'];
			if ($escompte_price > 0 AND $user['agencyb'] != 0) {
				register_pay_userid($user['agencyb'], $escompte_price, 0, $description);
			}
			$escompte_price = $amount_percent * $escompte['estate'];
			if ($escompte_price > 0 AND $user['estate'] != 0) {
				register_pay_userid($user['estate'], $escompte_price, 0, $description);
			}

			$description = $this->input->post('decrease_user_debit').$id;
			$data_credit = array(
	        	'user_id' 			=> $this->current_user->id,
	        	'amount' 			=> '-'.$amount,
	        	'wallet' 			=> 0,
	        	'date' 				=> date("Y-m-d H:m:s"),
	        	'description' 		=> $this->input->post('description')
	        );
	        if ( $this->db->insert('accounting', $data_credit) ) {
				subtract_credit($this->current_user->id,$amount);
	        }

	        Template::set_message($this->lang->line('creadit_complate'), 'success');
			Template::redirect('accounting');
		}
	}

		if(empty($id))
		{
			Template::redirect('accounting');
		}

		$this->db->where('id', $id);
		$this->db->select();
		$query = $this->db->get('users');

		if($query->result())
		{
			$row = $query->first_row();

			Template::set('row', $row);
			Template::set('role', $this->current_user->role_id );
			Template::set('title', $this->lang->line('credit'));
			Template::render();
		}
		else{
			Template::set_message($this->lang->line('user_not_found'), 'danger');
			Template::redirect('accounting');
		}
	}

	//--------------------------------------------------------------------

}