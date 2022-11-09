<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * carshop Auth Controller
 *
 * This class handles Auth management related functionality
 *
 * @package		Admin
 * @subpackage	Auth
 * @author		RdevSoft
 * @link		
 */
require_once'auth_core.php';
class Auth extends Auth_core {

	public function __construct()
	{
		parent::__construct();
	}
}