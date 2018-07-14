<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 *
 */

include_once( APPPATH.'libraries/User_Controller.php' );

class Jobpost extends User_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model('job_model');
		$this->load->model('counts_summary_model');

		$this->lang->load('error_messages', 'english');
		$this->load->helper('security');
		$this->load->helper('MY_array_helper');
		$this->load->library('form_validation');
	}


	public function index()
	{

		if ($this->input->method() == 'post')
		{
			$rules = $this->job_model->rules;
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){

				$input_array = [
					'userid' => $u_rec_id = $this->session->userdata('id'),
					'title' => $this->input->post('txtTitle', TRUE),
					'description' => $this->input->post('txtDescription', TRUE),
					'submission_time' => $this->input->post('txtSubmissionTime', TRUE)
				];
				// print_r($input_array);exit;
				$last_id = $this->job_model->save($input_array);
				if($last_id){
					// update the counts table
					$this->counts_summary_model->update_count('jobs');
					$this->session->set_flashdata('job_added_sucessfully', bootstrap_alert(1, $this->lang->line('job_added_sucessfully')));
					redirect('users/jobpost','refresh');
				}
			}
		}

		$this->load->template('users/jobpost', $this->data);	
		
	}


	public function _date_valid($date){
		// echo $date;exit;
		$day = (int) substr($date, 0, 2);
	    $month = (int) substr($date, 3, 2);
	    $year = (int) substr($date, 6, 4);
	    $valid_date = checkdate($month, $day, $year);
	    // var_dump($valid_date);exit;
	    if($valid_date == FALSE){
	    	$this->form_validation->set_message('_date_valid', '%s is not a valid date');
	    	return FALSE;
	    }
	    return TRUE;
    }


}