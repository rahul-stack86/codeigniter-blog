<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class MY_Controller extends CI_Controller
{

	protected $data = [];
	
	function __construct()
	{
		parent::__construct();

		$this->data['site_name'] = config_item('site_name'); 
	}
}