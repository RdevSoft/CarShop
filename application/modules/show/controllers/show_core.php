<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**

 * carshop admin Controller

 *

 * This class handles user account related functionality

 *

 * @package		Show

 * @subpackage	ShowCore

 * @author		RdevSoft

 * @link		

 */



class Show_core extends CI_controller {



	var $PER_PAGE = 2;

	var $active_theme = '';

	public function __construct()

	{

		parent::__construct();

		is_installed(); #defined in auth helper		

		$this->PER_PAGE = get_per_page_value();#defined in auth helper

		$this->active_theme = get_active_theme();

		$this->load->model('show_model');

        #$this->load->model('user/user_model');

		$this->load->library('encrypt');

		$this->load->helper('captcha');



		if(isset($_POST['view_orderby']))

		{

			$this->session->set_userdata('view_orderby',$this->input->post('view_orderby'));

		}



		if(isset($_POST['view_ordertype']))

		{

			$this->session->set_userdata('view_ordertype',$this->input->post('view_ordertype'));

		}

        $system_currency_type = get_settings('carshop_settings','system_currency_type',0);

        if($system_currency_type == 0){

            $system_currency = get_currency_icon(get_settings('carshop_settings','system_currency','USD'));

        }

        else{

            $system_currency = get_settings('carshop_settings','system_currency','USD');

        }



        $this->session->set_userdata('system_currency',$system_currency);

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

	}



	public function index()

	{

		$this->posts();	

	}

	public function post($type='all',$start=0)

	{			
		$this->config->load('carshop');
		$options 				= $this->config->item('blog_post_types');
		$value['posts']			= $this->show_model->get_all_active_blog_posts_by_range($start,$this->PER_PAGE,'id','desc',$type);
		$total 					= $this->show_model->count_all_active_blog_posts($type);
		$value['pages']			= configPagination('show/post/'.$type,$total,5,$this->PER_PAGE);
		$value['page_title']	= (isset($options[$type]))?$options[$type]:$type;
		$data['sub_title']		= (isset($options[$type]))?$options[$type]:$type;
		$data['content'] 		= load_view('posts_view',$value,TRUE);
		load_template($data,$this->active_theme);

	}

	public function postdetail($id='')

	{			
		$this->load->model('admin/blog_model');
		$value['blogpost']			= $this->blog_model->get_post_by_id($id);
		$data['blog_meta'] = $value['blogpost'];
		if(isset($value['blogpost']->title) && $value['blogpost']->status==1) {

			$data['sub_title']			= get_blog_data_by_lang($value['blogpost'],'title');
			$data['content'] 			= load_view('post_detail_view',$value,TRUE);
		}
		else {
			unset($data['blog_meta']);
			$this->output->set_status_header('404');
			$data['content'] 	= load_view('404_view','',TRUE);

		}
		load_template($data,$this->active_theme);

	}

	public function posts($start=0)

	{			
		$value['recents']		=  $this->show_model->get_properties_by_range($start,$this->PER_PAGE,'id','desc');

		$value['featured']		=  $this->show_model->get_featured_properties_by_range($start,$this->PER_PAGE,'id','desc');

        $value['view_style'] = 'grid';

		$data['content'] 	= load_view('home_view',$value,TRUE);

		$data['alias']	    = 'dbc_home';

		load_template($data,$this->active_theme);

	}



	public function properties($type='recent',$start=0)

	{			

		$value['page_title']	= 'All '.ucfirst($type);

		if($type=='recent')

		{

			$value['query']			= $this->show_model->get_properties_by_range($start,$this->PER_PAGE,'id');

	        $total 					= $this->show_model->count_properties();			

		}

		elseif($type=='top')

		{

			$value['query']			= $this->show_model->get_properties_by_range($start,$this->PER_PAGE,'total_view','desc');

	        $total 					= $this->show_model->count_properties();			

		}

		elseif($type=='featured')

		{

			$value['query']			= $this->show_model->get_featured_properties_by_range($start,$this->PER_PAGE,'id');

	        $total 					= $this->show_model->count_featured_properties();			

		}

		

		$value['pages']			= configPagination('show/properties/'.$type,$total,5,$this->PER_PAGE);



        $value['view_style'] 	= 'grid';

		$data['content'] 		= load_view('general_view',$value,TRUE);

		$data['alias']	    	= 'type';

		load_template($data,$this->active_theme);

	}



	public function type($type='',$start=0)

	{		
		if(!isset($type)||$type=='')
			$type = "'Blanks'";
		else
			$type = urldecode($type);

		$value['page_title']	= 'All '.lang_key($type);

		$value['query']			= $this->show_model->get_properties_by_type_range($type,$start,$this->PER_PAGE,'id');

        $total 					= $this->show_model->count_properties_by_type($type);

		$value['pages']			= configPagination('show/type/'.$type,$total,5,$this->PER_PAGE);



        $value['view_style'] 	= 'grid';

		$data['content'] 		= load_view('general_view',$value,TRUE);

		$data['alias']	    	= 'type';

		load_template($data,$this->active_theme);

	}



	public function purpose($purpose='DBC_PURPOSE_SALE',$start=0)

	{		

		$value['page_title']	= 'All '.lang_key($purpose);

		$value['query']			= $this->show_model->get_properties_by_purpose_range($purpose,$start,$this->PER_PAGE,'id');

        $total 					= $this->show_model->count_properties_by_purpose($purpose);

		$value['pages']			= configPagination('show/purpose/'.$purpose,$total,5,$this->PER_PAGE);



        $value['view_style'] 	= 'grid';

		$data['content'] 		= load_view('general_view',$value,TRUE);

		$data['alias']	    	= 'purpose';

		load_template($data,$this->active_theme);

	}

	#get all car information by term

	public function all($term ='recent', $start = '') {



		if($term=='recent') {

			

			$query = $this->show_model->get_recent_cars($start);

			echo '<pre/>';

			print_r($query->result());

			if($query->num_rows()>0) {

				

				foreach($query->result() as $row) {

					print_r($row);

				}



			}



			else {

				echo "no result found for recent cars";

			}

 			

		}



		else if($term=='featured') {

			

			$query = $this->show_model->get_featured_cars($start);

			echo '<pre/>';

			

			if($query->num_rows()>0) {

				

				foreach($query->result() as $row) {

					print_r($row);

				}



			}



			else {

				echo "no result found for featured cars";

			}

		}



		else {

			//undefined term

		}

	}



	public function all_by_agent($agent_id='', $start='') {



		if(!isset($agent_id) || $agent_id=='') {

			

    		return ;

		}



		$query = $this->show_model->get_cars_by_agent($agent_id,$start);



		echo '<pre/>';

			

		if($query->num_rows()>0) {

			

			foreach($query->result() as $row) {

				print_r($row);

			}



		}



		else {

			echo "no result found for the agent";

		}

	}



	public function detail($unique_id='')

	{	

		$captcha = $this->get_new_captcha();

		$this->session->set_userdata('captcha_word',$captcha['word']);

		$value['captcha_img']	= $captcha['image'];

		$value['post']		= $this->show_model->get_post_by_unique_id($unique_id);

		if($value['post']->num_rows()>0)
		{
			$post = $value['post']->row();
			if($post->status==0)
			{
				$this->output->set_status_header('404');
				$data['content'] 	= load_view('404_view','',TRUE);
		        load_template($data,$this->active_theme,'template_view');
			}
			else
			{
				// print_r($post);
				// die;

				$data['content'] 	= load_view('detail_view',$value,TRUE);

				$data['alias']	    = 'detail';

				load_template($data,$this->active_theme);
				
			}
			
		}
		else
		{
				$this->output->set_status_header('404');
				$data['content'] 	= load_view('404_view','',TRUE);
		        load_template($data,$this->active_theme,'template_view');			
		}

	}



	public function contact()

	{

		$data['content'] 	= load_view('contact_view','',TRUE);

		$data['alias']	    = 'contact';

		load_template($data,$this->active_theme);

	}



	public function search($start=0)

	{

		$value['data']		= array();

		$value['query']		= $this->show_model->get_properties_by_range($start,$this->PER_PAGE,'id');

		$total = $this->show_model->count_properties();

		$value['pages']		= configPagination('show/search/',$total,4,$this->PER_PAGE);

		$data['content'] 	= load_view('adsearch_view',$value,TRUE);

		$data['alias']	    = 'search';

		load_template($data,$this->active_theme);		

	}



	public function instant_search_ajax()

	{

	

		$this->load->helper('html');

		$this->load->helper('url');



		$response = '';



		$search_string =  $this->input->post('query');

		if(strlen($search_string)>3) {



			$search_result = $this->show_model->get_plain_search_result($search_string);

			if($search_result->num_rows()>0) {

				foreach ($search_result->result() as $row) {

					

					$anchor_text = substr($row->address, 0, 100);

					$response .= anchor("#", $anchor_text, "class = form-control");

				}

				echo $response;

			}



			else

				echo 'hide';

		}

		

		else 

			echo 'hide';



	}



    public function list_view()

    {

        $value['view_style'] = 'list';

        $data['content'] 	= load_view('home_view',$value,TRUE);

        $data['alias']	    = 'home';

        load_template($data,$this->active_theme);

    }



    public function toggle($type='grid',$url='')

    {

    	$this->session->set_userdata('view_style',$type);

    	$url = base64_decode($url);

    	redirect($url);

    }



    public function terms()

    {

        $data['content'] 	= load_view('termscondition_view','',TRUE);

        $data['alias']	    = 'terms';

        load_template($data,$this->active_theme);

    }



    public function advfilter()

    {

    	$string = '';



    	foreach ($_POST as $key => $value) {

    		if(is_array($value))

    		{

    			$val = '';

    			foreach ($value as $row) {

    				$val .= $row.',';

    			}

    			$string .= $key.'='.$val.'-';	

    		}

    		else

			{

	    		$string .= $key.'='.$value.'-';			

			}    			

    	}

    	redirect(site_url('show/result/'.$string));

    }



    public function result($string='',$start='0')

    {
    	$data = array();

    	$string = rawurldecode($string);

    	$values = explode("-",$string);

    	foreach ($values as $value) {

    		$get 	= explode("=",$value);

    		$s 		= (isset($get[1]))?$get[1]:'';

    		$val 	= explode(",",$s);

    		if(count($val)>1)

    		{

	    		$data[$get[0]] = $val;

    		}

    		else

	    		$data[$get[0]] = (isset($get[1]))?$get[1]:'';

    	}

    	#next code block gets the minimum and maximum price from the price range slider value
    	if(isset($data['range_slider'])) {
	    	$price_range = explode(';', $data['range_slider']);
	    	$data['price_min'] = $price_range[0];
	    	$data['price_max'] = $price_range[1];
	    	$max_car_price =  get_settings('carshop_settings','max_car_price',5000);
	    	if($max_car_price<=$data['price_max']) {
	    		unset($data['price_max']);
	    	}
    	}

    	#next code block gets the minimum and maximum mileage from the mileage range slider value
    	if(isset($data['mileage_slider'])) {
	    	$mileage_range = explode(';', $data['mileage_slider']);
	    	$data['mileage_min'] = $mileage_range[0];
	    	$data['mileage_max'] = $mileage_range[1];
	    	if($data['mileage_max']>=10000) {
	    		unset($data['mileage_max']);
	    	}
    	}

    	$value 	= array();

    	$value['data'] = $data;

    	#echo "<pre>";print_r($data);die;

    	#get cars based on the advanced search criteria

    	$value['query'] 		= $this->show_model->get_advanced_search_result($data,$start,$this->PER_PAGE);

		$total 					= $this->show_model->count_search_result($data);

        $value['pages']			= configPagination('show/result/'.$string,$total,5,$this->PER_PAGE);



    	$data 	= array();

    	$data['content'] 		= load_view('adsearch_view',$value,TRUE);

		$data['alias']	    	= 'contact';

		load_template($data,$this->active_theme);

    }



    public function get_states_ajax($term='')

	{

		$this->load->model('admin/carshop_model');

		if($term=='')

			$term = $this->input->post('term');

		$country = $this->input->post('country');

		$data = $this->carshop_model->get_locations_json($term,'state',$country);	

		echo json_encode($data);

	}



	public function get_cities_ajax($term='')

	{

		$this->load->model('admin/carshop_model');

		if($term=='')

			$term = $this->input->post('term');

		$state = $this->input->post('state');

		$data = $this->carshop_model->get_locations_json($term,'city',$state);	

		echo json_encode($data);

	}



	public function dealer($start='0')

	{

        $value['query']			= $this->show_model->get_users_by_range($start,$this->PER_PAGE,'id');

        $total 					= $this->show_model->count_users();

        $value['pages']			= configPagination('show/dealer/',$total,4,$this->PER_PAGE);

		$data['content'] 	= load_view('agent_view',$value,TRUE);

		$data['alias']	    = 'dealer';

		load_template($data,$this->active_theme);	

	}



	public function dealervehicles($user_id='0',$start=0)

	{	

		$value['user']			= $this->show_model->get_user_by_userid($user_id);	

		$value['page_title']	= lang_key('dealer_vehicles');

		$value['query']			= $this->show_model->get_all_cars_agent($user_id,$start,$this->PER_PAGE,'id');

        $total 					= $this->show_model->count_all_cars_agent($user_id);

		$value['pages']			= configPagination('show/dealervehicles/'.$user_id,$total,5,$this->PER_PAGE);



        $value['view_style'] 	= 'grid';

		$data['content'] 		= load_view('agent_properties_view',$value,TRUE);

		$data['alias']	    	= 'type';

		load_template($data,$this->active_theme);

	}



	public function page($alias='')

	{	

		$value['alias']   = $alias;

		$value['query']  = $this->show_model->get_page_by_alias($alias);

		$data['content'] = load_view('page_view',$value,TRUE,$this->active_theme);

		$data['alias']   = $alias;

		load_template($data,$this->active_theme);

	}

	function check_captcha_code($str)
	{

		if (strcasecmp($str, $this->session->userdata('captcha_word')) != 0)
		{
			$this->form_validation->set_message('check_captcha_code', 'Captcha not correct');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function sendemailtoagent($agent_id='0')

	{

		$this->form_validation->set_rules('sender_name', 'Name', 'required');

		$this->form_validation->set_rules('sender_email', 'Email', 'required|valid_email');

		$this->form_validation->set_rules('subject', 'Subject', 'required');

		$this->form_validation->set_rules('msg', 'Message', 'required');

		$this->form_validation->set_rules('captcha_ans', 'Code', 'required|callback_check_captcha_code');

		$unique_id 	= $this->input->post('unique_id');		

		$title 		= $this->input->post('title');		

		if ($this->form_validation->run() == FALSE)

		{

			$this->detail($unique_id,$title);	

		}

		else

		{

			$data['sender_email'] = $this->input->post('sender_email');
			$data['sender_name']  = $this->input->post('sender_name');
			$data['subject']  	  = $this->input->post('subject');
			$data['msg']  		  = $this->input->post('msg');

			$data['msg']		 .= "<br /><br /> This email was sent from the following page:<br /><a href=\"".site_url('show/detail/'.$unique_id.'/'.$title)."\" target=\"_blank\">".site_url('show/detail/'.$unique_id.'/'.$title)."</a>";

			add_user_meta($agent_id,'query_email#'.time(),json_encode($data));

			$this->load->library('email');

			$config['mailtype'] = "html";

			$config['charset'] 	= "utf-8";

			$this->email->initialize($config);



			$this->email->from($this->input->post('sender_email'),$this->input->post('sender_name'));

			$this->email->to(get_user_email_by_id($agent_id));


			$detail_link = site_url('show/detail/'.$unique_id);
			$msg = $this->input->post('msg');
			$msg .= "<br/><br/>Email sent from : ".'<a href="'.$detail_link.'">'.$detail_link.'</a>';

			$this->email->subject($this->input->post('subject'));

			$this->email->message($msg);



			$this->email->send();



			$this->session->set_flashdata('msg', '<div class="alert alert-success">Email sent</div>');

			redirect(site_url('show/detail/'.$unique_id.'/'.$title));			

		}

	}



	public function sendcontactemail()

	{

		$this->form_validation->set_rules('sender_name', 'Name', 'required');

		$this->form_validation->set_rules('sender_email', 'Email', 'required|valid_email');

		$this->form_validation->set_rules('msg', 'Message', 'required');

		if ($this->form_validation->run() == FALSE)

		{

			$this->contact();	

		}

		else

		{



			$this->load->library('email');

			$config['mailtype'] = "html";

			$config['charset'] 	= "utf-8";

			$this->email->initialize($config);



			$this->email->from($this->input->post('sender_email'),$this->input->post('sender_name'));

			$this->email->to(get_settings('webadmin_email','contact_email','support@example.com'));



			$this->email->subject(lang_key('contact_subject'));

			$this->email->message($this->input->post('msg'));



			$this->email->send();



			$this->session->set_flashdata('msg', '<div class="alert alert-success">Email sent</div>');

			redirect(site_url('show/contact/'));			

		}

	}

    public function printview($unique_id='')

    {

        $value['post']		= $this->show_model->get_post_by_unique_id($unique_id);

        $data['content'] 	= load_view('print_view',$value,TRUE);

        echo $data['content'];

    }

    public function embed($unique_id='')

	{	

		$value['post']		= $this->show_model->get_post_by_unique_id($unique_id);

		load_view('embed_view',$value);

	}

	public function get_min_max_car_price_ajax() {
		$min_price = get_settings('carshop_settings','min_car_price','NO');
		$max_price = get_settings('carshop_settings','max_car_price','NO');
		if($min_price=='NO'||$min_price==null) {
			$min_price = 0;
		}
		if($max_price=='NO'||$max_price==null) {
			$max_price = 5000;
		}
		echo json_encode(array('min_price'=>$min_price,'max_price'=>$max_price));

	}

	public function rss()
	{
		$this->load->helper('date');
		$this->load->helper('xml');
		$curr_lang 	= $this->uri->segment(1);
		if($curr_lang=='')
		$curr_lang = default_lang();

		$value = array();	
		$value['curr_lang'] = $curr_lang;	
		$value['feed_name'] = translate(get_settings('site_settings','site_title','carshop'));
        $value['encoding'] = 'utf-8';
        $value['feed_url'] = site_url('show/rss');
        $value['page_description'] = lang_key('your_web_description');
        $value['page_language'] = $curr_lang.'-'.$curr_lang;
        $value['creator_email'] = get_settings('webadmin_email','contact_email','');
        $value['posts']	=  $this->show_model->get_properties_by_range(0,$this->PER_PAGE,'id','desc');
       	
       	header("Content-Type: application/rss+xml");
		load_view('rss_view',$value,FALSE,$this->active_theme);
	}

	//this function is needed here so that login is not required
	public function get_models_ajax(){
		if($this->input->post('brand')!=null) {

			$models = get_all_models($this->input->post('brand'));
			$html = '<option value="">'.lang_key('all').'</option>';
			foreach ($models->result() as $row) {
				$html .= '<option value="'.$row->id.'">'.lang_key($row->name).'</option>';
			}
			echo $html;
			return;
		}
		else{
			$html = '<option value="">'.lang_key('all').'</option>';
			echo $html;
			return;
		}
	}

	//this function generates a new random captcha
	public function get_new_captcha() {

		$captcha_word = random_string('alnum', 8);

		$params = array(
			'word'			=> $captcha_word,
			'img_path'		=> './assets/captcha/',
			'img_url'		=> base_url().'/assets/captcha/',
			'font_path'		=> './assets/captcha/font/cap.ttf',
			'img_width'		=> '200',
			'img_height'	=> '50',
			'expiration'	=> '1800'
		);

		$captcha = create_captcha($params);

		return $captcha;
	}

	public function tag($string='',$start='0')

    {

    	$data = array();

    	$data['plainkey'] = $string;

    	$value 	= array();

    	$value['data'] = $data;



    	#get cars based on the advanced search criteria

    	

    	$value['query'] = $this->show_model->get_advanced_search_result($data,$start,$this->PER_PAGE);

		$total 					= $this->show_model->count_search_result($data);

        $value['pages']			= configPagination('tags/'.$string,$total,4,$this->PER_PAGE);



    	$data 	= array();

    	$data['content'] 	= load_view('adsearch_view',$value,TRUE);

		$data['alias']	    = 'contact';

		load_template($data,$this->active_theme);

    }
}





/* End of file install.php */

/* Location: ./application/modules/show/controllers/show_core.php */