<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * carshop category_model_core model
 *
 * This class handles category_model_core management related functionality
 *
 * @package		Admin
 * @subpackage	category_model_core
 * @author		RdevSoft
 * @link		
 */
class carshop_model_core extends CI_Model 
{
	var $category,$menu;

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->category = array();
	}

	function check_post_permission($id)
	{
		$post = $this->get_car_by_id($id);
		if(is_admin()==FALSE && $post->created_by!=$this->session->userdata('user_id'))
		{
			return FALSE;
		}
		else
			return TRUE;
	}

	function get_car_by_id($id)
	{
		$query = $this->db->get_where('posts',array('id'=>$id,'status !='=>0));
		if($query->num_rows()>0)
		{
			return $query->row();
		}
		else
		{
			die('Car not found');
		}
	}

	function update_car($data,$id)
	{
		$this->db->update('posts',$data,array('id'=>$id));
	}

	function update_car_meta($data,$id,$key)
	{
		$this->db->update('post_meta',$data,array('post_id'=>$id,'key'=>$key));
	}

	function insert_car($data)
	{
		$this->db->insert('posts',$data);
		return $this->db->insert_id();
	}

	function insert_car_meta($data)
	{
		$this->db->insert('post_meta',$data);
	}

	function get_all_cars_admin($start,$limit,$order_by='id',$order_type='desc')
	{

		$this->db->where('status !=', 0);
		$this->db->order_by($order_by, $order_type);

		if($start=='all')			
		$query = $this->db->get('posts');
		else
		$query = $this->db->get('posts',$limit,$start);
		return $query;
	}


	function get_all_cars_agent($start,$limit,$order_by='id',$order_type='asc')
	{
		if($this->session->userdata('filter_purpose')!='')
		{
			$this->db->where('purpose',$this->session->userdata('filter_purpose'));
		}

		if($this->session->userdata('filter_type')!='')
		{
			$this->db->where('car_type',$this->session->userdata('filter_type'));
		}

		if($this->session->userdata('filter_condition')!='')
		{
			$this->db->where('condition',$this->session->userdata('filter_condition'));
		}

		if($this->session->userdata('filter_status')!='')
		{
			$this->db->where('status',$this->session->userdata('filter_status'));
		}
		else
		{
			$this->db->where('status',1);
		}

		if($this->session->userdata('filter_orderby')!='')
		{
			$order_by 	= ($this->session->userdata('filter_orderby')!='')?$this->session->userdata('filter_orderby'):'title';
			$order_type = ($this->session->userdata('filter_ordertype')!='')?$this->session->userdata('filter_ordertype'):'ASC';
			$this->db->order_by($order_by,$order_type);
		}

		if($this->input->post('filter_text')!=''){

			$filter_text = explode(' ', $this->input->post('filter_text'));
			$sql = "";
    		$flag = 0;
    		$ids_in_text = array();
			foreach ($filter_text as $text) {
				
				$text = trim($text);
				if(is_numeric($text)) {
					$ids_in_text[] = $text;
				}
				else if($text!='') {
					if($flag==0) {

						$flag = 1;

					}

					else {

						$sql .= "AND ";

					}

					$sql .= "search_meta LIKE '%".$text."%' ";
				}
			}
			if(!empty($sql))
				$this->db->where($sql);
			if(!empty($ids_in_text))
				$this->db->where_in('id',$ids_in_text);
		}

		$this->db->where('created_by',$this->session->userdata('user_id'));
		if($start=='all')
		$query = $this->db->get('posts');
		else
		$query = $this->db->get('posts',$limit,$start);
		return $query;
	}

	function count_all_cars_agent()
	{
		if($this->session->userdata('filter_purpose')!='')
		{
			$this->db->where('purpose',$this->session->userdata('filter_purpose'));
		}

		if($this->session->userdata('filter_type')!='')
		{
			$this->db->where('car_type',$this->session->userdata('filter_type'));
		}

		if($this->session->userdata('filter_condition')!='')
		{
			$this->db->where('condition',$this->session->userdata('filter_condition'));
		}

		if($this->session->userdata('filter_status')!='')
		{
			$this->db->where('status',$this->session->userdata('filter_status'));
		}
		else
		{
			$this->db->where('status',1);
		}

		if($this->session->userdata('filter_orderby')!='')
		{
			$order_by 	= ($this->session->userdata('filter_orderby')!='')?$this->session->userdata('filter_orderby'):'title';
			$order_type = ($this->session->userdata('filter_ordertype')!='')?$this->session->userdata('filter_ordertype'):'ASC';
			$this->db->order_by($order_by,$order_type);
		}

		if($this->input->post('filter_text')!=''){

			$filter_text = explode(' ', $this->input->post('filter_text'));
			$sql = "";
    		$flag = 0;
    		$ids_in_text = array();
			foreach ($filter_text as $text) {
				
				$text = trim($text);
				if(is_numeric($text)) {
					$ids_in_text[] = $text;
				}
				else if($text!='') {
					if($flag==0) {

						$flag = 1;

					}

					else {

						$sql .= "AND ";

					}

					$sql .= "search_meta LIKE '%".$text."%' ";
				}
			}
			if(!empty($sql))
				$this->db->where($sql);
			if(!empty($ids_in_text))
				$this->db->where_in('id',$ids_in_text);
		}

		$this->db->where('created_by',$this->session->userdata('user_id'));
		$query = $this->db->get('posts');
		return $query->num_rows();
	}





	function get_location_id_by_name($name,$type,$parent)
	{
		$query = $this->db->get_where('locations',array('status'=>1,'name'=>$name,'type'=>$type,'parent'=>$parent));
		if($query->num_rows()>0)
		{
			$row = $query->row();
			return $row->id;
		}
		else
		{
			$data = array();
			$data['type'] 	= $type;
			$data['name'] 	= $name;
			$data['parent']	= $parent;
			$this->db->insert('locations',$data);
			return $this->db->insert_id();
		}
	}

	function get_locations_json($term='',$type,$parent)
	{
		$this->db->like('name',$term);
		$query = $this->db->get_where('locations',array('status'=>1,'type'=>$type,'parent'=>$parent));
		$data = array();
		foreach ($query->result() as $row) {
			$val = array();
			$val['id'] = $row->id;
			$val['label'] = $row->name;
			$val['value'] = $row->name;
			array_push($data,$val);
		}
		return $data;
	}

	function get_all_locations_by_range($start,$limit='',$sort_by='')
	{
        //added on version 1.6
		$is_state = get_settings('carshop_settings','show_state_province','yes');
		$data = array();
		$this->db->order_by($sort_by, "asc");
		$this->db->where('status',1);
		$this->db->where('parent',0);
		$query = $this->db->get('locations');
		foreach ($query->result() as $country) {
			array_push($data,$country);
			$state_query = $this->db->get_where('locations',array('status'=>1,'parent'=>$country->id));
			foreach ($state_query->result() as $state) {
				if($is_state=='yes'){
				array_push($data,$state);
				}
				$city_query = $this->db->get_where('locations',array('status'=>1,'parent'=>$state->id));
				foreach ($city_query->result() as $city) {
					array_push($data,$city);
				}
			}
		}

		return array_slice($data,$start,$limit,true);
	}
	
	function count_all_locations()
	{
        //added on version 1.6
		$is_state = get_settings('carshop_settings','show_state_province','yes');
		if($is_state=='no'){
			$this->db->where('type !=','state'); 
		}
		$this->db->where('status',1); 
		$query = $this->db->get('locations');
		return $query->num_rows();
	}
	
	function insert_location($data)
	{
		$this->db->insert('locations',$data);
		return $this->db->insert_id();
	}

	function get_locations_by_type($type)
	{
		$query = $this->db->get_where('locations',array('type'=>$type,'status'=>1));
		return $query;
	}

	function get_location_by_id($id)
	{
		$query = $this->db->get_where('locations',array('id'=>$id));
		if($query->num_rows()<=0)
		{
			echo 'Invalid page id';die;
		}
		else
		{
			return $query->row();
		}
	}

	function delete_location_by_id($id)
	{
		$data['status'] = 0;
		$this->db->update('locations',$data,array('id'=>$id));
		$this->db->update('locations',$data,array('parent'=>$id));
	}


	function update_location($data,$id)
	{
		$this->db->update('locations',$data,array('id'=>$id));
	}

	function get_all_payment_history($start,$limit,$order_by='id',$order_type='desc')
	{
		$this->db->order_by($order_by,$order_type);
		$query = $this->db->get_where('user_package',array('status !='=>0));
		return $query;
	}

	function count_all_payment_history()
	{
		$query = $this->db->get_where('user_package',array('status !='=>0));
		return $query->num_rows();
	}

	function deletehistory($id=0)
	{
		$this->db->update('user_package',array('status'=>0),array('id'=>$id));
	}

	function delete_post_by_id($id='')
	{
		$data['status'] = 0;
		$this->db->update('posts',$data,array('id'=>$id));
	}

	function update_post_by_id($data,$id)
	{
		$this->db->update('posts',$data,array('id'=>$id));
	}

	function bulk_update_post($data,$id)	
	{
		$this->db->where_in('id',$id);
		$this->db->update('posts',$data);
	}	

	#----------- brand model functions ------------------------#
		function get_brandmodels_id_by_name($name,$type,$parent)
	{
		$query = $this->db->get_where('brandmodels',array('status'=>1,'name'=>$name,'type'=>$type,'parent'=>$parent));
		if($query->num_rows()>0)
		{
			$row = $query->row();
			return $row->id;
		}
		else
		{
			$data = array();
			$data['type'] 	= $type;
			$data['name'] 	= $name;
			$data['parent']	= $parent;
			$this->db->insert('brandmodels',$data);
			return $this->db->insert_id();
		}
	}

	function get_brandmodels_json($term='',$type,$parent)
	{
		$this->db->like('name',$term);
		$this->db->order_by('TRIM(name)', "asc");
		$query = $this->db->get_where('brandmodels',array('status'=>1,'type'=>$type,'parent'=>$parent));
		$data = array();
		foreach ($query->result() as $row) {
			$val = array();
			$val['id'] = $row->id;
			$val['label'] = $row->name;
			$val['value'] = $row->name;
			array_push($data,$val);
		}
		return $data;
	}

	function get_all_brandmodels_by_range($start,$limit='',$sort_by='name')
	{
		$data = array();
		$this->db->order_by('TRIM('.$sort_by.')', "asc");
		$this->db->where('status',1);
		$this->db->where('parent',0);
		$query = $this->db->get('brandmodels');
		foreach ($query->result() as $country) {
			array_push($data,$country);
			$this->db->order_by('TRIM(name)', "asc");
			$state_query = $this->db->get_where('brandmodels',array('status'=>1,'parent'=>$country->id));
			foreach ($state_query->result() as $state) {
				array_push($data,$state);
				$this->db->order_by('TRIM(name)', "asc");
				$city_query = $this->db->get_where('brandmodels',array('status'=>1,'parent'=>$state->id));
				foreach ($city_query->result() as $city) {
					array_push($data,$city);
				}
			}
		}

		return array_slice($data,$start,$limit,true);
	}
	
	function count_all_brandmodels()
	{
		$this->db->where('status',1); 
		$query = $this->db->get('brandmodels');
		return $query->num_rows();
	}
	
	function insert_brandmodels($data)
	{
		$this->db->insert('brandmodels',$data);
		return $this->db->insert_id();
	}

	function get_brandmodels_by_type($type)
	{
		$this->db->order_by('TRIM(name)', "asc");
		$query = $this->db->get_where('brandmodels',array('type'=>$type,'status'=>1));
		return $query;
	}

	function get_brandmodels_by_id($id)
	{
		$query = $this->db->get_where('brandmodels',array('id'=>$id));
		if($query->num_rows()<=0)
		{
			return 'error';
		}
		else
		{
			return $query->row();
		}
	}

	function delete_brandmodels_by_id($id)
	{
		$data['status'] = 0;
		$this->db->update('brandmodels',$data,array('id'=>$id));
		$this->db->update('brandmodels',$data,array('parent'=>$id));
	}


	function update_brandmodels($data,$id)
	{
		$this->db->update('brandmodels',$data,array('id'=>$id));
	}

	function get_all_emails_admin($start,$limit)
	{
		if($start=='all')
		{
			$this->db->like('key','query_email');
			$query = $this->db->get_where('user_meta',array('status'=>1));
			return $query;	
		}
		else
		{
			$this->db->like('key','query_email');
			$query = $this->db->get_where('user_meta',array('status'=>1),$limit,$start);
			return $query;			
		}
	}

	function count_all_emails_admin()
	{
		$this->db->like('key','query_email');
		$query = $this->db->get_where('user_meta',array('status'=>1));
		return $query->num_rows();
	}

	function get_all_emails_agent($start,$limit)
	{
		if($start=='all')
		{
			$this->db->like('key','query_email');
			$query = $this->db->get_where('user_meta',array('status'=>1,'user_id'=>$this->session->userdata('user_id')));
			return $query;
		}
		else
		{
			$this->db->like('key','query_email');
			$query = $this->db->get_where('user_meta',array('status'=>1,'user_id'=>$this->session->userdata('user_id')),$limit,$start);
			return $query;			
		}
	}

	function count_all_emails_agent()
	{
		$this->db->like('key','query_email');
		$query = $this->db->get_where('user_meta',array('status'=>1,'user_id'=>$this->session->userdata('user_id')));
		return $query->num_rows();
	}

	function get_all_emails()
	{
		if(!is_admin())
			$this->db->where('user_id',$this->session->userdata('user_id'));

		$this->db->like('key','query_email');
		$query = $this->db->get_where('user_meta',array('status'=>1));
		return $query;
	}

	function get_feature_payment_data_by_unique_id($unique_id)
	{
		$this->db->where('key','featurepayment_'.$unique_id);
		$query = $this->db->get_where('post_meta',array('status'=>1));
		return $query;
	}

}

/* End of file category_model_core.php */
/* Location: ./system/application/models/category_model_core.php */