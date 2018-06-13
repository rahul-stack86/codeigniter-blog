<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class MY_Model extends CI_Model
{

	protected $_table_name = '';
	protected $_primary_name = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	public $rules = [];
	protected $_timestamps = FALSE;
	
	function __construct()
	{
		parent::__construct();
	}
}