<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 *
 */

include_once( APPPATH.'libraries/User_Controller.php' );

class Inbox extends User_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model('job_model');
		$this->load->model('job_chat_master_model');
	}


	public function index( $id )
	{
		$id = (int) $id;

		$this->data['job_row'] = $this->job_model->get_job($id);
		$this->data['users'] = $this->job_chat_master_model->get_users($id, $this->data['userdata']['id']);

		$this->load->template('users/inbox', $this->data);	
		
	}

}