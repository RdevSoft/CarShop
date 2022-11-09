<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * carshop admin Controller
 *
 * This class handles user account related functionality
 *
 * @package		carshop404
 * @subpackage	carshop404Core
 * @author		RdevSoft
 * @link		
 */

class carshop404_core extends CI_controller {

	var $active_theme = '';
	public function __construct()
	{
		parent::__construct();
		is_installed(); #defined in auth helper		
		$this->active_theme = get_active_theme();
	}

	public function index()
	{
		$this->output->set_status_header('404');
		$data['content'] 	= load_view('show/404_view','',TRUE);
        load_template($data,$this->active_theme,'template_view');
	}
	

}

/* End of file install.php */
/* Location: ./application/modules/show/controllers/carshop404core.php */