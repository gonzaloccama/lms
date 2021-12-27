<?php defined('BASEPATH') or exit('No direct script access allowed');

class Course extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->load->model('author/requests_modal', 'request');
		$this->load->model('user/course_model', 'course');

		$this->load->library('session');
	}

	public function index($id = 0)
	{
		$dt = array('course.id' => $id);
		$dt_section = array('section.course_id' => $id);

		$data['course'] = $this->request->searched(1, 0, 0, $dt, 0, 'course');
		$data['sections'] = $this->request->get_section_for($dt_section, 'section.order');
		$data['lessons'] = $this->request->sortLesson($id, 'lesson');

		$data['info'] = array(
			'page_title' => $data['course'][0]->title,
			'title' => $data['course'][0]->title,
			'_section_' => 'user/lesson/index',
			'_script_' => 'user/lesson/script',
		);

		$this->load->view('user/_layout_', $data);
	}

	public function display_lesson()
	{
		$dt = array(
			'id' => $this->input->post('id'),
		);
		$dt_q = array(
			'quiz_id' => $this->input->post('id'),
		);

		$data['lesson'] = $this->course->rowTable('lesson', $dt);
		$data['questions'] = $this->course->rowTable('question', $dt_q);

		$this->load->view('user/lesson/_layout_lesson_', $data);
	}
}
