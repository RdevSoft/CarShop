<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * carshop users Controller
 *
 * This class handles users management related functionality
 *
 * @package		Admin
 * @subpackage	users
 * @author		RdevSoft
 * @link		
 */

class Users_core extends CI_Controller {
	
	var $per_page = 3;
	
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
//        $this->per_page = 2;
		$this->load->model('users_model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger input-xlarge">', '</div>');
	}
	
	public function index()
	{
		$this->all();
	}

	#load all services view with paging
	public function all($start='0')
	{
		$value['posts']  	= $this->users_model->get_all_users_by_range($start,$this->per_page,'id');

        $data['title'] = 'Dealers';
        $data['content'] = $this->load->view('admin/users/allusers_view',$value,TRUE);
		$this->load->view('admin/template/template_view',$data);		
	}


	public function ban_user($user_id=0, $page = 1)
	{
		if(constant("ENVIRONMENT")=='demo')
		{
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
		}
		else
		{
	        $this->users_model->ban_user($user_id);
	        $this->session->set_flashdata('msg', '<div class="alert alert-success">User has been banned.</div>');
		}
        redirect(site_url('admin/users/all/' . $page));
    }

    public function unban_user($user_id=0, $page = 1)
    {
    	if(constant("ENVIRONMENT")=='demo')
		{
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
		}
		else
		{
	        $this->users_model->unban_user($user_id);
	        $this->session->set_flashdata('msg', '<div class="alert alert-success">User has been un-banned.</div>');
		}
        redirect(site_url('admin/users/all/' . $page));
    }

	public function update_menu()
	{
		if(constant("ENVIRONMENT")=='demo')
		{
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
		}
		else
		{
			add_option('top_menu',$this->input->post('top_menu'));
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Menu updated</div>');
		}
		redirect(site_url('admin/page/menu'));
	}

	public function detail($id)
	{
		$value['profile'] = $this->users_model->get_user_by_id($id);
        $data['title'] = 'User Profile';
		$data['content'] = $this->load->view('users/detail_view',$value,TRUE);
		$this->load->view('admin/template/template_view',$data);		
	}

	public function banuser($page='0',$id='',$limit='')
	{
		$this->load->model('user/user_model');
		if($limit=='forever')
		{
			if(constant("ENVIRONMENT")=='demo')
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			}
			else
			{
				$this->user_model->banuser($id,$limit);
				$this->session->set_flashdata('msg', '<div class="alert alert-success">User banned</div>');
			}
			redirect(site_url('admin/userdetail/'.$id));			
		}

		$this->form_validation->set_rules('limit',	'Limit', 'required|numeric|xss_clean');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->userdetail($id);	
		}
		else
		{
			if(constant("ENVIRONMENT")=='demo')
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			}
			else
			{
				$limit = $this->input->post('limit');
				$this->user_model->banuser($id,$limit);
				$this->session->set_flashdata('msg', '<div class="alert alert-success">User banned</div>');
			}
			redirect(site_url('admin/userdetail/'.$id));
		}
	}

	function exportemails()
	{
		$query = $this->users_model->get_all_user_emails();
		$this->load->dbutil();
		$data = $this->dbutil->csv_from_result($query); 

	    # Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download('userlist.csv', $data);	

	}

	// added on version 1.5
	public function sendemail()
	{
		if(!is_admin())
		{
			die("You don't have access");
		}

		$value['posts']  	= $this->users_model->get_all_user_emails();
		

		$data['title'] = 'Bulk Email';

		$data['content'] = $this->load->view('admin/users/bulk_email_view',$value,TRUE);

		$this->load->view('admin/template/template_view',$data);
	}

	public function sendbulkemail()

	{

		$this->form_validation->set_rules('to', 'To', 'required');

		$this->form_validation->set_rules('subject', 'Subject', 'required');

		$this->form_validation->set_rules('message', 'Message', 'required');

		if ($this->form_validation->run() == FALSE)

		{
			$this->sendemail();	

		}

		else

		{

			if(constant("ENVIRONMENT")=='demo')
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Bulk email sent.[NOT AVAILABLE ON DEMO]</div>');
			}
			else
			{
				$to 		= (isset($_POST['to']) && is_array($_POST['to']))?$_POST['to']:array();
				$subject 	= $this->input->post('subject');
				$message 	= $this->input->post('message');
				
				$this->load->library('email');

				$config['mailtype'] = "html";

				$config['charset'] 	= "utf-8";

				$this->email->initialize($config);



				$this->email->from($this->session->userdata('user_email'),$this->session->userdata('user_name'));

				$this->email->to($to);



				$this->email->subject($subject);

				$this->email->message($message);



				$this->email->send();



				$this->session->set_flashdata('msg', '<div class="alert alert-success">Email sent</div>');				
			}

			redirect(site_url('admin/users/sendemail'));			

		}

	}
	//end
}

/* End of file users.php */
/* Location: ./application/modules/admin/controllers/admin.php */