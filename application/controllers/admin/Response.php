<?php defined('BASEPATH') or exit('No direct script access allowed');

class Response extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation', 'encryption', 'session', 'pagination'));

		$this->load->helper(array('form', 'url'));

		$this->load->model('admin/response_modal', 'response');
		$this->load->model('admin/category_model', 'category');

	}

	function index()
	{

		//$this->load->view('');
	}

	public function search($offset = null)
	{
		//method search display category

		$dt = array(
			'keyword' => trim($this->input->post('search_text')),
		);

		$limit = 3;

		$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$config['base_url'] = site_url('admin/response/search');
		$config['total_rows'] = $this->response->searched($limit, $offset, $dt, 1, 'category');
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['num_links'] = 2;


		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['next_link'] = 'Siguiente';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Anterior';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tagl_close'] = '</li>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tagl_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tagl_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);

		$data['total_rows'] = $config['total_rows'];

		$data['parents'] = $this->response->searched($limit, $offset, $dt, 0, 'category');
		$data['categories'] = $this->category->ListTable(1, 'category');
		$data['cnt'] = $this->category->parents('category');


//		echo json_encode($data['categories']);

		$data['pagelinks'] = $this->pagination->create_links();

		$this->load->view('admin/category/response_courses', $data);

	}

	public function instructor($offset = null)
	{
		//method search display instructor
		$key = array(
			'keyword' => trim($this->input->post('search_text')),//
		);

		$dt = null;

		$dt['is_instructor'] = trim($this->input->post('res'));

		$limit = 2;

		if (isset($_POST['limit']) && !empty($_POST['limit']))
			$limit = trim($this->input->post('limit'));

		$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$config['base_url'] = site_url('admin/response/instructor');
		$config['total_rows'] = $this->response->instructor_display($limit, $offset, $key, $dt, 1, 'users');
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['num_links'] = 1;
		//$config['use_page_numbers'] = TRUE;

		$config['first_link'] = 'Primero';
		$config['last_link'] = 'Ultimo';
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['next_link'] = 'Siguiente';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Anterior';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tagl_close'] = '</li>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tagl_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tagl_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);

		$data['total_rows'] = $config['total_rows'];

		$data['users'] = $this->response->instructor_display($limit, $offset, $key, $dt, 0, 'users');

		$data['admin'] = $dt['is_instructor'];

		$data['pagelinks'] = $this->pagination->create_links();

		$this->load->view('admin/instructor/response', $data);
	}

	public function slider($offset = null)
	{
		//method search display instructor
		$key = array(
			'keyword' => trim($this->input->post('search_text')),//
		);

		$dt = null;

		$limit = 2;

		if (isset($_POST['limit']) && !empty($_POST['limit']))
			$limit = trim($this->input->post('limit'));

		$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$config['base_url'] = site_url('admin/response/slider');
		$config['total_rows'] = $this->response->slider_display($limit, $offset, $key, $dt, 1, 'slider');
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['num_links'] = 1;
		//$config['use_page_numbers'] = TRUE;

		$config['first_link'] = 'Primero';
		$config['last_link'] = 'Ultimo';
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['next_link'] = 'Siguiente';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Anterior';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tagl_close'] = '</li>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tagl_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tagl_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);

		$data['total_rows'] = $config['total_rows'];

		$data['sliders'] = $this->response->slider_display($limit, $offset, $key, $dt, 0, 'slider');

		$data['pagelinks'] = $this->pagination->create_links();

		$this->load->view('admin/slider/response', $data);
	}


	public function update($id = 0)
	{
		if ($id) {

			$table = trim($this->input->post('table'));

			$data['status'] = trim($this->input->post('affirm'));

			$pdt = $this->response->updateData($table, $data, 'id', $id);

			echo json_encode($data);
		}
	}
}
