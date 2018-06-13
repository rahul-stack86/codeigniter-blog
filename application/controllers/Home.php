<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('article_model');
		$this->load->model('user_model');
		$this->load->helper('array_helper');
		$this->load->library('animal');
	}

	public function index()
	{
		// Usage of array_helper
		// $array = [9,2,3,5];
		// print_r(random_element($array));

		// Usage of animal helper
		// echo $this->animal->some_method();

		// $this->lang->load('error_messages', 'english');
		// echo $this->lang->line('error_email_missing');

		// print_r($this->data);


		$data['user_result'] = $this->user_model->get_all_users();

		$data['article_result'] = $this->article_model->get_articles(50);
		
		$this->load->template('home', $data);
	}
}
