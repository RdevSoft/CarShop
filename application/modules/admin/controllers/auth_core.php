<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * carshop auth Controller
 *
 * This class handles user authentication related functionality
 *
 * @package		Auth
 * @subpackage	Auth
 * @author		RdevSoft
 * @link		
 */


class Auth_core extends MX_Controller {
								
	public function __construct()
	{
		parent::__construct();
		is_installed();#defined in bookit helper
		$this->load->model('auth_model');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	}
	
	function index()
	{
		$this->load->view('admin/login_view');
	}
			
	function changepass()
	{
		if(!is_admin() && $this->session->userdata('user_type')!=2)
		{
			if(count($_POST)<=0)
			$this->session->set_userdata('req_url',current_url());
			redirect(site_url('admin/auth'));
		}

		$data['title']		= 'Change Password';		
		$data['content'] 	= $this->load->view('admin/profile/changepassword_view','',TRUE);
		$this->load->view('admin/template/template_view',$data);
	}
	
	#current password validation function for password changing
	function currentpass_check($str)
	{
		$user_name = $this->session->userdata('user_name');
		$res = $this->auth_model->check_login($user_name,$str);
		if ($res<=0)
		{
			$this->form_validation->set_message('currentpass_check', 'Current password Didn\'t match');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	#update password function
	function update_password()
	{
		if(!is_admin() && $this->session->userdata('user_type')!=2)
		{
			if(count($_POST)<=0)
			$this->session->set_userdata('req_url',current_url());
			redirect(site_url('admin/auth'));
		}

		if($this->session->userdata('recovery')!='yes')
		$this->form_validation->set_rules('current_password', 'Current Password', 'required|callback_currentpass_check');
		
		$this->form_validation->set_rules('new_password', 'New Password', 'required|matches[re_password]');
		$this->form_validation->set_rules('re_password', 'Password Confirmation', 'required');
			
		if ($this->form_validation->run() == FALSE)
		{
			$this->changepass();	
		}
		else
		{
			if(constant("ENVIRONMENT")=='demo')
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			}
			else
			{
				
				$password = $this->input->post('new_password');
				$this->auth_model->update_password($password);
				$this->session->set_userdata('recovery',"no");
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Password changed successfully</div>');
			}
			redirect(site_url('admin/auth/changepass'));		
		}
	
	}
	
	#load forgot password view
	function forgotpass()
	{
		$this->load->view('admin/forgot_password_view');
	}
	
	#forgot password function
	#check if given email is valid or not
	#if valid then send a recovery email
	function recoverpassword()
	{
		$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|xss_clean|callback_useremail_check');
			
		if ($this->form_validation->run() == FALSE)
		{
			$this->forgotpass();	
		}
		else
		{
			$user_email = $this->input->post('user_email');
			$val = $this->auth_model->set_recovery_key($user_email);
			$this->_send_recovery_email($val);
			$this->session->set_flashdata('msg', '<div class="alert alert-success">A email is send to your inbox.Check that email.</div>');
			redirect(site_url('admin/auth/forgotpass'));		
		}
	}
	
	#recovery email validation function
	function useremail_check($str)
	{
		$res = $this->auth_model->is_email_exists($str);
		if ($res<=0)
		{
			$this->form_validation->set_message('useremail_check', 'Email Not matched');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function _send_recovery_email($data)
	{
		$domain = preg_replace("/^[\w]{2,6}:\/\/([\w\d\.\-]+).*$/","$1", $this->config->slash_item('base_url'));
		$this->load->library('email');		
		$this->email->from('webmaster@'.$domain, 'Recovery Email');
		$this->email->to($data['user_email']);
		$this->email->subject('Password Recovery Email');
		$link = site_url('admin/auth/resetpassword').'/'.$data['user_name'].'/'.$data['recovery_key'];
		$this->email->message("Please click the below link for resetting your password.\n".$link);		
		$this->email->send();
	}
	
	function resetpassword($user_name='',$recovery_key='')
	{
		$res = $this->auth_model->verify_recovery($user_name,$recovery_key);	
		if($res>0)
		{
			$this->session->set_userdata('user_name',$user_name);
			$this->session->set_userdata('recovery',"yes");
			redirect(site_url('admin/auth/changepass'));
		}
		else
		{
			$this->session->set_flashdata('msg', '<div class="alert alert-block">Password Recovery Link Is Not Valid</div>');
			redirect(site_url('admin/auth/forgotpass'));
		}
	}
	#*************************************************#
	#login function
	function login()
	{
		$user_name = $this->input->post('username');
	    $password  = $this->input->post('password');
		$query = $this->auth_model->check_login($user_name,$password,'result');
		
		if($query->num_rows()>0)
		{					
			$row = $query->row();
			$ok = 0;
			if($row->user_type==1)
			{
				$ok=1;
			}
			else
			{
				if($row->confirmed==1)
					$ok=1;
				else
					$ok=-0;
			}

			if($ok==1)
			{
				create_log($user_name);
				if($this->input->post('remember'))	
				$this->auth_model->set_login_cookie($user_name);
				$this->session->set_userdata('user_id',$row->id);
				$this->session->set_userdata('user_type',$row->user_type);
				$this->session->set_userdata('user_name',$user_name);
				$this->session->set_userdata('user_email',$row->user_email);			
				if($this->session->userdata('req_url')!='')
				{				
					redirect($this->session->userdata('req_url'));
				}
				else
				{

					$lang = $this->input->post('lang');
					redirect(site_url('admin',$lang));
				}				
			}
			else
			{
				$data = array('error'=>'<div class="alert alert-danger" style="margin-top:10px;">Account not confirmed</div>');
				$this->load->view('admin/login_view',$data);				
			}
		}
		else
		{
			$data = array('error'=>'<div class="alert alert-danger" style="margin-top:10px;">Login Failed</div>');
			$this->load->view('admin/login_view',$data);
		}
	}
	#logout function
	function logout()
	{
		$is_admin = is_admin();
		delete_cookie('key','localhost','/','mycookie_');
		delete_cookie('user','localhost','/','mycookie_');
		$this->session->sess_destroy();
		if($is_admin)
		redirect(site_url('admin/auth'));
		else
		redirect(site_url());
	}
	

	function newaccount()
	{
        $this->load->model('admin/package_model');
        $data['packages']		= $this->package_model->get_all_packages_by_range('all');
		$this->load->view('admin/register_view', $data);
	}

    function useremail_check_signup($str)
    {
        $res = $this->auth_model->is_email_exists($str);
        if ($res > 0)
        {
            $this->form_validation->set_message('useremail_check_signup', 'Email already exists.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function username_check_signup($str)
    {
        $res = $this->auth_model->is_username_exists($str);
        if ($res > 0)
        {
            $this->form_validation->set_message('username_check_signup', 'Username already exists.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

	function signup()
	{
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger signup-alert">', '</div>');

        $this->form_validation->set_rules('user_name',	'Username', 'required|callback_username_check_signup');
        $this->form_validation->set_rules('first_name',	'First Name', 'required');
        $this->form_validation->set_rules('last_name',	'Last Name', 'required');
		$this->form_validation->set_rules('user_email',	'Email', 'required|valid_email|callback_useremail_check_signup');
        $this->form_validation->set_rules('password', 	'Password', 		'required|matches[re_password]|min_length[5]|xss_clean');
        $this->form_validation->set_rules('re_password',	'Retype Password', 	'required|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$this->newaccount();	
		}
		else
		{
            $this->load->library('encrypt');

            $userdata['user_type']	= 3;//3 = agent

            $userdata['first_name'] = $this->input->post('first_name');

            $userdata['last_name'] 	= $this->input->post('last_name');

            $userdata['user_name'] 	= $this->input->post('user_name');

            $userdata['user_email'] = $this->input->post('user_email');

            $userdata['password'] 	= $this->encrypt->sha1($this->input->post('password'));

            $userdata['confirmation_key'] 	= uniqid();

            $userdata['confirmed'] 	= 0;

            $userdata['status']		= 1;



            $this->auth_model->insert_user($userdata);

            $this->send_confirmation_email($userdata);

            $this->session->set_flashdata('msg', '<div class="alert alert-success">Confirmation email send.Please follow the instructions from that email.</div>');

            redirect(site_url('admin/auth'));
		}
	}

    public function send_confirmation_email($data=array('username'=>'user','useremail'=>'mail@mail.com','confirmation_key'=>'1234'))

    {

        $val = $this->get_admin_email_and_name();

        $admin_email = $val['admin_email'];

        $admin_name  = $val['admin_name'];

        $link = site_url('admin/auth/confirm/'.$data['user_email'].'/'.$data['confirmation_key']);



        $this->load->model('admin/system_model');

        $tmpl = $this->system_model->get_email_tmpl_by_email_name('confirmation_email');

        $subject = $tmpl->subject;

        $subject = str_replace("#username",$data['user_name'],$subject);

        $subject = str_replace("#activationlink",$link,$subject);

        $subject = str_replace("#webadmin",$admin_name,$subject);

        $subject = str_replace("#useremail",$data['user_email'],$subject);



        $body = $tmpl->body;

        $body = str_replace("#username",$data['user_name'],$body);

        $body = str_replace("#activationlink",$link,$body);

        $body = str_replace("#webadmin",$admin_name,$body);

        $body = str_replace("#useremail",$data['user_email'],$body);


        $this->load->library('email');

        $this->email->from($admin_email, $subject);

        $this->email->to($data['user_email']);

        $this->email->subject($subject);

        $this->email->message($body);

        $this->email->send();

    }

    public function get_admin_email_and_name()

    {

        $this->load->model('admin/options_model');

        $values = $this->options_model->getvalues('webadmin_email');

        if(count($values))

        {

            $data['admin_email'] = (isset($values->webadmin_email))?$values->webadmin_email:'admin@'.$_SERVER['HTTP_HOST'];

            $data['admin_name']  = (isset($values->webadmin_name))?$values->webadmin_name:'Admin';

        }

        else

        {

            $data['admin_email'] = 'admin@'.$_SERVER['HTTP_HOST'];

            $data['admin_name']  = 'Admin';

        }

        return $data;

    }

    #confirmation email link points here
    public function confirm($email='',$code='')

    {

        $this->load->model('auth_model');

        $res = $this->auth_model->confirm_email($email,$code);

        if($res==TRUE)

        {

            $this->session->set_flashdata('msg', '<div class="alert alert-success">Email confirmed.You can now login with your email and password</div>');

            redirect(site_url('admin/auth'));

        }

        else

        {

            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Confirmation failed.Confirmation email and code doen\'t match.</div>');

            redirect(site_url('admin/auth'));

        }

    }

    function test()
    {
        $this->load->library('email');

        $this->email->from('admin@dbc.com',"Test email");

        $this->email->to('shimulcsedu@gmail.com');

        $this->email->subject("Test");

        $this->email->message("Hello world");

        $this->email->send();
    }
}

/* End of file auth.php */
/* Location: ./system/application/modules/admin/controllers/auth.php */