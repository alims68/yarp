<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Content controller
 */
class Add extends Admin_Controller
{
    protected $permissionCreate = 'Campaign.Content.Create';
    protected $permissionDelete = 'Campaign.Content.Delete';
    protected $permissionEdit   = 'Campaign.Content.Edit';
    protected $permissionView   = 'Campaign.Content.View';

    /**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		
        $this->auth->restrict($this->permissionView);
		$this->load->model('campaign/campaign_model');
        $this->lang->load('campaign');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
			Assets::add_css('jquery-ui-timepicker.css');
			Assets::add_js('jquery-ui-timepicker-addon.js');
            $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");
        
		Template::set_block('sub_nav', 'content/_sub_nav');

		Assets::add_module_js('campaign', 'campaign.js');
	}
    
    /**
	 * Create a campaign object.
	 *
	 * @return void
	 */
	public function index()
	{
		$this->auth->restrict($this->permissionCreate);
        
		if (isset($_POST['save'])) {
			if ($insert_id = $this->save_campaign()) {
				log_activity($this->auth->user_id(), lang('campaign_act_create_record') . ': ' . $insert_id . ' : ' . $this->input->ip_address(), 'campaign');
				Template::set_message(lang('campaign_create_success'), 'success');

				redirect('/campaign');
			}

            // Not validation error
			if ( ! empty($this->campaign_model->error)) {
				Template::set_message(lang('campaign_create_failure') . $this->campaign_model->error, 'error');
            }
		}

		Template::set('title', lang('campaign_action_create'));

		Template::set_theme('yarp');
		Template::set_view('add/add');
		Template::render('index');
	}

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/**
	 * Save the data.
	 *
	 * @param string $type Either 'insert' or 'update'.
	 * @param int	 $id	The ID of the record to update, ignored on inserts.
	 *
	 * @return bool|int An int ID for successful inserts, true for successful
     * updates, else false.
	 */
	private function save_campaign($type = 'insert', $id = 0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

        // Validate the data
        $this->form_validation->set_rules($this->campaign_model->get_validation_rules());
        if ($this->form_validation->run() === false) {
            return false;
        }

		// Make sure we only pass in the fields we want
		
		$data = $this->campaign_model->prep_data($this->input->post());

		$data['state'] = serialize($data['state']);

        // Additional handling for default values should be added below,
        // or in the model's prep_data() method

        $return = false;
		if ($type == 'insert') {
			$id = $this->campaign_model->insert($data);

			if (is_numeric($id)) {
				$return = $id;
			}
		} elseif ($type == 'update') {
			$return = $this->campaign_model->update($id, $data);
		}

		return $return;
	}
}