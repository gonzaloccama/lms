<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->load->model('admin/category_model', 'welcome');
		$this->load->model('author/requests_modal', 'course');

		$this->load->library('session');
	}

	public function index()
	{
		$data['info'] = array(
			'page_title' => 'Online Education Learning',
			'_section_' => 'user/welcome/index',
			'_script_' => 'user/welcome/script',
		);

		$data['sliders'] = $this->welcome->rowTable('slider');
		$data['categories'] = $this->welcome->rowTable('category');

		$data['courses'] = $this->course->searched(9, 0, 0, null, 0, 'course');

		$this->load->view('user/_layout_', $data);
	}

	public function courses($id = 0, $author = 0)
	{


		if (!$id) {
			$data['info'] = array(
				'page_title' => 'Courses',
				'title' => 'Courses',
				'_section_' => 'user/courses/index',
				'_script_' => 'user/courses/script',
			);

			//$data['sliders'] = $this->welcome->rowTable('slider');
			$data['categories'] = $this->welcome->rowTable('category');

			$data['courses'] = $this->course->searched(9, 0, 0, null, 0, 'course');

			$this->load->view('user/_layout_', $data);
		} else {


			//$data['sliders'] = $this->welcome->rowTable('slider');
			$data['categories'] = $this->welcome->rowTable('category');
//
			$dt = array('course.id' => $id);
			$dt_section = array('section.course_id' => $id);

			$course = $this->course->searched(1, 0, 0, $dt, 0, 'course');

			$data['courses'] = $this->course->rowTable($author, 'course', 'user_id', 1, 'last_modified');
			$data['sections'] = $this->course->get_section_for($dt_section, 'section.order');
			$data['lessons'] = $this->course->sortLesson($id, 'lesson');

			$data['course'] = $course[0];

			$data['info'] = array(
				'page_title' => $course[0]->title,
				'title' => $course[0]->title,
				'_section_' => 'user/courses/details',
				'_script_' => 'user/courses/script',
			);

			$this->load->view('user/_layout_', $data);
		}

	}
}
