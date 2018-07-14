<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('user_model');
		$this->lang->load('error_messages', 'english');
		$this->load->helper('security');
		$this->load->helper('MY_array_helper');
		$this->load->library('form_validation');
	}

	public function index()
	{
		
		if ($this->input->method() == 'post')
		{
			$rules = $this->user_model->rules;
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$user_row = $this->user_model->get_username($this->input->post('txtUsername'));
				if($user_row === NULL){

					// SET FLASH USER NOT FOUND
					$this->session->set_flashdata('error_user_not_found', bootstrap_alert(4, $this->lang->line('error_user_not_found')));

					redirect('login','refresh');
					
				} else {

					$password = hash_password($this->input->post('txtPassword'));

					// check for password correct or not

					if($user_row->password != $password){

						// SET FLASH USER NOT FOUND
						$this->session->set_flashdata('error_password_is_wrong', bootstrap_alert(4, $this->lang->line('error_password_is_wrong')));

					} else {

						// set session data

						$newdata = array(
							'id' => $user_row->id,
							'username'  => $user_row->username,
							'logged_in' => TRUE
						);

						$this->session->set_userdata($newdata);

						// redirect to the user jobs

						redirect('users/jobs', 'refresh');

					}

					
				}
			} 
		}


		$this->load->template('login');

		
	}

	public function logout()
	{
		$userdata = $this->session->userdata();
		
		$this->session->unset_userdata(array_keys($userdata));

		$this->session->set_flashdata('error_logged_out_sucessfully', bootstrap_alert(1, $this->lang->line('error_logged_out_sucessfully')));
		
		redirect('login','refresh');
	}

}