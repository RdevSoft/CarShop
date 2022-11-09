<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * carshop users_model_core model
 *
 * This class handles users_model_core management related functionality
 *
 * @package     Admin
 * @subpackage  users_model_core
 * @author      RdevSoft
 * @link        http://webhelios.com
 */

class Users_model_core extends CI_Model
{
    var $pages,$menu;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->pages = array();
    }

    function get_user_by_id($id)
    {
        $query = $this->db->get_where('users',array('id'=>$id));
        return $query->row();
    }

    function get_all_users_by_range($start,$limit='',$sort_by='')
    {
        $this->db->order_by($sort_by, "asc");
        $this->db->where('status',1);
            $query = $this->db->get('users');
        return $query;
    }

    function count_all_pages()
    {
        $this->db->where('status',1);
        $query = $this->db->get('users');
        return $query->num_rows();
    }

    function ban_user($id){
        $data['banned'] = 1;
        $this->db->update('users', $data, array('id'=> $id));
    }

    function unban_user($id){
        $data['banned'] = 0;
        $this->db->update('users', $data, array('id'=> $id));
    }

    function get_all_user_emails()
    {
        $sql = "select user_email from ".$this->db->dbprefix('users')." where user_type=2 and status=1";
        $query = $this->db->query($sql);
        return $query;
    }

}

/* End of file page_model.php */
/* Location: ./system/application/models/page_model.php */