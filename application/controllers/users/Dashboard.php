<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 *
 */

include_once( APPPATH.'libraries/User_Controller.php' );

class Dashboard extends User_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$this->load->template('users/dashboard');
	}


}