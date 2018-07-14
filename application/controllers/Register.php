<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
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
		if($this->input->method() == 'post'){
			$rules_user = $this->user_model->rules_user;
			$this->form_validation->set_rules($rules_user);

			if($this->form_validation->run() == TRUE){
				$input_array = [
					'name' => $this->input->post('txtName', TRUE),
					'username' => $this->input->post('txtUsername', TRUE),
					'password' => hash_password($this->input->post('txtPassword', TRUE))
				];

				// print_r($input_array);exit;
				$last_id = $this->user_model->save($input_array);
				if($last_id){
					$this->session->set_flashdata('user_added_sucessfully', bootstrap_alert(1, $this->lang->line('user_added_sucessfully')));
					redirect('register','refresh');
				}
			}
		}

		$this->load->template('register');
	}

	public function _unique_username(){
		$user = $this->user_model->get_username($this->input->post('txtUsername'));

		if($user){
			$this->form_validation->set_message('_unique_username', '%s has already been taken');
			return FALSE;
		}

		return TRUE;

    }

}