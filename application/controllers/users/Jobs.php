<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 *
 */

include_once( APPPATH.'libraries/User_Controller.php' );

class Jobs extends User_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model('job_model');
		$this->load->model('counts_summary_model');

		$this->load->library('pagination');
	}

	public function index($start = 0)
	{

		$per_page = 20;

		$config['base_url'] = base_url().'users/jobs/index/';
		$config['total_rows'] = $this->counts_summary_model->get_count('jobs');
		$config['per_page'] = $per_page;
		$config['num_links'] = 5;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$config['first_link'] = '<span aria-hidden="true">&laquo;</span>';
		$config['last_link'] = '<span aria-hidden="true">&raquo;</span>';

		$this->pagination->initialize($config);

		$this->data['job_result'] = $this->job_model->get_jobs($per_page, $start);

		$this->data['pages'] = $this->pagination->create_links();
		$this->data['start'] = $start;

		$this->load->template('users/jobs', $this->data);
	}


}