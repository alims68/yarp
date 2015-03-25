<?php
class accounting extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->lang->load('admin', 'persian');
		$this->load->helper('form');
		$this->load->model('number_model');
		

        $this->auth->restrict('Admin.Accounting.View',"dashboard");

		// If the user is already logged in, go home.
        if ($this->auth->is_logged_in() == false) {
            Template::redirect('/');
        }
	}

	//--------------------------------------------------------------------

	public function index()
	{

        $this->load->library('pagination');
        //pagination
        $config['base_url'] = base_url('accounting/index');
        if($this->current_user->role_id == 2)
        {
            $this->db->where('agencya_id', $this->current_user->id);
        }
        if($this->current_user->role_id == 3)
        {
            $this->db->where('agencyb_id', $this->current_user->id);
        }
        if($this->current_user->role_id == 4)
        {
            $this->db->where('estate_id', $this->current_user->id);
        }
        if($this->current_user->role_id == 5)
        {
            $this->db->where('user_id', $this->current_user->id);
        }
        $this->db->join('accounting', 'users.id = accounting.user_id', 'right');
        $this->db->group_by(array("users.id", "accounting.user_id"));
        $config['total_rows'] = $this->db->get('users')->num_rows();
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = FALSE;
        $config['per_page'] = 20;
        $config['num_links'] = 10;
        $config['last_link'] =  $this->lang->line('last_link');
        $config['first_link'] = $this->lang->line('first_link');
        $config['next_link'] =  $this->lang->line('next_link');
        $config['prev_link'] = $this->lang->line('prev_link');
        $this->pagination->initialize($config);
        if($this->current_user->role_id == 2)
        {
            $this->db->where('agencya_id', $this->current_user->id);
        }
        if($this->current_user->role_id == 3)
        {
            $this->db->where('agencyb_id', $this->current_user->id);
        }
        if($this->current_user->role_id == 4)
        {
            $this->db->where('estate_id', $this->current_user->id);
        }
        if($this->current_user->role_id == 5)
        {
            $this->db->where('user_id', $this->current_user->id);
        }
        $this->db->select('users.id, users.role_id, users.username, users.name, users.family, accounting.amount, accounting.user_id, accounting.description, accounting.date');
        $this->db->from('users');
        $this->db->join('accounting', 'users.id = accounting.user_id', 'right');
        $this->db->group_by(array("users.id", "accounting.user_id"));
        $this->db->order_by("users.id","asce");
        $this->db->limit($config['per_page'],$this->db->escape_str($this->uri->segment(3)));
        $query = $this->db->get();
        if($query->result())
        {
          Template::set('query', $query->result());
        }
        Template::set_theme('melker-admin');
    
        Template::set('title', $this->lang->line('accounting'));
        Template::set_view();
        Template::render();
	}

	//--------------------------------------------------------------------

}