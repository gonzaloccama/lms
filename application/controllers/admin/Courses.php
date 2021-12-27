<?php defined('BASEPATH') or exit('No direct script access allowed');

class Courses extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->load->model('author/course_model', 'course');

		$this->load->library('session');
	}

	function index()
	{
		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)){
			redirect('/auth/login');
		}

		$data['info'] = array(
			'page_title' => 'Administrador - Cursos',
			'title' => 'Cursos',
			'sub_title' => 'Lista de cursos',
			'active' => 3,
			'script' => 'admin/courses/script',
			'sidebar' => 'admin/template/sidebar',
		);

		//$data['courses'] = $this->course->listCourses('course', 0, 4);
		$data['categories'] = $this->course->listCategoryforUser(0, 'category', 'user_id');

		$data['dmn'] = $this->uri->segment(1);

		$this->load->view('admin/courses/manager', $data);
	}

	public function add($author = 0)
	{
		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)){
			redirect('/auth/login');
		}

		if (!$author)
			$author = $this->session->userdata('id');

		$data = NULL;
		$data['categories'] = $this->course->rowTable(0, 'category');

		$this->form_validation->set_rules('title', 'título', 'required');
		$this->form_validation->set_rules('short_description', 'descripción corta', 'required');
		$this->form_validation->set_rules('description', 'description', 'trim');
//		$this->form_validation->set_rules('category_id', 'category_id', 'trim');
		$this->form_validation->set_rules('sub_category_id', 'categoria', 'required');
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

			$data['info'] = array(
				'page_title' => 'Administrador - Nuevo curso',
				'title' => 'Cursos',
				'sub_title' => 'AÑADIR NUEVO CURSO',
				'active' => 3,
				'script' => 'author/courses/script',
				'sidebar' => 'admin/template/sidebar',
			);

			$data['levels'] = $this->course->rowTable(0, 'level');
			$data['languages'] = $this->course->rowTable(0, 'course_language');

			$this->load->view('author/courses/add', $data);

		else :
			foreach ($data['categories'] as $category):
				if ($category->id == set_value('sub_category_id')):
					$ctgr = $category->parent;
				endif;
			endforeach;

			$saveData['title'] = set_value('title');
			$saveData['short_description'] =html_entity_decode( set_value('short_description'));
			$saveData['description'] = html_entity_decode(set_value('description'));

			$saveData['sub_category_id'] = set_value('sub_category_id');
			$saveData['category_id'] = $ctgr;

			$saveData['level'] = set_value('level');
			$saveData['user_id'] = $author;
			$saveData['language'] = set_value('language');

			$tempData['requirements'] = set_value('requirements');
			$tempData['outcomes'] = set_value('outcomes');

			$saveData['requirements'] = json_encode($tempData['requirements']);
			$saveData['outcomes'] = json_encode($tempData['outcomes']);
			$saveData['video_url'] = set_value('video_url');
			$saveData['date_added'] = $this->date_();

			$saveData['is_free_course'] = set_value('is_free_course');
			$saveData['price'] = set_value('price');
			$saveData['discount_price'] = set_value('discount_price');
			$saveData['course_overview_provider'] = set_value('course_overview_provider');

			$crs = $this->course->insert('course', $saveData);

			$resutl = $this->upload_img('courses', $author, $crs);

			if ($resutl['values']) :
				$upadateData['thumbnail'] = $resutl['data'];
				$update = $this->course->updateData('course', $upadateData, 'id', $crs);
			endif;

			$this->session->set_flashdata('message', 'Se creo exitosamente ' . $saveData['title']);
			redirect(base_url() . 'admin/courses/edit/' . $crs . '/' . $saveData['user_id'], 'location');

		endif;
	}

	public function edit($id = 0, $author = 0)
	{
		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)){
			redirect('/auth/login');
		}

		if (!$author)
			$author = $this->session->userdata('id');

		if (isset($id) and !empty($id)):

			$data = NULL;

			$this->form_validation->set_rules('title', 'título', 'required');
			$this->form_validation->set_rules('short_description', 'descripción corta', 'required');
			$this->form_validation->set_rules('description', 'description', 'trim');
			$this->form_validation->set_rules('category_id', 'category_id', 'trim');
			$this->form_validation->set_rules('sub_category_id', 'categoria', 'required');
			$this->form_validation->set_rules('level', 'level', 'trim');
			$this->form_validation->set_rules('language', 'language', 'trim');
			$this->form_validation->set_rules('requirements[]', 'requirements', 'trim');
			$this->form_validation->set_rules('outcomes[]', 'outcomes', 'trim');
			$this->form_validation->set_rules('thumbnail_old', 'thumbnail_old', 'trim');
			$this->form_validation->set_rules('video_url', 'video_url', 'trim');
			$this->form_validation->set_rules('is_free_course', 'is_free_course', 'trim');
			$this->form_validation->set_rules('price', 'price', 'trim');
			$this->form_validation->set_rules('discount_price', 'discount_price', 'trim');
			$this->form_validation->set_rules('course_overview_provider', 'course_overview_provider', 'trim');

			if ($this->form_validation->run() == FALSE) :

				$title = $this->course->rowTable($id, 'course', 'id');

				$data['info'] = array(
					'page_title' => 'Administrador - Editar',
					'title' => 'Cursos',
					'sub_title' => $title[0]->title,
					'active' => 3,
					'script' => 'author/courses/script',
					'sidebar' => 'admin/template/sidebar',
				);

				$data['course'] = $this->course->listCourses('course', $id, $author);

				$data['categories'] = $this->course->rowTable(0, 'category');
				$data['levels'] = $this->course->rowTable(0, 'level');
				$data['languages'] = $this->course->rowTable(0, 'course_language');

				//Section
				$data['sections'] = $this->course->rowTable($id, 'section', 'course_id');

				$this->load->view('author/courses/edit', $data);
			else:

				if (isset($_FILES['thumbnail']['name']) && !empty($_FILES['thumbnail']['name'])):
					$dt = array(
						'id' => $id,
						'user_id' => $author,
					);
					$tempthumbnail = $this->course->rowTableWhere('course', $dt);

					unlink($tempthumbnail[0]->thumbnail);

					$resutl = $this->upload_img('courses', $author, $id);

					$saveData['thumbnail'] = $resutl['data'];
				endif;

				$saveData['title'] = set_value('title');
				$saveData['short_description'] = html_entity_decode(set_value('short_description'));
				$saveData['description'] = html_entity_decode(set_value('description'));
				$saveData['category_id'] = set_value('category_id');
				$saveData['sub_category_id'] = set_value('sub_category_id');
				$saveData['level'] = set_value('level');
				$saveData['user_id'] = $author;
				$saveData['language'] = set_value('language');

				$tempData['requirements'] = set_value('requirements');
				$tempData['outcomes'] = set_value('outcomes');

				$saveData['requirements'] = json_encode($tempData['requirements']);
				$saveData['outcomes'] = json_encode($tempData['outcomes']);

				$saveData['thumbnail_old'] = set_value('thumbnail_old');
				$saveData['video_url'] = set_value('video_url');

				$saveData['last_modified'] = $this->date_();
				$saveData['is_free_course'] = set_value('is_free_course');
				$saveData['price'] = set_value('price');
				$saveData['discount_price'] = set_value('discount_price');
				$saveData['course_overview_provider'] = set_value('course_overview_provider');

				$this->course->updateData('course', $saveData, 'id', $id);

				$this->session->set_flashdata('message', '¡Curso actualizado exitosamente!');
				redirect(base_url() . 'admin/courses/edit/' . $id . '/' . $author, 'location');
			endif;
		else:
			$this->session->set_flashdata('message', '¡Ubicación del curso invalido!');
			redirect(base_url() . 'admin/courses', 'location');
		endif;
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

		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '5000';
		$config['quality'] = '60%';
		$config['file_name'] = $user_img_profile;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('thumbnail')) {
			return array('values' => false, 'data' => $this->upload->display_errors());

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
		return $d->format("Ymd-His-u");
	}

	private function date_()
	{
		date_default_timezone_set('America/Lima');
		return date('Y-m-d H:i:s');
	}
}
