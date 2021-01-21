<?php defined('BASEPATH') or exit('No direct script access allowed');

class Courses extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// $this->load->library('pagination');

		// $this->load->helper('url');

		$this->load->library('form_validation');

		$this->load->model('author/course_model', 'course');

		$this->load->library('session');
	}

	public function index()
	{

		$data['page_title'] = 'Instructor - Cursos';
		$data['title'] = 'Instructor';
		$data['sub_title'] = 'Cursos';
		$data['active'] = 2;

		$data['courses'] = $this->course->listCourses('course');

		$this->load->view('author/courses/manager', $data);
	}

	public function add()
	{
		$data = NULL;

		$this->form_validation->set_rules('title', 'title', 'trim');
		$this->form_validation->set_rules('short_description', 'short_description', 'trim');
		$this->form_validation->set_rules('description', 'description', 'trim');
		$this->form_validation->set_rules('category_id', 'category_id', 'trim');
		$this->form_validation->set_rules('sub_category_id', 'sub_category_id', 'trim');
		$this->form_validation->set_rules('level', 'level', 'trim');
		$this->form_validation->set_rules('language', 'language', 'trim');
		$this->form_validation->set_rules('requirements[]', 'requirements', 'trim');
		$this->form_validation->set_rules('outcomes[]', 'outcomes', 'trim');
		$this->form_validation->set_rules('video_url', 'video_url', 'trim');
		$this->form_validation->set_rules('is_free_course', 'is_free_course', 'trim');
		$this->form_validation->set_rules('price', 'price', 'trim');
		$this->form_validation->set_rules('discount_price', 'discount_price', 'trim');
		$this->form_validation->set_rules('course_overview_provider', 'course_overview_provider', 'trim');


		//$data['errors'] = array();

		if ($this->form_validation->run() == FALSE) :

			$data['page_title'] = 'Instructor - Nuevo curso';
			$data['title'] = 'Instructor';
			$data['sub_title'] = 'AÑADIR NUEVO CURSO';
			$data['active'] = 2;

			$data['categories'] = $this->course->ListTable(1, 'category');
			$data['levels'] = $this->course->ListTable(1, 'level');
			$data['languages'] = $this->course->ListTable(1, 'course_language');

			$this->load->view('author/courses/add', $data);

		else :


			$resutl = $this->upload_img('courses', 4, set_value('title'));

			if ($resutl['values']) :

				$saveData['title'] = set_value('title');
				$saveData['short_description'] = set_value('short_description');
				$saveData['description'] = set_value('description');
				$saveData['category_id'] = set_value('category_id');
				$saveData['sub_category_id'] = set_value('sub_category_id');
				$saveData['level'] = set_value('level');
				$saveData['user_id'] = 4;
				$saveData['language'] = set_value('language');

				$tempData['requirements'] = set_value('requirements');
				$tempData['outcomes'] = set_value('outcomes');

				$saveData['requirements'] = implode(",", $tempData['requirements']);
				$saveData['outcomes'] = implode(",", $tempData['outcomes']);
				$saveData['thumbnail'] = $resutl['data'];
				$saveData['video_url'] = set_value('video_url');
				$saveData['date_added'] = $this->date_();
				$saveData['last_modified'] = $this->date_();
				$saveData['is_free_course'] = set_value('is_free_course');
				$saveData['price'] = set_value('price');
				$saveData['discount_price'] = set_value('discount_price');
				$saveData['course_overview_provider'] = set_value('course_overview_provider');

				$this->course->insert('course', $saveData);

				redirect(base_url() . 'author/courses/curriculum/'.urlencode($saveData['title']).'/'.$saveData['user_id'], 'location');
			else :

				$this->session->set_flashdata('message', $resutl['data']);
				redirect(base_url() . 'author/courses/add', 'location');

			endif;

		endif;
	}

	public function curriculum($id = '', $author = 0)
	{
		$data['page_title'] = 'Instructor - Curricula';
		$data['title'] = 'Instructor';
		$data['sub_title'] = 'CURRICULA DE ' . urldecode($id);
		$data['active'] = 2;

		$data['categories'] = $this->course->ListTable(1, 'category');

		$this->load->view('author/courses/edit', $data);
	}

	private function upload_img($details, $author = '', $course = 0)
	{
		$ram = $this->random_date();
		$file_name = $_FILES['thumbnail']['name'];
		$tmp = explode('.', $file_name);
		$extension_img = end($tmp);

		$user_img_profile = $ram . '.' . $extension_img;

		$config['upload_path'] = 'assets/admin/images/author/' . $details . '/' . $author . '/' . $course;


		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, true);
		}

//              'allowed_types' => "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '5000';
		$config['quality'] = '60%';
		$config['file_name'] = $user_img_profile;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('thumbnail')) {
			return array('values' => false, 'data' => $this->upload->display_errors());
//			echo $this->upload->display_errors();

		} else {
			return array('values' => true, 'data' => $config['upload_path'] . '/' . $user_img_profile);
		}
	}

	private function random_date()
	{
		date_default_timezone_set('America/Lima');

		$t = microtime(true);
		$micro = sprintf("%06d", ($t - floor($t)) * 1000000);
		$d = new DateTime(date('Y-m-d H:i:s.' . $micro, $t));

//		$date_current = date('Y-m-d H:i:s');

		return $d->format("Ymd-His-u");
	}

	private function date_()
	{
		date_default_timezone_set('America/Lima');
		return date('Y-m-d H:i:s');
	}
}
