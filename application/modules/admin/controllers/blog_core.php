<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * carshop page Controller
 *
 * This class handles page management related functionality
 *
 * @package		Admin
 * @subpackage	Page
 * @author		RdevSoft
 * @link		
 */

class Blog_core extends CI_Controller {
	
	var $per_page = 10;
	
	public function __construct()
	{
		parent::__construct();
		is_installed(); #defined in auth helper
		checksavedlogin(); #defined in auth helper
		
		if(!is_admin())
		{
			if(count($_POST)<=0)
			$this->session->set_userdata('req_url',current_url());
			redirect(site_url('admin/auth'));
		}

		$this->per_page = get_per_page_value_admin();#defined in auth helper

		$this->load->model('blog_model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	}
	
	public function index()
	{
		$this->all();
	}

		#load all services view with paging
	public function all($start='0')
	{
		$value['posts']  	= $this->blog_model->get_all_posts_by_range($start,$this->per_page,'create_time');
		$total 				= $this->blog_model->count_all_posts();
		$value['pages']		= configPagination('admin/blog/all',$total,5,$this->per_page);
        $data['title'] = 'All Posts';
        $data['content'] = $this->load->view('admin/blog/allposts_view',$value,TRUE);
		$this->load->view('admin/template/template_view',$data);		
	}


	public function manage($id='')
	{
		$values 		= array();
		$values['title'] = 'New Post';
		if($id!='')
		{
			$values['title']  		= 'Update Post';
			$values['action_type']  = 'update';
			$values['page'] 		= $this->blog_model->get_post_by_id($id);
		}

        $data['content'] = $this->load->view('blog/post_view',$values,TRUE);
		$this->load->view('admin/template/template_view',$data);			
	}


	public function add()
	{

		$this->form_validation->set_rules('title_'.default_lang(), lang_key('Post title'), 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			if($this->input->post('action_type')=='update')
				$this->manage($this->input->post('id'));
			else
				$this->manage();	
		}
		else
		{
			$data['featured_img'] 	= $this->input->post('featured_img');
			$data['type'] 			= $this->input->post('type');

			$this->load->model('admin/system_model');
            $langs = $this->system_model->get_all_langs();
            $titles = array();
            $descriptions = array();
            foreach ($langs->result() as $lang)
            { 
            	$titles[$lang->short_name] = $this->input->post('title_'.$lang->short_name);
            	$descriptions[$lang->short_name] = $this->input->post('description_'.$lang->short_name);
            }        	
			
			if (version_compare(PHP_VERSION, '5.4.0') >= 0) 
			{
				$data['title'] 			= json_encode($titles,JSON_UNESCAPED_UNICODE);
				$data['description'] 	= json_encode($descriptions,JSON_UNESCAPED_UNICODE);
			}
			else
			{
				$data['title'] 			= json_encode($titles,JSON_UNESCAPED_UNICODE);
				$data['description'] 	= json_encode($descriptions,JSON_UNESCAPED_UNICODE);				
			}
			
			$data['created_by']		= $this->session->userdata('user_id');
			$data['create_time']	= time();
			$data['status']			= $this->input->post('action');
			

			if(constant("ENVIRONMENT")=='demo')
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			}
			else
			{
				if($this->input->post('action_type')=='update')
				{
					$id = $this->input->post('id');
					$this->blog_model->update_post($data,$id);
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Post updated</div>');				
				}
				else
				{
					$id = $this->blog_model->insert_post($data);
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Post Created</div>');				
				}				
			}	

			redirect(site_url('admin/blog/manage/'.$id));		
		}

	}
	

	public function delete($page='0',$id='',$confirmation='')
	{
		if($confirmation=='')
		{
			$data['content'] = $this->load->view('admin/confirmation_view',array('id'=>$id,'url'=>site_url('admin/blog/delete/'.$page)),TRUE);
			$this->load->view('admin/template/template_view',$data);
		}
		else
		{
			if($confirmation=='yes')
			{
				if(constant("ENVIRONMENT")=='demo')
				{
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
				}
				else
				{
					$this->blog_model->delete_post_by_id($id);
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Post Deleted</div>');					
				}
			}
			redirect(site_url('admin/blog/all/'.$page));		
			
		}		
	}


	public function featuredimguploader()

	{

		$this->load->view('admin/blog/featured_img_uploader_view');

	}

	public function uploadfeaturedfile()

	{

		$date_dir = 'thumbs/';

		$config['upload_path'] = './uploads/'.$date_dir;

		$config['allowed_types'] = 'gif|jpg|png';

		$config['max_size'] = '5120';

		$config['min_width'] = '256';

		$config['min_height'] = '256';



		$this->load->library('dbcupload', $config);

		$this->dbcupload->display_errors('', '');	

		if($this->dbcupload->do_upload('photoimg'))

		{

			$data = $this->dbcupload->data();

			$this->load->helper('date');

			$format = 'DATE_RFC822';

			$time = time();

            create_rectangle_thumb('./uploads/'.$date_dir.$data['file_name'],'./uploads/thumbs/');

			$media['media_name'] 		= $data['file_name'];

			$media['media_url']  		= base_url().'uploads/'.$date_dir.$data['file_name'];

			$media['create_time'] 		= standard_date($format, $time);

			$media['status']			= 1;

			

			$status['error'] 	= 0;

			$status['name']	= $data['file_name'];

		}

		else

		{

			$errors = $this->dbcupload->display_errors();

			$errors = str_replace('<p>','',$errors);

			$errors = str_replace('</p>','',$errors);

			$status = array('error'=>$errors,'name'=>'');

		}



		echo json_encode($status);

		die;

	}

	//added on version 1.7
	function migrate()
	{
		$option = get_option('migrate_1_7');
		if(is_array($option) && isset($option['error']))
		{

			$this->load->database();

			$sql = "ALTER TABLE `".$this->db->dbprefix('blog')."` CHANGE `title` `title` LONGTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;";
			$this->db->query($sql);


			$query = $this->db->get('blog');

			$this->load->model('admin/system_model');
	        $langs = $this->system_model->get_all_langs();

	        $default_lang =  default_lang();


	        $flag = 1;

			foreach($query->result() as $row)
			{
				$title = array();
				$desc = array();

				foreach ($langs->result() as $lang) 
				{
					$title[$lang->short_name] = '';
					$desc[$lang->short_name] = '';
				}

				$title[$default_lang] = $row->title;
				$desc[$default_lang] = $row->description;

				$this->db->update('blog',array('title'=>json_encode($title),'description'=>json_encode($desc)),array('id'=>$row->id));
				echo 'Done row : '.$flag.'<br/>';
				$flag++;
			}
			add_option('migrate_1_7','yes');
		}
		else
			echo '<h4>Already migrated blog data to 1.7</h4>';

	}
	//end



}

/* End of file page_core.php */
/* Location: ./application/modules/admin/controllers/page_core.php */