<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * carshop Controller
 *
 * This class handles only carshop related functionality
 *
 * @package		Admin
 * @subpackage	carshop
 * @author		RdevSoft
 * @link		
 */

class carshop_core extends CI_Controller
{

	var $per_page = 10;



	public function __construct()

	{

		parent::__construct();

		is_installed(); #defined in auth helper

		checksavedlogin(); #defined in auth helper

		if (!is_admin() && $this->session->userdata('user_type') != 2) {

			if (count($_POST) <= 0)

				$this->session->set_userdata('req_url', current_url());

			redirect(site_url('admin/auth'));
		}



		$this->per_page = get_per_page_value_admin(); #defined in auth helper

		$this->load->helper('text');

		$this->load->model('show/show_model');

		$this->load->model('admin/carshop_model');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	}



	public function index()

	{

		if (!is_admin()) {
			$this->allcarsdealer();
		} else
			$this->allcars();
	}





	#approve a post

	public function approvepost($page = '0', $from = 'activeposts', $id = '', $confirmation = '')

	{

		if (!is_admin()) {
			echo 'You don\'t have permission to access this page';
			die;
		}

		if (constant("ENVIRONMENT") == 'demo') {
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
		} else {

			$this->carshop_model->update_post_by_id(array('status' => 1), $id);

			$this->session->set_flashdata('msg', '<div class="alert alert-success">Post Approved</div>');
		}


		redirect(site_url('admin/carshop/' . $from . '/' . $page));
	}



	#delete a properties

	public function deletecar($page = '0', $id = '', $confirmation = '')

	{

		if (!is_admin() && !is_agent()) {
			echo 'You don\'t have permission to access this page';
			die;
		}

		if ($confirmation == '') {

			$data['content'] = $this->load->view('admin/confirmation_view', array('id' => $id, 'url' => site_url('admin/carshop/deletecar/' . $page)), TRUE);

			$this->load->view('admin/template/template_view', $data);
		} else {

			if ($confirmation == 'yes') {
				if (constant("ENVIRONMENT") == 'demo') {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
				} else {

					$this->carshop_model->delete_post_by_id($id);

					$this->session->set_flashdata('msg', '<div class="alert alert-success">Car Deleted</div>');
				}
			}

			if (is_admin())
				redirect(site_url('admin/carshop/allcars/' . $page));

			else
				redirect(site_url('admin/carshop/allcarsdealer/' . $page));
		}
	}



	public function approvecar($page = '0', $id = '', $confirmation = '')

	{

		if (!is_admin()) {
			echo 'You don\'t have permission for this action';
			die;
		}

		if (constant("ENVIRONMENT") == 'demo') {
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
		} else {

			$this->carshop_model->update_post_by_id(array('status' => 1), $id);

			$this->session->set_flashdata('msg', '<div class="alert alert-success">Post Approved</div>');
		}

		redirect(site_url('admin/carshop/allcars/' . $page));
	}





	#feature a service

	public function featurepost($page = '0', $id = '', $confirmation = '')

	{
		if (!is_admin()) {
			echo 'You don\'t have permission for this action';
			die;
		}

		if (constant("ENVIRONMENT") == 'demo') {
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
		} else {

			$this->carshop_model->update_post_by_id(array('featured' => 1), $id);

			$this->session->set_flashdata('msg', '<div class="alert alert-success">Post Featured</div>');
		}

		redirect(site_url('admin/carshop/allcars/' . $page));
	}

	public function featurepayment($page = '0', $id = '')

	{
		$this->load->helper('date');
		$datestring = "%Y-%m-%d";
		$time = time();
		$request_date = mdate($datestring, $time);

		$data = array();
		$data['unique_id']      = uniqid();
		$data['amount'] 		= get_settings('carshop_settings', 'feature_charge', '0');
		$data['currency']   	= get_settings('paypal_settings', 'currency', 'USD');
		$data['daylimit']   	= get_settings('carshop_settings', 'feature_day_limit', '0');
		$data['requestdate']    = $request_date;
		$data['activation_date'] = '';
		$data['expirtion_date'] = '';
		$data['user_id']      	= $this->session->userdata('user_id');
		$data['medium']      	= 'paypal';
		$data['is_active']      = 0;

		$this->session->set_userdata('unique_id', $data['unique_id']);
		add_post_meta($id, 'featurepayment_' . $data['unique_id'], json_encode($data));

		$value['post'] 		= $this->carshop_model->get_car_by_id($id);

		$data['title'] 		= 'Pay for feature';

		$data['content']  	= $this->load->view('admin/carshop/feature_payment_view', $value, TRUE);

		$this->load->view('admin/template/template_view', $data);
	}



	#feature a service

	public function removefeaturepost($page = '0', $id = '', $confirmation = '')

	{

		if (!is_admin()) {
			echo 'You don\'t have permission for this action';
			die;
		}

		if (constant("ENVIRONMENT") == 'demo') {
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
		} else {

			$this->carshop_model->update_post_by_id(array('featured' => 0), $id);

			$this->session->set_flashdata('msg', '<div class="alert alert-success">Post Un-Featured</div>');
		}

		redirect(site_url('admin/carshop/allcars/' . $page));
	}





	public function bulkapprove($from = 'activeposts')

	{

		if (!is_admin()) {
			echo 'You don\'t have permission to access this page';
			die;
		}

		$data['status'] = 1;

		if (constant("ENVIRONMENT") == 'demo') {
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
		} else {

			$this->carshop_model->bulk_update_post($data, $this->input->post('id'));

			$this->session->set_flashdata('msg', '<div class="alert alert-success">Posts approved</div>');
		}

		redirect(site_url('admin/carshop/' . $from));
	}



	public function bulkdelete($from = 'activeposts')

	{

		if (!is_admin()) {
			echo 'You don\'t have permission to access this page';
			die;
		}

		$data['status'] = 0;

		if (constant("ENVIRONMENT") == 'demo') {
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
		} else {

			$this->carshop_model->bulk_update_post($data, $this->input->post('id'));

			$this->session->set_flashdata('msg', '<div class="alert alert-success">Posts deleted</div>');
		}


		redirect(site_url('admin/carshop/' . $from));
	}

	#load site settings , settings are saved as json data

	public function carshopsettings($key = 'carshop_settings')

	{
		if (!is_admin()) {
			echo 'You don\'t have permission to access this page';
			die;
		}

		$this->load->model('admin/system_model');

		$this->load->model('options_model');



		$settings = $this->options_model->getvalues($key);

		$settings = json_encode($settings);

		$value['settings'] 	= $settings;

		$data['title'] 		= 'Site Settings';

		$data['content']  	= $this->load->view('admin/carshop/settings_view', $value, TRUE);

		$this->load->view('admin/template/template_view', $data);
	}



	#save site settings

	public function savecarshopsettings($key = 'carshop_settings')

	{
		#echo "<pre>";die(print_r($_POST));
		if (!is_admin()) {
			echo 'You don\'t have permission to access this page';
			die;
		}

		$this->load->model('admin/system_model');

		$this->load->model('options_model');



		foreach ($_POST as $k => $value) {

			$rules = $this->input->post($k . '_rules');

			if ($rules != '')

				$this->form_validation->set_rules($k, $k, $rules);
		}

		$this->form_validation->set_rules('min_car_price', "Minimum car price", "numeric");
		$this->form_validation->set_rules('max_car_price', "Maximum car price", "numeric");



		if ($this->form_validation->run() == FALSE) {
			$this->carshopsettings($key);
		} else {

			if (constant("ENVIRONMENT") == 'demo') {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			} else {

				$data['values'] 	= json_encode($_POST);

				$res = $this->options_model->getvalues($key);

				if ($res == '') {

					$data['key']	= $key;

					$this->options_model->addvalues($data);
				} else

					$this->options_model->updatevalues($key, $data);





				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data Updated</div>');
			}


			redirect(site_url('admin/carshop/carshopsettings/' . $key));
		}
	}





	#load site settings , settings are saved as json data

	public function paypalsettings($key = 'paypal_settings')

	{

		if (!is_admin()) {
			echo 'You don\'t have permission to access this page';
			die;
		}

		$this->load->model('admin/system_model');

		$this->load->model('options_model');



		$settings = $this->options_model->getvalues($key);

		$settings = json_encode($settings);

		$value['settings'] 	= $settings;

		$data['title'] 		= 'Paypal Settings';

		$data['content']  	= $this->load->view('admin/carshop/paypalsettings_view', $value, TRUE);

		$this->load->view('admin/template/template_view', $data);
	}



	#save site settings

	public function savepaypalsettings($key = 'paypal_settings')

	{

		if (!is_admin()) {
			echo 'You don\'t have permission to access this page';
			die;
		}

		$this->load->model('admin/system_model');

		$this->load->model('options_model');



		foreach ($_POST as $k => $value) {

			$rules = $this->input->post($k . '_rules');

			if ($rules != '')

				$this->form_validation->set_rules($k, $k, $rules);
		}



		if ($this->form_validation->run() == FALSE) {

			$this->paypalsettings($key);
		} else {

			if (constant("ENVIRONMENT") == 'demo') {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			} else {

				$data['values'] 	= json_encode($_POST);

				$res = $this->options_model->getvalues($key);

				if ($res == '') {

					$data['key']	= $key;

					$this->options_model->addvalues($data);
				} else

					$this->options_model->updatevalues($key, $data);





				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data Updated</div>');
			}


			redirect(site_url('admin/carshop/paypalsettings/' . $key));
		}
	}



	#load allcars view

	public function allcars($start = 0)

	{
		if (!is_admin()) {
			echo 'You dont have permission to access this page!';
			return;
		}


		$value['posts']  	= $this->carshop_model->get_all_cars_admin('all', $this->per_page, 'id', 'desc');

		$value['start']     = $start;

		$data['title'] = lang_key('all_cars');

		$data['content'] = $this->load->view('admin/carshop/all_cars_view', $value, TRUE);

		$this->load->view('admin/template/template_view', $data);
	}

	public function finish_url()
	{
		$this->session->set_flashdata('msg', '<div class="alert alert-success">' . lang_key('feature_payment_finish') . '</div>');
		redirect(site_url('admin/carshop/allcarsdealer/'));
	}

	public function cancel_url()
	{
		$this->session->set_flashdata('msg', '<div class="alert alert-warning">' . lang_key('feature_payment_cancel') . '</div>');
		redirect(site_url('admin/carshop/allcarsdealer/'));
	}



	#load allcars view

	public function allcarsdealer($start = 0)

	{

		if (isset($_POST['filter_purpose'])) {

			$this->session->set_userdata('filter_purpose', $this->input->post('filter_purpose'));
		}



		if (isset($_POST['filter_type'])) {

			$this->session->set_userdata('filter_type', $this->input->post('filter_type'));
		}



		if (isset($_POST['filter_condition'])) {

			$this->session->set_userdata('filter_condition', $this->input->post('filter_condition'));
		}



		if (isset($_POST['filter_status'])) {

			$this->session->set_userdata('filter_status', $this->input->post('filter_status'));
		}



		if (isset($_POST['filter_orderby'])) {

			$this->session->set_userdata('filter_orderby', $this->input->post('filter_orderby'));
		}



		if (isset($_POST['filter_ordertype'])) {

			$this->session->set_userdata('filter_ordertype', $this->input->post('filter_ordertype'));
		}



		$value['posts']  	= $this->carshop_model->get_all_cars_agent('all', $this->per_page, 'create_time', 'desc');

		$total 				= $this->carshop_model->count_all_cars_agent();

		$value['pages']		= configPagination('admin/carshop/allcarsdealer', $total, 5, $this->per_page);

		$value['start']     = $start;

		$data['title'] 		=  lang_key('all_cars');

		$data['content'] 	= $this->load->view('admin/carshop/all_cars_view', $value, TRUE);

		$this->load->view('admin/template/template_view', $data);
	}



	#load edit car form

	function editcar($page = 0, $id = '')

	{

		$data['title'] 	 = 'Edit Car';

		$value['page']	 = $page;

		$value['brands'] = $this->carshop_model->get_brandmodels_by_type('brand');

		$value['car'] 	 = $this->carshop_model->get_car_by_id($id); #echo $value['car']->model;die;

		if (isset($value['car']->brand)) $value['models'] = get_all_models($value['car']->brand);
		else  $value['models'] = array();

		$data['content'] = $this->load->view('admin/carshop/edit_car_view', $value, TRUE);

		$this->load->view('admin/template/template_view', $data);
	}



	#insert car

	public function updatecar()

	{

		$id 	= $this->input->post('id');

		$page 	= $this->input->post('page');

		if (!$this->carshop_model->check_post_permission($id)) {

			$this->session->set_flashdata('msg', '<div class="alert alert-danger">You don\'t have permission to update this</div>');

			redirect(site_url('admin/carshop/editcar/' . $page . '/' . $id));
		}



		$dl = default_lang();

		$this->config->load('carshop');
		$enable_custom_fields = $this->config->item('enable_custom_fields');
		if ($enable_custom_fields == 'Yes') {
			$fields = $this->config->item('custom_fields');
			foreach ($fields as $field) {
				if ($field['validation'] != '')
					$this->form_validation->set_rules($field['name'], $field['title'], $field['validation']);
			}
		}

		$this->form_validation->set_rules('id', 'Id', 'required');

		$this->form_validation->set_rules('page', 'Page', 'required');

		$this->form_validation->set_rules('title' . $dl, 'Title', 'required');

		$this->form_validation->set_rules('description' . $dl, 'Description', 'required');

		$this->form_validation->set_rules('car_type', 'Type', 'required');



		$meta_search_text = '';		//meta information for simple searching


		if ($this->form_validation->run() == FALSE) {

			$this->editcar($page, $id);
		} else {
			if (constant("ENVIRONMENT") == 'demo') {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			} else {

				$data = array();

				$data['car_type'] 			= $this->input->post('car_type');
				$data['brand'] 				= $this->input->post('brand');
				$data['model'] 				= ($this->input->post('model') == '') ? 0 : $this->input->post('model'); //strict mode
				$data['year'] 				= $this->input->post('year');
				$data['mileage'] 			= ($this->input->post('mileage') == '') ? 0 : $this->input->post('mileage'); //strict mode
				$data['price'] 				= ($this->input->post('price') == '') ? 0 : $this->input->post('price'); //strict mode
				$data['transmission'] 		= $this->input->post('transmission');
				$data['condition'] 			= $this->input->post('condition');
				$data['reg_no'] 			= $this->input->post('reg_no');
				$data['engine_size'] 		= $this->input->post('engine_size');
				$data['engine_type'] 		= $this->input->post('engine_type');
				$data['exterior_color'] 	= $this->input->post('exterior_color');
				$data['interior_color'] 	= $this->input->post('interior_color');
				$data['fuel_type'] 			= $this->input->post('fuel_type');
				$data['safety_rating'] 		= $this->input->post('safety_rating');
				$data['no_of_seats'] 		= ($this->input->post('no_of_seats') == '') ? 0 : $this->input->post('no_of_seats'); //strict mode
				$data['steering_type'] 		= $this->input->post('steering_type');
				$data['height'] 			= $this->input->post('height');
				$data['width'] 				= $this->input->post('width');
				$data['length'] 			= $this->input->post('length');
				$data['wheel_base'] 		= $this->input->post('wheel_base');
				$data['track_rear'] 		= $this->input->post('track_rear');
				$data['track_front'] 		= $this->input->post('track_front');
				$data['ground_clearance'] 	= $this->input->post('ground_clearance');


				$meta_search_text .= lang_key($data['car_type']) . " ";

				$brand = $this->carshop_model->get_brandmodels_by_id($data['brand']);
				if (isset($brand->name))
					$meta_search_text .= $brand->name . " ";

				$model = $this->carshop_model->get_brandmodels_by_id($data['model']);
				if (isset($model->name))
					$meta_search_text .= $model->name . " ";

				$meta_search_text .= $data['year'] . " ";

				$meta_search_text .= lang_key($data['transmission']) . " ";
				$meta_search_text .= lang_key($data['condition']) . " ";
				$meta_search_text .= lang_key($data['fuel_type']) . " ";



				$data['featured_img'] 	= $this->input->post('featured_img');

				$data['gallery'] 		= json_encode($this->input->post('gallery'));



				$this->load->helper('date');

				$format = 'DATE_RFC822';

				$time 	= time();



				//$data['create_time'] 	= standard_date($format, $time);

				if ($this->input->post('created_by') != '')
					$data['created_by']		= $this->input->post('created_by');

				$data['status']			= 1;



				$this->carshop_model->update_car($data, $id);



				$default_title 			= $this->input->post('title' . $dl);

				$meta_search_text		.= ' ' . $default_title;



				$default_description 	= $this->input->post('description' . $dl);

				$meta_search_text		.= ' ' . $default_description;

				$meta_search_text		.= $this->input->post('tags');

				#update the post table with meta information

				$data = array();

				$data['search_meta'] = $meta_search_text;

				$this->carshop_model->update_car($data, $id);



				$this->load->model('admin/system_model');

				$query = $this->system_model->get_all_langs();

				$active_languages = $query->result();



				$data = array();

				$data['post_id'] 	= $id;

				$data['key']		= 'title';

				$data['status']	= 1;



				$value = array();

				foreach ($active_languages as $row) {



					$title = $this->input->post('title' . $row->short_name);

					$value[$row->short_name] = $title;
				}



				$data['value'] = json_encode($value);

				$this->carshop_model->update_car_meta($data, $id, 'title');



				$data = array();

				$data['post_id'] 	= $id;

				$data['key']		= 'description';

				$data['status']	= 1;



				$value = array();

				foreach ($active_languages as $row) {



					$description = $this->input->post('description' . $row->short_name);

					$value[$row->short_name] = $description;
				}



				$data['value'] = json_encode($value);

				$this->carshop_model->update_car_meta($data, $id, 'description');



				add_post_meta($id, 'video_url', $this->input->post('video_url'));
				add_post_meta($id, 'tags', $this->input->post('tags'));
				add_post_meta($id, 'car_brochure', $this->input->post('car_brochure'));

				if ($enable_custom_fields == 'Yes') {
					$fields = $this->config->item('custom_fields');
					$data = array();
					foreach ($fields as $field) {
						$data[$field['name']] = $this->input->post($field['name']);
					}
				}
				add_post_meta($id, 'custom_values', json_encode($data));

				$this->session->set_flashdata('msg', '<div class="alert alert-success">Car information updated</div>');
			}


			redirect(site_url('admin/carshop/editcar/' . $page . '/' . $id));
		}
	}

	function undo_delete($page = 0, $id = '')
	{


		if ($id == '' || $id == '0') {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Car!</div>');
			redirect(site_url('admin/carshop/allcars/' . $page . '/' . $id));
		} else {

			$data['id'] = $id;
			if (get_settings('carshop_settings', 'publish_directly', 'Yes') == 'Yes')
				$data['status'] = '1';
			else
				$data['status'] = '2';

			$this->carshop_model->update_car($data, $id);

			$this->session->set_flashdata('msg', '<div class="alert alert-success">Car Revived :)</div>');

			if (is_admin())
				redirect(site_url('admin/carshop/allcars/' . $page));

			else
				redirect(site_url('admin/carshop/allcarsdealer/' . $page));
		}
	}



	function if_have_create_permission()

	{

		if (is_admin())

			return 1;



		if (get_settings('carshop_settings', 'enable_pricing', 'Yes') == 'Yes') {

			$this->load->helper('date');

			$user_id = $this->session->userdata('user_id');

			$datestring = "%Y-%m-%d";

			$time  = time();

			$today = mdate($datestring, $time);

			if (strtotime($today) > strtotime(get_user_meta($user_id, 'expirtion_date')))

				return 2;



			$user_package = get_user_meta($user_id, 'current_package', '');

			if ($user_package == '')

				return 3;



			$this->load->model('admin/package_model');

			$package = $this->package_model->get_package_by_id($user_package);


			if (get_user_meta($user_id, 'post_count', 0) + 1 > $package->max_post)

				return 4;

			return 1;
		} else

			return 1;
	}



	#load new car form

	function newcar()

	{

		$res = $this->if_have_create_permission();

		if ($res != 1) {

			if ($res == 2)

				$this->session->set_flashdata('msg', '<div class="alert alert-danger">You\'re package is expired. Please renew</div>');

			elseif ($res == 3)

				$this->session->set_flashdata('msg', '<div class="alert alert-danger">No package data found. Please choose a package.</div>');

			elseif ($res == 4)

				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Your maximum posting limit is over. Please renew.</div>');

			redirect(site_url('account/renew'));
		}

		$value['brands'] = $this->carshop_model->get_brandmodels_by_type('brand');

		$value['models'] 	= $this->carshop_model->get_brandmodels_by_type('model');

		$data['title'] = 'Create New Car';

		$data['content'] = $this->load->view('admin/carshop/new_car_view', $value, TRUE);

		$this->load->view('admin/template/template_view', $data);
	}



	#insert car

	public function addcar()

	{
		$dl = default_lang();

		$this->config->load('carshop');
		$enable_custom_fields = $this->config->item('enable_custom_fields');
		if ($enable_custom_fields == 'Yes') {
			$fields = $this->config->item('custom_fields');
			foreach ($fields as $field) {
				if ($field['validation'] != '')
					$this->form_validation->set_rules($field['name'], $field['title'], $field['validation']);
			}
		}

		$this->form_validation->set_rules('title' . $dl, 'Title', 'required');

		$this->form_validation->set_rules('description' . $dl, 'Description', 'required');

		$this->form_validation->set_rules('car_type', 'Type', 'required');

		$this->form_validation->set_rules('featured_img', 'Featured image', 'required');





		if ($this->form_validation->run() == FALSE) {

			$this->newcar();
		} else {
			if (constant("ENVIRONMENT") == 'demo') {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			} else {

				$data = array();

				$data['unique_id']	= uniqid();

				$data['car_type'] 			= $this->input->post('car_type');
				$data['brand'] 				= $this->input->post('brand');
				$data['model'] 				= ($this->input->post('model') == "") ? 0 : $this->input->post('model'); //strict mode
				$data['year'] 				= $this->input->post('year');
				$data['mileage'] 			= ($this->input->post('mileage') == "") ? 0 : $this->input->post('mileage'); //strict mode
				// updated on version 1.7
				if ($this->input->post('ask_for_price') == '1')
					$data['price'] 				= -1;
				else
					$data['price'] 				= ($this->input->post('price') == "") ? 0 : $this->input->post('price'); //strict mode
				//end
				$data['transmission'] 		= $this->input->post('transmission');
				$data['condition'] 			= $this->input->post('condition');
				$data['reg_no'] 			= $this->input->post('reg_no');
				$data['engine_size'] 		= $this->input->post('engine_size');
				$data['engine_type'] 		= $this->input->post('engine_type');
				$data['exterior_color'] 	= $this->input->post('exterior_color');
				$data['interior_color'] 	= $this->input->post('interior_color');
				$data['fuel_type'] 			= $this->input->post('fuel_type');
				$data['safety_rating'] 		= $this->input->post('safety_rating');
				$data['no_of_seats'] 		= ($this->input->post('no_of_seats') == "") ? 0 : $this->input->post('no_of_seats'); //strict mode
				$data['steering_type'] 		= $this->input->post('steering_type');
				$data['height'] 			= $this->input->post('height');
				$data['width'] 				= $this->input->post('width');
				$data['length'] 			= $this->input->post('length');
				$data['wheel_base'] 		= $this->input->post('wheel_base');
				$data['track_rear'] 		= $this->input->post('track_rear');
				$data['track_front'] 		= $this->input->post('track_front');
				$data['ground_clearance'] 	= $this->input->post('ground_clearance');
				$data['gallery'] 	= '[]'; //strict mode
				$data['facilities'] 	= '[]'; //strict mode				
				$data['search_meta'] 	= ''; //strict mode


				$meta_search_text = '';
				$meta_search_text .= lang_key($data['car_type']) . " ";

				$brand = $this->carshop_model->get_brandmodels_by_id($data['brand']);
				if (isset($brand->name))
					$meta_search_text .= $brand->name . " ";

				$model = $this->carshop_model->get_brandmodels_by_id($data['model']);
				if (isset($model->name))
					$meta_search_text .= $model->name . " ";

				$meta_search_text .= $data['year'] . " ";

				$meta_search_text .= lang_key($data['transmission']) . " ";
				$meta_search_text .= lang_key($data['condition']) . " ";
				$meta_search_text .= lang_key($data['fuel_type']) . " ";


				$data['featured_img'] 	= $this->input->post('featured_img');



				$this->load->helper('date');

				$format = '%Y-%m-%d %h:%i:%s'; //strict mode

				$time = time();



				$data['create_time'] 	= standard_date($format, $time);
				$data['publish_time'] 	= standard_date($format, $time); //strict mode

				$data['created_by']		= ($this->input->post('created_by') != '') ? $this->input->post('created_by') : $this->session->userdata('user_id');



				$publish_directly 		= get_settings('carshop_settings', 'publish_directly', 'Yes');

				$data['status']			= ($publish_directly == 'Yes') ? 1 : 2; // 2 = pending



				$id = $this->carshop_model->insert_car($data);



				$default_title 			= $this->input->post('title' . $dl);

				$meta_search_text		.= ' ' . $default_title;



				$default_description 	= $this->input->post('description' . $dl);

				$meta_search_text		.= ' ' . $default_description;

				$meta_search_text		.= $this->input->post('tags');
				# update the post table with meta information

				$data = array();

				$data['search_meta'] = $meta_search_text;

				$this->carshop_model->update_car($data, $id);



				$this->load->model('admin/system_model');

				$query = $this->system_model->get_all_langs();

				$active_languages = $query->result();



				$data = array();

				$data['post_id'] 	= $id;

				$data['key']		= 'title';

				$data['status']	= 1;



				$value = array();

				foreach ($active_languages as $row) {



					$title = $this->input->post('title' . $row->short_name);

					$value[$row->short_name] = $title;
				}



				$data['value'] = json_encode($value);

				$this->carshop_model->insert_car_meta($data);



				$data = array();

				$data['post_id'] 	= $id;

				$data['key']		= 'description';

				$data['status']	= 1;



				$value = array();

				foreach ($active_languages as $row) {



					$description = $this->input->post('description' . $row->short_name);

					$value[$row->short_name] = $description;
				}



				$data['value'] = json_encode($value);

				$this->carshop_model->insert_car_meta($data);

				add_post_meta($id, 'tags', $this->input->post('tags'));

				#increase users post count

				$user_id = $this->session->userdata('user_id');

				$post_count = get_user_meta($user_id, 'post_count', 0);

				$post_count++;

				add_user_meta($user_id, 'post_count', $post_count);

				if ($enable_custom_fields == 'Yes') {
					$fields = $this->config->item('custom_fields');
					$data = array();
					foreach ($fields as $field) {
						$data[$field['name']] = $this->input->post($field['name']);
					}
				}
				add_post_meta($id, 'custom_values', json_encode($data));

				$this->session->set_flashdata('msg', '<div class="alert alert-success">' . lang_key('car_added_successfully') . '</div>');
			}


			redirect(site_url('admin/carshop/editcar/0/' . $id));
		}
	}



	public function get_states_ajax($term = '')

	{

		if ($term == '')

			$term = $this->input->post('term');

		$country = $this->input->post('country');

		$data = $this->carshop_model->get_locations_json($term, 'state', $country);

		echo json_encode($data);
	}



	public function get_cities_ajax($term = '')

	{

		if ($term == '')

			$term = $this->input->post('term');

		$state = $this->input->post('state');

		$data = $this->carshop_model->get_locations_json($term, 'city', $state);

		echo json_encode($data);
	}

	public function get_models_ajax()
	{
		if ($this->input->post('brand') != null) {

			$models = get_all_models($this->input->post('brand'));
			echo json_encode($models->result());
			return;
		} else {

			echo json_encode(array("kisu na"));
			return;
		}
	}



	public function locations($start = '0')

	{

		$data['title'] = 'All locations';

		$value['posts'] = $this->carshop_model->get_all_locations_by_range($start, $this->per_page, 'id');

		$total 				= $this->carshop_model->count_all_locations();

		$value['pages']		= configPagination('admin/carshop/locations', $total, 5, $this->per_page);



		$data['content'] = $this->load->view('admin/carshop/all_locations_view', $value, TRUE);

		$this->load->view('admin/template/template_view', $data);
	}





	public function newlocation($type = 'country')

	{

		$value['type'] = $type;

		$value['countries'] = $this->carshop_model->get_locations_by_type('country');

		$value['states'] 	= $this->carshop_model->get_locations_by_type('state');

		$this->load->view('admin/carshop/new_location_view', $value);
	}



	public function savelocation()

	{

		$this->form_validation->set_rules('type', 'Type', 'required');

		$type = $this->input->post('type');

		if ($type == 'state' || $type == 'city')

			$this->form_validation->set_rules('country', 'Country', 'required');



		if ($type == 'city') {

			$this->form_validation->set_rules('country', 'Country', 'required');

			if (get_settings('carshop_settings', 'show_state_province', 'yes') == 'yes') {
				$this->form_validation->set_rules('state', 'State', 'required');
			}
		}



		$this->form_validation->set_rules('locations', 'Names', 'required');



		if ($this->form_validation->run() == FALSE) {

			$this->newlocation($type);
		} else {
			if (constant("ENVIRONMENT") == 'demo') {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			} else {

				$locations = $this->input->post('locations');

				$locations_array = explode(',', $locations);

				if ($type == 'country')

					$parent = 0;

				elseif ($type == 'state')

					$parent = $this->input->post('country');

				elseif ($type == 'city') {
					//updated on version 1.6
					if (get_settings('carshop_settings', 'show_state_province', 'yes') == 'yes')
						$parent = $this->input->post('state');
					else
						$parent = $this->input->post('country');
				}



				foreach ($locations_array as $location) {

					$data = array();

					$data['name'] 	= $location;

					$data['type'] 	= $type;

					$data['parent'] = $parent;

					$data['status']	= 1;

					$this->carshop_model->insert_location($data);
				}





				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data inserted</div>');
			}


			redirect(site_url('admin/carshop/newlocation'));
		}
	}



	public function editlocation($type = 'country', $id = '')

	{

		$value['type'] = $type;

		$value['editlocation'] 	= $this->carshop_model->get_location_by_id($id);

		$value['countries'] 	= $this->carshop_model->get_locations_by_type('country');

		$value['states'] 		= $this->carshop_model->get_locations_by_type('state');

		$this->load->view('admin/carshop/edit_location_view', $value);
	}



	public function updatelocation()

	{

		$this->form_validation->set_rules('type', 'Type', 'required');

		$id = $this->input->post('id');

		$type = $this->input->post('type');

		if ($type == 'state' || $type == 'city')

			$this->form_validation->set_rules('country', 'Country', 'required');



		if ($type == 'city') {

			$this->form_validation->set_rules('country', 'Country', 'required');

			if (get_settings('carshop_settings', 'show_state_province', 'yes') == 'yes') {
				$this->form_validation->set_rules('state', 'State', 'required');
			}
		}



		$this->form_validation->set_rules('location', 'Name', 'required');



		if ($this->form_validation->run() == FALSE) {

			$this->editlocation($type, $id);
		} else {
			if (constant("ENVIRONMENT") == 'demo') {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			} else {

				if ($type == 'country')

					$parent = 0;

				elseif ($type == 'state')

					$parent = $this->input->post('country');

				elseif ($type == 'city') {
					if (get_settings('carshop_settings', 'show_state_province', 'yes') == 'yes')
						$parent = $this->input->post('state');
					else
						$parent = $this->input->post('country');
				}



				$data = array();

				$data['name'] 	= $this->input->post('location');

				$data['type'] 	= $type;

				$data['parent'] = $parent;

				$data['status']	= 1;

				$this->carshop_model->update_location($data, $id);





				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data Updated</div>');
			}


			redirect(site_url('admin/carshop/editlocation/' . $type . '/' . $id));
		}
	}



	#delete a location

	public function deletelocation($page = '0', $id = '', $confirmation = '')

	{

		if ($confirmation == '') {

			$data['content'] = $this->load->view('admin/confirmation_view', array('id' => $id, 'url' => site_url('admin/carshop/deletelocation/' . $page)), TRUE);

			$this->load->view('admin/template/template_view', $data);
		} else {

			if ($confirmation == 'yes') {
				if (constant("ENVIRONMENT") == 'demo') {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
				} else {

					$this->carshop_model->delete_location_by_id($id);

					$this->session->set_flashdata('msg', '<div class="alert alert-success">Location Deleted</div>');
				}
			}

			redirect(site_url('admin/carshop/locations/' . $page));
		}
	}



	#get and display facility information

	public function facilities()
	{



		$this->load->model('admin/facility_model');



		$value['facilities']		= $this->facility_model->get_all_facilities_by_range('all');

		$data['title'] 				= 'facilities';

		$data['content'] 			= $this->load->view('admin/facilities/facilities_view', $value, TRUE);



		$this->load->view('admin/template/template_view', $data);
	}



	#remove a single facility by its id

	public function remove_facility($id)
	{



		if (!isset($id))

			redirect(site_url('admin/carshop/facilities'));



		$this->load->model('admin/facility_model');

		if (constant("ENVIRONMENT") == 'demo') {
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
		} else {

			$data['status'] = 0;

			$this->facility_model->update_facility($data, $id);

			$this->session->set_flashdata('msg', '<div class="alert alert-success">Facility removed</div>');
		}


		redirect(site_url('admin/carshop/facilities'));
	}



	#edit a single facility by its id

	public function edit_facility($id)
	{



		if (!isset($id))

			redirect(site_url('admin/carshop/facilities'));



		$this->load->model('admin/facility_model');



		$value['post']  = $this->facility_model->get_facility_by_id($id);

		$data['content'] = $this->load->view('admin/facilities/edit_facility_view', $value, TRUE);

		$this->load->view('admin/template/template_view', $data);
	}



	#save the updated facility information

	public function update_facility()
	{



		$this->load->model('admin/facility_model');



		$this->form_validation->set_rules('title', 'Title', 'required');



		if ($this->form_validation->run() == FALSE) {

			$id = $this->input->post('id');

			$this->edit_facility($id);
		} else {

			$id = $this->input->post('id');



			$data 					= array();

			$data['title'] 			= $this->input->post('title');

			$data['icon'] 			= $this->input->post('icon');

			if (constant("ENVIRONMENT") == 'demo') {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			} else {

				$this->facility_model->update_facility($data, $id);

				$this->session->set_flashdata('msg', '<div class="alert alert-success">Facility information updated</div>');

				//redirect(site_url('admin/category/edit/'.$id));
			}


			$this->edit_facility($id);
		}
	}



	#delete multiple facilities

	public function remove_bulk_facilities()

	{

		$this->load->model('admin/facility_model');



		$data['status'] = 0;

		$this->facility_model->bulk_update_facilities($data, $this->input->post('id'));

		$this->session->set_flashdata('msg', '<div class="alert alert-success">Facilities removed</div>');

		redirect(site_url('admin/carshop/facilities'));
	}





	#load new facility page

	function newfacility()

	{



		$data['title'] = 'Create New Facility';

		$data['content'] = $this->load->view('admin/facilities/create_facility_view', '', TRUE);

		$this->load->view('admin/template/template_view', $data);
	}



	#add facility information to the database

	function addfacility()

	{

		$this->form_validation->set_rules('title', 'Title', 'required');



		if ($this->form_validation->run() == FALSE) {

			$this->newfacility();
		} else {

			$data 						= array();

			$data['title'] 				= $this->input->post('title');

			$data['icon'] 				= $this->input->post('icon');

			$data['status']				= 1;



			$this->load->model('facility_model');

			$id = $this->facility_model->insert_facility($data);

			if ($id > 0) {



				$this->session->set_flashdata('msg', '<div class="alert alert-success">New facility created</div>');
			} else {



				$this->session->set_flashdata('msg', '<div class="alert alert-success">Error occured facility could not be created</div>');
			}

			redirect(site_url('admin/carshop/newfacility'));
		}
	}



	# image upload functions

	public function create_date_directory()

	{

		$year = date('Y');

		$mon  = date('M');

		if (!file_exists('./uploads/' . $year)) {

			mkdir('./uploads/' . $year);
		}

		if (!file_exists('uploads/' . $year . '/' . $mon)) {

			mkdir('./uploads/' . $year . '/' . $mon);
		}



		return $year . '/' . $mon . '/';
	}





	public function iconuploader()

	{

		$this->load->view('admin/facilities/icon_uploader_view');
	}



	public function featuredimguploader()

	{

		$this->load->view('admin/carshop/featured_img_uploader_view');
	}


	public function brochureuploader()

	{

		$this->load->view('admin/carshop/brochure_uploader_view');
	}


	public function searchbguploader()

	{

		$this->load->view('admin/carshop/searchbg_uploader_view');
	}



	public function galleryimguploader($count = 1)

	{

		$value['count'] = $count;

		$this->load->view('admin/carshop/gallery_img_uploader_view', $value);
	}



	public function bannerimguploader($count = 1)

	{

		$value['count'] = $count;

		$this->load->view('admin/carshop/banner_img_uploader_view', $value);
	}



	public function profile_photo_uploader()

	{

		$this->load->view('users/profile_photo_uploader_view');
	}



	public function upload_profile_photo()

	{

		$date_dir = 'profile_photos/';

		$config['upload_path'] = './uploads/profile_photos/';

		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$config['max_size'] = '5120';



		$this->load->library('upload', $config);

		$this->upload->display_errors('', '');



		if ($this->upload->do_upload('photoimg')) {

			$data = $this->upload->data();

			$this->load->helper('date');

			$format = 'DATE_RFC822';

			$time = time();



			$media['media_name'] 		= $data['file_name'];

			$media['media_url']  		= base_url() . 'uploads/profile_photos/' . $data['file_name'];

			$media['create_time'] 		= standard_date($format, $time);

			$media['status']			= 1;



			create_square_thumb('./uploads/profile_photos/' . $data['file_name'], './uploads/profile_photos/thumb/');



			$status['error'] 	= 0;

			$status['name']	= $data['file_name'];
		} else {

			$errors = $this->upload->display_errors();

			$errors = str_replace('<p>', '', $errors);

			$errors = str_replace('</p>', '', $errors);

			$status = array('error' => $errors, 'name' => '');
		}

		echo json_encode($status);

		die;
	}





	public function uploadiconfile()

	{

		$date_dir = $this->create_date_directory();

		$config['upload_path'] = './uploads/' . $date_dir;

		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$config['max_size'] = '1000';

		$config['max_width'] = '32';

		$config['max_height'] = '32';

		$config['min_width'] = '32';

		$config['min_height'] = '32';



		$this->load->library('dbcupload', $config);

		$this->dbcupload->display_errors('', '');

		if ($this->dbcupload->do_upload('photoimg')) {

			$data = $this->dbcupload->data();

			$this->load->helper('date');

			$format = 'DATE_RFC822';

			$time = time();

			create_square_thumb('./uploads/' . $date_dir . $data['file_name'], './uploads/thumbs/');

			$media['media_name'] 		= $data['file_name'];

			$media['media_url']  		= base_url() . 'uploads/' . $date_dir . $data['file_name'];

			$media['create_time'] 		= standard_date($format, $time);

			$media['status']			= 1;



			$status['error'] 	= 0;

			$status['name']	= $data['file_name'];
		} else {

			$errors = $this->dbcupload->display_errors();

			$errors = str_replace('<p>', '', $errors);

			$errors = str_replace('</p>', '', $errors);

			$status = array('error' => $errors, 'name' => '');
		}



		echo json_encode($status);

		die;
	}



	public function uploadsearchbgfile()

	{

		//$date_dir = $this->create_date_directory();

		$config['upload_path'] = './uploads/banner/';

		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$config['max_size'] = '5120';

		$config['min_width'] = '1024';

		$config['min_height'] = '600';



		$this->load->library('dbcupload', $config);

		$this->dbcupload->display_errors('', '');

		if ($this->dbcupload->do_upload('photoimg')) {

			$data = $this->dbcupload->data();

			$this->load->helper('date');

			$format = 'DATE_RFC822';

			$time = time();

			//create_square_thumb('./uploads/'.$date_dir.$data['file_name'],'./uploads/thumbs/');

			$media['media_name'] 		= $data['file_name'];

			$media['media_url']  		= base_url() . 'uploads/banner/' . $data['file_name'];

			$media['create_time'] 		= standard_date($format, $time);

			$media['status']			= 1;



			$status['error'] 	= 0;

			$status['name']	= $data['file_name'];
		} else {

			$errors = $this->dbcupload->display_errors();

			$errors = str_replace('<p>', '', $errors);

			$errors = str_replace('</p>', '', $errors);

			$status = array('error' => $errors, 'name' => '');
		}



		echo json_encode($status);

		die;
	}



	public function uploadfeaturedfile()

	{

		// added on version 1.5
		$date_dir = 'images/';

		if (!file_exists('./uploads/' . $date_dir)) {

			mkdir('./uploads/' . $date_dir);
		}

		//$date_dir = $this->create_date_directory();

		// end
		$config['upload_path'] = './uploads/' . $date_dir;

		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$config['max_size'] = '5120';

		$config['min_width'] = '256';

		$config['min_height'] = '256';



		$this->load->library('dbcupload', $config);

		$this->dbcupload->display_errors('', '');

		if ($this->dbcupload->do_upload('photoimg')) {

			$data = $this->dbcupload->data();

			$this->load->helper('date');

			$format = 'DATE_RFC822';

			$time = time();

			create_rectangle_thumb('./uploads/' . $date_dir . $data['file_name'], './uploads/thumbs/');

			$media['media_name'] 		= $data['file_name'];

			$media['media_url']  		= base_url() . 'uploads/' . $date_dir . $data['file_name'];

			$media['create_time'] 		= standard_date($format, $time);

			$media['status']			= 1;



			$status['error'] 	= 0;

			$status['name']	= $data['file_name'];
		} else {

			$errors = $this->dbcupload->display_errors();

			$errors = str_replace('<p>', '', $errors);

			$errors = str_replace('</p>', '', $errors);

			$status = array('error' => $errors, 'name' => '');
		}



		echo json_encode($status);

		die;
	}


	public function uploadbrochure()

	{
		$date_dir = $this->create_date_directory();

		$config['upload_path'] = './uploads/gallery';

		$config['allowed_types'] = 'pdf|doc|docx';

		$config['max_size'] = '5120';





		$this->load->library('dbcupload', $config);

		$this->dbcupload->display_errors('', '');

		if ($this->dbcupload->do_upload('brochure')) {

			$data = $this->dbcupload->data();


			$status['error'] 	= 0;

			$status['name']	= $data['file_name'];
		} else {

			$errors = $this->dbcupload->display_errors();

			$errors = str_replace('<p>', '', $errors);

			$errors = str_replace('</p>', '', $errors);

			$status = array('error' => $errors, 'name' => '');
		}



		echo json_encode($status);

		die;
	}


	public function uploadgalleryfile()

	{

		$date_dir = 'gallery/';

		$config['upload_path'] = './uploads/gallery/';

		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$config['max_size'] = '5120';

		// $config['min_width'] = '256';

		// $config['min_height'] = '256';



		$this->load->library('dbcupload', $config);

		$this->dbcupload->display_errors('', '');

		if ($this->dbcupload->do_upload('photoimg')) {

			$data = $this->dbcupload->data();

			$this->load->helper('date');

			$format = 'DATE_RFC822';

			$time = time();

			//create_gallery_thumb('./uploads/'.$date_dir.$data['file_name'],'./uploads/thumbs/');

			$media['media_name'] 		= $data['file_name'];

			$media['media_url']  		= base_url() . 'uploads/gallery/' . $data['file_name'];

			$media['create_time'] 		= standard_date($format, $time);

			$media['status']			= 1;



			$status['error'] 	= 0;

			$status['name']	= $data['file_name'];

			// put_watermark('./uploads/gallery/'.$data['file_name'],'mail@mail.com');

		} else {

			$errors = $this->dbcupload->display_errors();

			$errors = str_replace('<p>', '', $errors);

			$errors = str_replace('</p>', '', $errors);

			$status = array('error' => $errors, 'name' => '');
		}



		echo json_encode($status);

		die;
	}

	public function uploadbannerfile()

	{

		//$date_dir = $this->create_date_directory();

		$config['upload_path'] = './uploads/banner/';

		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$config['max_size'] = '5120';

		$config['min_width'] = '1024';

		$config['min_height'] = '600';



		$this->load->library('dbcupload', $config);

		$this->dbcupload->display_errors('', '');

		if ($this->dbcupload->do_upload('photoimg')) {

			$data = $this->dbcupload->data();

			$this->load->helper('date');

			$format = 'DATE_RFC822';

			$time = time();

			//create_square_thumb('./uploads/'.$date_dir.$data['file_name'],'./uploads/thumbs/');

			$media['media_name'] 		= $data['file_name'];

			$media['media_url']  		= base_url() . 'uploads/banner/' . $data['file_name'];

			$media['create_time'] 		= standard_date($format, $time);

			$media['status']			= 1;



			$status['error'] 	= 0;

			$status['name']	= $data['file_name'];
		} else {

			$errors = $this->dbcupload->display_errors();

			$errors = str_replace('<p>', '', $errors);

			$errors = str_replace('</p>', '', $errors);

			$status = array('error' => $errors, 'name' => '');
		}



		echo json_encode($status);

		die;
	}



	public function crop($src = '', $width = 256, $height = 256)

	{

		$config['image_library'] = 'gd2';

		$config['source_image'] = $src;

		$config['width'] = $width;

		$config['height'] = $height;



		$this->load->library('image_lib', $config);



		$this->image_lib->resize();
	}

	public function emailtracker($start = '0')
	{
		if (is_admin()) {
			$value['posts']  	= $this->carshop_model->get_all_emails_admin($start, $this->per_page);

			$total 				= $this->carshop_model->count_all_emails_admin();
		} else {
			$value['posts']  	= $this->carshop_model->get_all_emails_agent($start, $this->per_page);

			$total 				= $this->carshop_model->count_all_emails_agent();
		}


		$value['pages']		= configPagination('admin/carshop/emailtracker', $total, 5, $this->per_page);

		$value['start']     = $start;

		$data['title'] = 'Email Tracker';

		$data['content'] = $this->load->view('admin/carshop/all_emails_view', $value, TRUE);

		$this->load->view('admin/template/template_view', $data);
	}


	public function bulkemailform()
	{
		if (is_admin()) {
			$value['posts']  	= $this->carshop_model->get_all_emails_admin('all', $this->per_page);

			$total 				= $this->carshop_model->count_all_emails_admin();
		} else {
			$value['posts']  	= $this->carshop_model->get_all_emails_agent('all', $this->per_page);

			$total 				= $this->carshop_model->count_all_emails_agent();
		}



		$data['title'] = 'Bulk Email';

		$data['content'] = $this->load->view('admin/carshop/bulk_email_view', $value, TRUE);

		$this->load->view('admin/template/template_view', $data);
	}

	public function sendbulkemail($agent_id = '0')

	{

		$this->form_validation->set_rules('to', 'To', 'required');

		$this->form_validation->set_rules('subject', 'Subject', 'required');

		$this->form_validation->set_rules('message', 'Message', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->bulkemailform();
		} else {

			if (constant("ENVIRONMENT") == 'demo') {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Bulk email sent.[NOT AVAILABLE ON DEMO]</div>');
			} else {
				$to 		= (isset($_POST['to']) && is_array($_POST['to'])) ? $_POST['to'] : array();
				$subject 	= $this->input->post('subject');
				$message 	= $this->input->post('message');

				$this->load->library('email');

				$config['mailtype'] = "html";

				$config['charset'] 	= "utf-8";

				$this->email->initialize($config);



				$this->email->from($this->session->userdata('user_email'), $this->session->userdata('user_name'));

				$this->email->to($to);



				$this->email->subject($subject);

				$this->email->message($message);



				$this->email->send();



				$this->session->set_flashdata('msg', '<div class="alert alert-success">Email sent</div>');
			}

			redirect(site_url('admin/carshop/bulkemailform'));
		}
	}



	public function test_filter()
	{

		$data['title'] = 'Test Filter';

		$data['content'] = $this->load->view('admin/carshop/test_filter_view', '', TRUE);

		$this->load->view('admin/template/template_view', $data);
	}



	public function cutomfields()

	{

		$data['title'] = 'Custom field manager';

		$data['content'] = $this->load->view('admin/carshop/test_filter_view', '', TRUE);

		$this->load->view('admin/template/template_view', $data);
	}



	#load banner settings

	public function bannersettings()

	{

		$data['title'] = 'carshop Settings';

		$data['content'] = $this->load->view('admin/carshop/banner_settings_view', '', TRUE);

		$this->load->view('admin/template/template_view', $data);
	}



	#slider validation function

	public function slider_required($str)

	{

		$flag = FALSE;
		if (isset($_POST['banner'])) {
			foreach ($_POST['banner'] as $value) {

				if ($value != '')

					$flag = TRUE;
			}
		}




		if ($flag == FALSE) {

			$this->form_validation->set_message('slider_required', 'You must set atleast one slider image');

			return FALSE;
		} else {

			return TRUE;
		}
	}



	#save banner settings

	public function savebannersettings($key = 'banner_settings')

	{

		$this->form_validation->set_rules('search_bg', 'BG image', 'required');



		if ($this->form_validation->run() == FALSE) {

			$this->bannersettings();
		} else {

			$data = array();

			$data['show_banner'] 			= $this->input->post('show_banner'); // added on version 1.5

			$data['menu_bg_color'] 			= $this->input->post('menu_bg_color');

			$data['menu_text_color'] 		= $this->input->post('menu_text_color');

			$data['active_menu_text_color'] = $this->input->post('active_menu_text_color');

			$data['search_bg'] 				= $this->input->post('search_bg');

			$data['map_latitude'] 			= $this->input->post('map_latitude');

			$data['map_longitude'] 			= $this->input->post('map_longitude');

			$data['map_zoom'] 				= $this->input->post('map_zoom');

			$data['map_api_key'] 			= $this->input->post('map_api_key');

			if (constant("ENVIRONMENT") == 'demo') {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			}

			#echo "<pre>";die(print_r($data));
			else {

				add_option('banner_settings', json_encode($data));

				$this->session->set_flashdata('msg', '<div class="alert alert-success">Settings updated</div>');
			}


			redirect(site_url('admin/carshop/bannersettings'));
		}
	}



	public function payments($start = 0)

	{

		$this->load->model('admin/carshop_model');

		$value['start']		= $start;

		$value['posts']  	= $this->carshop_model->get_all_payment_history($start, $this->per_page, 'id', 'desc');

		$total 				= $this->carshop_model->count_all_payment_history();

		$value['pages']		= configPagination('admin/carshop/payments', $total, 5, $this->per_page);



		$data['title'] = 'Payment History';

		$data['content'] = $this->load->view('admin/carshop/all_payments_view', $value, TRUE);

		$this->load->view('admin/template/template_view', $data);
	}



	#delete a service

	public function deletehistory($page = '0', $id = '', $confirmation = '')

	{

		if ($confirmation == '') {

			$data['content'] = $this->load->view('admin/confirmation_view', array('id' => $id, 'url' => site_url('admin/carshop/deletehistory/' . $page . '/')), TRUE);

			$this->load->view('admin/template/template_view', $data);
		} else {

			if ($confirmation == 'yes') {

				if (constant("ENVIRONMENT") == 'demo') {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
				} else {

					$this->carshop_model->deletehistory($id);

					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data Deleted</div>');
				}
			}

			redirect(site_url('admin/carshop/payments/' . $page));
		}
	}

	#-------------- word filter functions -------------------#
	public function wordfilter()

	{

		$row = get_option('wordfilters');

		$wordfilters = '';

		if (!is_array($row)) {

			$words = json_decode($row->values);

			foreach ($words as $key => $value) {

				$wordfilters .= $key . '|' . $value . ',';
			}



			$wordfilters .= '#';

			$wordfilters = str_replace(',#', '', $wordfilters);
		}



		$value = array('wordfilters' => $wordfilters);

		$data['title'] = 'Word Filter';



		$data['content'] = $this->load->view('admin/carshop/wordfilter_view', $value, TRUE);

		$this->load->view('admin/template/template_view', $data);
	}



	public function addwordfilters()

	{

		$this->form_validation->set_rules('wordfilters', 'Words', 'required');



		if ($this->form_validation->run() == FALSE) {

			$this->wordfilter();
		} else {

			$pairs = explode(',', $this->input->post('wordfilters'));

			$words = array();

			foreach ($pairs as $pair) {

				$pair = explode('|', $pair);

				$words[$pair[0]] = $pair[1];
			}



			add_option('wordfilters', json_encode($words));

			$this->filterposts($words);

			$this->session->set_flashdata('msg', '<div class="alert alert-success">Filter added</div>');

			redirect(site_url('admin/carshop/wordfilter'));
		}
	}



	public function filterposts($words)

	{

		$this->load->model('show/post_model');

		$query = $this->post_model->get_all_posts_by_range('all', '', 'id');

		foreach ($query->result_array() as $post) {

			foreach ($words as $key => $value) {

				$post['title'] = str_replace($key, $value, $post['title']);
			}

			$this->post_model->update_post_by_id($post, $post['id']);
		}
	}

	#-------------- brand model functions -----------------------#
	public function brandmodels($start = '0')

	{

		$data['title'] 		= 'All brandmodels';

		$value['posts'] 	= $this->carshop_model->get_all_brandmodels_by_range($start, $this->per_page, 'id');

		$total 				= $this->carshop_model->count_all_brandmodels();

		$value['pages']		= configPagination('admin/carshop/brandmodels', $total, 5, $this->per_page);



		$data['content'] = $this->load->view('admin/carshop/all_brandmodels_view', $value, TRUE);

		$this->load->view('admin/template/template_view', $data);
	}





	public function newbrandmodel($type = 'brand')

	{

		$value['type'] = $type;

		$value['countries'] = $this->carshop_model->get_brandmodels_by_type('brand');

		$value['models'] 	= $this->carshop_model->get_brandmodels_by_type('model');

		$this->load->view('admin/carshop/new_brandmodel_view', $value);
	}



	public function savebrandmodel()

	{

		$this->form_validation->set_rules('type', 'Type', 'required');

		$type = $this->input->post('type');

		if ($type == 'model')

			$this->form_validation->set_rules('brand', 'brand', 'required');




		$this->form_validation->set_rules('brandmodels', 'Names', 'required');



		if ($this->form_validation->run() == FALSE) {

			$this->newbrandmodel($type);
		} else {
			if (constant("ENVIRONMENT") == 'demo') {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			} else {

				$brandmodels = $this->input->post('brandmodels');

				$brandmodels_array = explode(',', $brandmodels);

				if ($type == 'brand')

					$parent = 0;

				elseif ($type == 'model')

					$parent = $this->input->post('brand');




				foreach ($brandmodels_array as $brandmodel) {

					$data = array();

					$data['name'] 	= trim($brandmodel);

					$data['type'] 	= $type;

					$data['parent'] = $parent;

					$data['status']	= 1;

					$this->carshop_model->insert_brandmodels($data);
				}





				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data inserted</div>');
			}

			redirect(site_url('admin/carshop/newbrandmodel/' . $type));
		}
	}



	public function editbrandmodel($type = 'brand', $id = '')

	{

		$value['type'] = $type;

		$value['editbrandmodel'] 	= $this->carshop_model->get_brandmodels_by_id($id);

		$value['countries'] 	= $this->carshop_model->get_brandmodels_by_type('brand');

		$value['models'] 		= $this->carshop_model->get_brandmodels_by_type('model');

		$this->load->view('admin/carshop/edit_brandmodel_view', $value);
	}



	public function updatebrandmodel()

	{

		$this->form_validation->set_rules('type', 'Type', 'required');

		$id = $this->input->post('id');

		$type = $this->input->post('type');

		if ($type == 'model')

			$this->form_validation->set_rules('brand', 'brand', 'required');




		$this->form_validation->set_rules('brandmodel', 'Name', 'required');



		if ($this->form_validation->run() == FALSE) {

			$this->editbrandmodel($type, $id);
		} else {
			if (constant("ENVIRONMENT") == 'demo') {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			} else {

				if ($type == 'brand')

					$parent = 0;

				elseif ($type == 'model')

					$parent = $this->input->post('brand');




				$data = array();

				$data['name'] 	= $this->input->post('brandmodel');

				$data['type'] 	= $type;

				$data['parent'] = $parent;

				$data['status']	= 1;

				$this->carshop_model->update_brandmodels($data, $id);





				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data Updated</div>');
			}

			redirect(site_url('admin/carshop/editbrandmodel/' . $type . '/' . $id));
		}
	}



	#delete a brandmodel

	public function deletebrandmodel($page = '0', $id = '', $confirmation = '')

	{

		if ($confirmation == '') {

			$data['content'] = $this->load->view('admin/confirmation_view', array('id' => $id, 'url' => site_url('admin/carshop/deletebrandmodel/' . $page)), TRUE);

			$this->load->view('admin/template/template_view', $data);
		} else {

			if ($confirmation == 'yes') {
				if (constant("ENVIRONMENT") == 'demo') {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
				} else {

					$this->carshop_model->delete_brandmodels_by_id($id);

					$this->session->set_flashdata('msg', '<div class="alert alert-success">brandmodel Deleted</div>');
				}
			}

			redirect(site_url('admin/carshop/brandmodels/' . $page));
		}
	}

	public function confirmtransaction($page = '0', $unique_id = '')
	{
		if (!is_admin()) {
			echo 'You don\'t have permission to access this';
		}

		$this->load->model('user/user_model');
		$res = $this->user_model->confirm_transaction_by_id($unique_id);
		if ($res) {
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Payment confirmed.</div>');
			redirect(site_url('admin/carshop/payments/' . $page));
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Transaction id not valid or already confirmed.</div>');
			redirect(site_url('admin/carshop/payments/' . $page));
		}
	}

	public function remove_unused_img()
	{
		$file_name = $this->input->post('name');
		if ($file_name != '') {
			if (!unlink('./uploads/gallery/' . $file_name)) {
				echo "no";
			} else {
				echo "yes";
			}
		} else
			echo "no";

		die;
	}

	// added on version 1.5
	public function migrate_photos()
	{
		$date_dir = 'images/';

		if (!file_exists('./uploads/' . $date_dir)) {

			mkdir('./uploads/' . $date_dir);
		}

		$this->load->helper('directory');

		$years = array('2014', '2015', '2016');

		$count = 0;

		foreach ($years as $year) {
			$map = directory_map('./uploads/' . $year, 2);


			foreach ($map as $key => $mon) {
				if ($key != '0') {
					foreach ($mon as $img) {
						if (strpos($img, ".pdf") <= 0 && strpos($img, ".doc") <= 0 && strpos($img, ".docx") <= 0) {
							copy("./uploads/" . $year . "/" . $key . "/" . $img, "./uploads/images/" . $img);
							$count++;
						}
					}
				}
			}
		}

		echo 'Total ' . $count . ' photos migrated' . "<br/>";
		echo '<a href="' . site_url('admin') . '">Back</a>';
	}
	//end

	function migrate_blog_posts()
	{
		$option = get_option('migrate_blog_posts');
		if (isset($option['error'])) {

			$this->load->database();

			$sql = "ALTER TABLE `" . $this->db->dbprefix('blog') . "` CHANGE `title` `title` LONGTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;";
			$this->db->query($sql);

			$query = $this->db->get('blog');

			$this->load->model('admin/system_model');
			$langs = $this->system_model->get_all_langs();

			$default_lang =  default_lang();


			$flag = 1;
			foreach ($query->result() as $row) {
				$test = (array)json_decode($row->title);

				if (count($test) <= 0) {
					$title = array();
					$desc = array();

					foreach ($langs as $lang => $full_name) {
						$add[$lang] = '';
					}

					$title[$default_lang] = $row->title;
					$desc[$default_lang] = $row->description;

					$this->db->update('blog', array('title' => json_encode($title), 'description' => json_encode($desc)), array('id' => $row->id));
					echo 'Done row : ' . $flag . '<br/>';
					$flag++;
				}
			}

			echo '<h4>Complete</h4>';
			add_option('migrate_blog_posts', 'yes');
		} else
			echo '<h4>Already migrated</h4>';
	}
}



/* End of file carshop_core.php */

/* Location: ./application/modules/admin/controllers/carshop_core.php */