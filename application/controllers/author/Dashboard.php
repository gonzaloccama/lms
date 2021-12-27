<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		// $this->load->library('pagination');

		// $this->load->helper('url');

		$this->load->model('author/dashboard_model', 'dashboard');

		// $this->load->library('session');
	}

	function index()
	{
		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 3)){
			redirect('/auth/login');
		}

		$data['info'] = array(
			'page_title' => 'Instructor - Dashboard',
			'title' => 'Dashboard',
			'sub_title' => '',
			'active' => 1,
			'script' => 'author/dashboard/script',
			'sidebar' => 'author/template/sidebar',
		);

		$dt_courses = array('user_id' => $this->session->userdata('id'));
		$dt_status = array(
			'user_id' => $this->session->userdata('id'),
			'status' => 1,
		);

		$data['courses'] = $this->dashboard->ListTable('course', $dt_courses);
		$data['num_courses'] = $this->dashboard->count_field('course', $dt_courses);
		$data['status'] = $this->dashboard->count_field('course', $dt_status);

		$this->load->view('author/dashboard/index', $data);
	}
}
