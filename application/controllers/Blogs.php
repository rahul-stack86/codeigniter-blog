<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Blogs extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('article_model');
	}

	public function page($start = 0)
	{

		$config['base_url'] = base_url().'blogs/page/';
		$config['total_rows'] = $this->article_model->get_article_count();
		$config['per_page'] = 20;
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

		$data['article_result'] = $this->article_model->get_articles(20, $start);

		$data['pages'] = $this->pagination->create_links();
		$data['start'] = $start;

		$this->load->template('blogs', $data);
	}
}