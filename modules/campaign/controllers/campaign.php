<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Campaign controller
 */
class Campaign extends Admin_Controller
{
    protected $permissionCreate = 'Campaign.Campaign.Create';
    protected $permissionDelete = 'Campaign.Campaign.Delete';
    protected $permissionEdit   = 'Campaign.Campaign.Edit';
    protected $permissionView   = 'Campaign.Campaign.View';

    /**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('campaign/campaign_model');
        $this->lang->load('campaign');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
			Assets::add_css('jquery-ui-timepicker.css');
			Assets::add_js('jquery-ui-timepicker-addon.js');
        

		Assets::add_module_js('campaign', 'campaign.js');
	}

	/**
	 * Display a list of campaign data.
	 *
	 * @return void
	 */
	public function index($offset = 0)
	{
        // Deleting anything?
		if (isset($_POST['delete'])) {
            $this->auth->restrict($this->permissionDelete);
			$checked = $this->input->post('checked');
			if (is_array($checked) && count($checked)) {

                // If any of the deletions fail, set the result to false, so
                // failure message is set if any of the attempts fail, not just
                // the last attempt

				$result = true;
				foreach ($checked as $pid) {
					$deleted = $this->campaign_model->delete($pid);
                    if ($deleted == false) {
                        $result = false;
                    }
				}
				if ($result) {
					Template::set_message(count($checked) . ' ' . lang('campaign_delete_success'), 'success');
				} else {
					Template::set_message(lang('campaign_delete_failure') . $this->campaign_model->error, 'error');
				}
			}
		}

        $this->load->library('pagination');

        
        
        $where = array("deleted" => 0);


        $this->campaign_model->limit($this->limit, $offset)
                         ->where($where)
                         ->order_by("id","desc");

		$records = $this->campaign_model->find_all();

		Template::set('records', $records);

		$indexUrl = site_url(SITE_AREA . '/content/campaign/index') . '/';

		$this->pager['base_url']    = "{$indexUrl}/";
		$this->pager['per_page'] 	= $this->limit;
        $this->pager['total_rows']  = $this->campaign_model->where($where)->count_all();
		$this->pager['uri_segment']	= 5;
		$this->pager['full_tag_open']	= '<ul class="pagination">';
		$this->pager['full_tag_close']	= '</ul>';
		$this->pager['next_link']	= '<i class="fa fa-angle-double-left"></i>';
		$this->pager['prev_link']	= '<i class="fa fa-angle-double-right"></i>';
		$this->pagination->initialize($this->pager);

		Template::set('title', lang('campaign_manage'));

		Template::set_theme('yarp');
		// Template::set_view('content/create');
		Template::render('index');
	}
    
}