<?php defined('BASEPATH') or exit('No direct script access allowed');

class Quiz extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		// $this->load->library('pagination');

		// $this->load->helper('url');

		$this->load->model('author/quiz_model', 'quiz');

		// $this->load->library('session');
	}

	function index()
	{
		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 3)) {
			redirect('/auth/login');
		}

		$data['info'] = array(
			'page_title' => 'Instructor - Quiz',
			'title' => 'Evaluación',
			'sub_title' => 'Administrar Evaluaciones',
			'active' => 3,
			'script' => 'author/quiz/script',
			'sidebar' => 'author/template/sidebar',
		);

		$dt = array('user_id' => $this->session->userdata('id'),);

		$data['courses'] = $this->quiz->ListTable('course', $dt);
		$data['categories'] = $this->quiz->listCategoryforUser('category', $dt);

		$this->load->view('author/quiz/manager', $data);
	}
}
