<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * carshop auth model
 *
 * This class handles user account related functionality
 *
 * @package		Account
 * @subpackage	models/auth
 * @author		RdevSoft
 * @link		
 */


class Auth_model_core extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function check_login($user_name,$password,$return_as='num_rows')
	{
		$this->load->library('encrypt');
		$password = $this->encrypt->sha1($password);		
		$query = $this->db->get_where('users',array('user_name'=>$user_name,'password'=>$password));

		if($query->num_rows()<=0)
		{
			
			$mail_query = $this->db->get_where('users',array('user_email'=>$user_name,'password'=>$password));
			if($mail_query->num_rows()>0)
				$query = $mail_query;
		}

		if($return_as=='num_rows')
		{
			if($query->num_rows()>0)
			{
				$row = $query->row();
				if($row->user_type==1)
					return 1;
				else
				{
					if($row->confirmed==1)
						return 1;
					else
						return -1;
				}
			}
			else 
				return 0;
		}
		else
		{
			return $query;
		}
	}


	function set_login_cookie($user_email)
	{
		$val = rand(1000,9000);
		$cookie = array(
                   'name'   => 'key',
                   'value'  => $val,
                   'expire' => '86500',
                   'domain' => '.localhost',
                   'path'   => '/',
                   'prefix' => 'mycookie_',
               );

		set_cookie($cookie);
		
		$cookie = array(
                   'name'   => 'user',
                   'value'  => $user_email,
                   'expire' => '86500',
                   'domain' => '.localhost',
                   'path'   => '/',
                   'prefix' => 'mycookie_',
               );

		set_cookie($cookie);
		
		$data['remember_me_key'] = $val;
		$this->db->update('users',$data,array('user_email'=>$user_email));
	}
	
	function check_cookie_val($user,$key)
	{
		$query = $this->db->get_where('users',array('user_email'=>$user,'remember_me_key'=>$key));
		if($query->num_rows()>0)
		{
			$this->session->set_userdata('user_email',$user);
		}
	}
	
	function is_email_exists($email)
	{
		$query = $this->db->get_where('users',array('user_email'=>$email));
		return $query->num_rows();
	}

	function is_username_exists($user_name)
	{
		$query = $this->db->get_where('users',array('user_name'=>$user_name));
		return $query->num_rows();
	}
	
	function set_recovery_key($user_email)
	{
		$recovery_key = uniqid();
		$this->db->update('users',array('recovery_key'=>$recovery_key),array('user_email'=>$user_email));
		
		$query = $this->db->get_where('users',array('user_email'=>$user_email));
		$data = $query->row_array();
		$data['recovery_key'] = $recovery_key;
		//echo '<pre>';print_r($data);die;
		return $data;
	}

	function verify_recovery_by_username($user_name,$recovery_key)
	{
		if($user_name=='' || $recovery_key=='')
			return 0;
		else
		{
			$query = $this->db->get_where('users',array('user_name'=>$user_name,'recovery_key'=>$recovery_key));
			return $query;
		}
	}

	function verify_recovery($user_email,$recovery_key)
	{
		if($user_email=='' || $recovery_key=='')
			return 0;
		else
		{
			$query = $this->db->get_where('users',array('user_email'=>$user_email,'recovery_key'=>$recovery_key));
			return $query->num_rows();
		}
	}
	
	function get_userdata_by_email($email)
	{
		$query = $this->db->get_where('users',array('user_email'=>$email));
		return $query->row_array();
	}

	function confirm_email($email,$code)
	{
		$query = $this->db->get_where('users',array('user_email'=>$email,'confirmation_key'=>$code));
		if($query->num_rows()>0)
		{
			$this->load->helper('date');
			$datestring = "%Y-%m-%d %h:%i:00";
			$time = time();
			die(mdate($datestring, $time));
			
			$data['confirmed'] = 1;
			$data['confirmed_date'] = mdate($datestring, $time);
			$data['confirmation_key'] = '';
			$this->db->update('users',$data,array('user_email'=>$email));
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	function register_user_if_not_exists($user,$network='')
	{
		$query = $this->db->get_where('users',array('user_email'=>$user['email']));
		if($query->num_rows()>0)
		{
			$row = $query->row_array();
			return $row;
		}
		else
		{
			$userdata 				= array();
			$userdata['user_type']	= 2;//2 = users
			$userdata['first_name'] = $user['first_name'];
			$userdata['last_name'] 	= $user['last_name'];
			$userdata['gender'] 	= $user['gender'];
			if($network=='google')
			{
				$userdata['user_name'] 	= 'gp_'.$user['username'];
			}
			else
			{
				$userdata['user_name'] 	= 'fb_'.$user['username'];
			}
			$userdata['user_email'] = $user['email'];
			$userdata['password'] 	= '';
			$userdata['confirmed'] 	= 1;
			$userdata['status']		= 1;
			$this->db->insert('users',$userdata);
			$userdata['id']			= $this->db->insert_id();
			return $userdata;		
		}
	}
}

/* End of file auth_model.php */
/* Location: ./system/application/modules/account/models/auth_model.php */