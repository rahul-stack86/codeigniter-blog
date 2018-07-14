<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 *
 */

include_once( APPPATH.'libraries/User_Controller.php' );

class Contact extends User_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model('job_model');
		$this->load->model('job_chat_master_model');
		$this->load->model('chat_message_model');

		$this->lang->load('error_messages', 'english');
		$this->load->helper('security');
		$this->load->helper('MY_array_helper');
		$this->load->library('form_validation');
	}


	public function index( $id, $uid )
	{
		$id = (int) $id;
		$this->data['uid'] = (int) $uid;

		$this->data['jobid'] = $id;
		$this->data['job_row'] = $this->job_model->get_job($id);
		
		$this->data['chat_messages'] = '';
		$this->data['check_chat'] = '';

		// check whether for this job and for this user the chat has happent
		$this->data['check_chat'] = $this->job_chat_master_model->check_chat($id, $this->data['userdata']['id'], $this->data['uid']);

		$this->data['chat_messages'] = $this->chat_message_model->get_chats($id, $this->data['uid'], $this->data['userdata']['id']);

		if ($this->input->method() == 'post')
		{
			$rules = $this->job_chat_master_model->rules;
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() == TRUE){
				// echo $this->data['job_row']->userid;exit;
				$input_array = [
					'jobid' => $id,
					'userid_1' => $uid,
					'userid_2' => $this->data['userdata']['id'],
					'message' => $this->input->post('txtaMessage', TRUE)
				];				

				// if chat didn't occur then first add the log
				if(!$this->data['check_chat']){
					$this->job_chat_master_model->save($id, $uid, $this->data['userdata']['id']);
					$this->chat_message_model->save($input_array);
				} else { // if chat occured then keep adding the chat messages
					$this->chat_message_model->save($input_array);
				}
				
				$this->session->set_flashdata('message_sent_sucessfully', bootstrap_alert(1, $this->lang->line('message_sent_sucessfully')));
				redirect('users/contact/index/'.$id.'/'.$this->data['uid'],'refresh');
			}
		}

		$this->load->template('users/contact', $this->data);	
		
	}

}