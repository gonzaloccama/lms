<?php defined('BASEPATH') or exit('No direct script access allowed');

class Requests extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library('pagination');

		$this->load->helper(array('form', 'url'));

		$this->load->model('author/requests_modal', 'request');

		$this->load->library('session');
	}

	function index()
	{

		//$this->load->view('');
	}

	public function addsection($id, $user_id)
	{
		if (isset($_POST['title']) && !empty($_POST['title'])):
			$data['title'] = $_POST['title'];
			$data['user_id'] = $_POST['user_id'];
			$data['course_id'] = $id;

			$this->request->insert('section', $data);

			$this->session->set_flashdata('message', '¡Sección agregada exitosamente!');
			redirect(base_url() . 'author/courses/edit/' . $id . '/' . $user_id, 'location');
		endif;
	}

	public function add($id = 0)
	{
		if (isset($_POST['title']) && !empty($_POST['title'])):

			$saveData['title'] = $this->input->post('title');
			$saveData['user_id'] = $this->input->post('user_id');
			$saveData['course_id'] = $this->input->post('course_id');

			$insert = $this->request->insert('section', $saveData);

			$data['sections'] = $this->request->rowTable($id, 'section', 'course_id', 1, 'order');
			$data['lessons'] = $this->request->sortLesson($id, 'lesson');

			$this->load->view('author/section/requests', $data);
		else:
			$data['sections'] = $this->request->rowTable($id, 'section', 'course_id', 1, 'order');
			$data['lessons'] = $this->request->sortLesson($id, 'lesson');
//			echo json_encode($res);
			$this->load->view('author/section/requests', $data);
		endif;

	}

	public function search($offset = null)
	{

		$key = array(
			'keyword' => trim($this->input->post('search_text')),//
		);
		$dt = null;

		if (isset($_POST['user_id']) && !empty($_POST['user_id']))
			$dt['course.user_id'] = trim($this->input->post('user_id'));

		if (isset($_POST['category']) && !empty($_POST['category']))
			$dt['course.sub_category_id'] = trim($this->input->post('category'));

		if (isset($_POST['status']) && !empty($_POST['status']))
			if ($_POST['status'] == 2)
				$dt['course.status'] = 0;
			else
				$dt['course.status'] = trim($this->input->post('status'));

//		var_dump($dt);

		$limit = 2;

		$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$config['base_url'] = site_url('author/requests/search');
		$config['total_rows'] = $this->request->searched($limit, $offset, $key, $dt, 1, 'course');
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;


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

		$data['admin'] = $this->input->post('admin');

		$data['courses'] = $this->request->searched($limit, $offset, $key, $dt, 0, 'course');

		$data['pagelinks'] = $this->pagination->create_links();

		$this->load->view('admin/search/courses', $data);

	}

	public function sort($id = 0, $add = 0, $sort = 0)
	{
		if (!$add) {
			if ($id) {
				if ($sort) {
					$data['sections'] = $this->request->rowTable($id, 'section', 'course_id', 1, 'order');
				} else {
					$data['sections'] = $this->request->rowTable($id, 'section', 'course_id');
				}

				echo json_encode($data['sections']);
			}
		} else {

			$sections = $this->request->rowTable($id, 'section', 'course_id');
			$tempData = $this->input->post('section');

			$saveData['section'] = json_encode($this->input->post('sectionId'));
			$this->request->updateData('course', $saveData, 'id', $id);

			$i = 0;
			foreach ($tempData as $datum):
				$dt['order'] = $datum;
				$this->request->updateData('section', $dt, 'id', $sections[$i]->id);
				$i++;
			endforeach;
		}
	}

	public function sort_lesson($id = 0, $add = 0, $sort = 0)
	{
		if (!$add) {
			if ($id) {
				if ($sort) {
					$data['lessons'] = $this->request->rowTable($id, 'lesson', 'section_id', 1, 'order');
				} else {
					$data['lessons'] = $this->request->rowTable($id, 'lesson', 'section_id');
				}
				echo json_encode($data['lessons']);
			}
		} else {

			$lessons = $this->request->rowTable($id, 'lesson', 'section_id');
			$tempData = $this->input->post('lesson');

			$saveData['lesson'] = json_encode($this->input->post('lessonId'));
			//$this->request->updateData('course', $saveData, 'id', $id);

			$i = 0;
			foreach ($tempData as $datum):
				$dt['order'] = $datum;
				$this->request->updateData('lesson', $dt, 'id', $lessons[$i]->id);
				$i++;
			endforeach;
		}
	}


	public function add_lesson($id = 0, $lesson = null)
	{
		if (!$lesson):
			if (isset($_POST['title_lesson']) && !empty($_POST['title_lesson'])):

				$saveData['lesson_type'] = $video_type = $this->input->post('type_lesson');
				$saveData['title'] = $this->input->post('title_lesson');
				$saveData['course_id'] = $id;
				$saveData['section_id'] = $this->input->post('section_id_lesson');

				$saveData['date_added'] = $this->date_();
				$saveData['summary'] = $this->input->post('summary_lesson');

				if ($video_type == 'YouTube' || $video_type == 'Vimeo' || $video_type == 'Video-url'):


					$saveData['video_url'] = $this->input->post('video_url_lesson');
					$saveData['icon_type'] = 'video_library';
					$saveData['duration'] = $this->input->post('duration_lesson');

				elseif ($video_type == 'Documento' || $video_type == 'Imagen'):
					//					upload - documents
					$resutl = $this->upload_img('courses', $this->session->userdata('id'), $id);

					if ($resutl['values']) :
						$cn = '';
						$video_type == 'Documento' ? $cn = 'picture_as_pdf' : $cn = 'collections';

						$saveData['icon_type'] = $cn;

						$saveData['attachment'] = $resutl['data'];

					else:
						$resutl['data'];
					endif;
				//					end upload documents
				elseif ($video_type == 'Quiz'):
					$saveData['icon_type'] = 'quiz';

				else:
					$saveData['icon_type'] = 'code';
					$saveData['container_embed'] = $this->input->post('summary_full');

				endif;
				$insert = $this->request->insert('lesson', $saveData);
				echo json_encode($insert);

			else:
				echo 0;
			endif;
		else:
			if (isset($_POST['course_id']) && !empty($_POST['course_id'])):

				$course_id = $this->input->post('course_id');

				$data['type'] = $lesson;
				$data['sections'] = $this->request->rowTable($course_id, 'section', 'course_id', 1, 'order');

				$this->load->view('author/lesson/requests', $data);

			else:
				echo 0;
			endif;

		endif;

		//echo json_encode(array('aa' => 'hola'));
	}

	public function edit($id = 0, $lesson = 0)
	{

		if (!$lesson):
			if (isset($_POST['title']) && !empty($_POST['title'])):

				$section_id = $saveData['id'] = $this->input->post('id');
				$saveData['title'] = $this->input->post('title');

				$update = $this->request->updateData('section', $saveData, 'id', $section_id);

				$data['sections'] = $this->request->rowTable($id, 'section', 'course_id', 1, 'order');
				$data['lessons'] = $this->request->sortLesson($id, 'lesson');

				$this->load->view('author/section/requests', $data);
			endif;
		else:
			$lesson_type = array('YouTube', 'Vimeo', 'Video-url', 'Documento', 'Imagen', 'Iframe-embed', 'Quiz');

			if (isset($_POST['title_lesson']) && !empty($_POST['title_lesson'])):

				$id_lesson = $this->input->post('id_lesson');

				$saveData['lesson_type'] = $video_type = $this->input->post('type_lesson');
				$saveData['title'] = $this->input->post('title_lesson');

				$saveData['section_id'] = $this->input->post('section_id_lesson');

				$saveData['last_modified'] = $this->date_();
				$saveData['summary'] = $this->input->post('summary_lesson');

				if ($video_type == $lesson_type[0] || $video_type == $lesson_type[1] || $video_type == $lesson_type[2]):

					$saveData['video_url'] = $this->input->post('video_url_lesson');
					$saveData['icon_type'] = 'video_library';
					$saveData['duration'] = $this->input->post('duration_lesson');

				elseif ($video_type == $lesson_type[3] || $video_type == $lesson_type[4]):
					//					upload - documents
					if (isset($_FILES['attachment']['name']) && !empty($_FILES['attachment']['name'])):

						$dt_lesson['id'] = $id;
						$tmp = $this->request->row_table('lesson', $dt_lesson);

						$resutl = $this->upload_img('courses', $this->session->userdata('id'), $id);
						$saveData['attachment'] = $resutl['data'];

						unlink($tmp[0]->attachment);

					else:
						$resutl['values'] = true;
					endif;

					if ($resutl['values']) :

						$video_type == 'Documento' ? $cn = 'picture_as_pdf' : $cn = 'collections';

					else:
						$resutl['data'];
					endif;
				//					end upload documents
				elseif ($video_type == $lesson_type[6]):
					$saveData['icon_type'] = 'quiz';
				else:
					$saveData['icon_type'] = 'code';
					$saveData['container_embed'] = $this->input->post('summary_full');;

				endif;
				$update = $this->request->updateData('lesson', $saveData, 'id', $id_lesson);

				echo json_encode($update);
			else:
				echo 0;
			endif;
		endif;
	}

	public function get_lesson($id = 0, $course_id = 0)
	{
		if ($id) {
			$data['lesson'] = $this->request->rowTable($id, 'lesson', 'id');
			$data['sections'] = $this->request->rowTable($course_id, 'section', 'course_id', 1, 'order');

			//echo json_encode($data);
			$this->load->view('author/lesson/requests', $data);
		}
	}

	public function add_question($id = 0)
	{
		if (isset($_POST['title-question']) && !empty($_POST['title-question'])):
			$saveData['quiz_id'] = $id;
			$saveData['title'] = $this->input->post('title-question');
			$saveData['type'] = 'multiple';
			$saveData['number_of_options'] = $this->input->post('number_of_options');
			$saveData['options'] = json_encode($this->input->post('options'));
			$saveData['correct_answers'] = json_encode($this->input->post('correct_answers'));

			$insert = $this->request->insert('question', $saveData);

			echo json_encode($insert);
		endif;
	}

	public function get_question($id = 0)
	{
		if ($id):

			$data['questions'] = $this->request->rowTable($id, 'question', 'quiz_id', 1, 'order');

			$this->load->view('author/question/requests', $data);
			//echo json_encode($data);
		endif;
	}

	public function delete_course($id)
	{
		$data['course'] = $this->request->rowTable($id, 'course', 'id');

		$saveData['course_id'] = $data['course'][0]->id;
		$saveData['course'] = $data['course'][0]->title;
		$saveData['user_id'] = $data['course'][0]->user_id;
		$saveData['date_delete'] = $this->date_();
		$saveData['author_delete'] = 5;

		unlink($data['course'][0]->thumbnail);

		$insert = $this->request->insert('course_archive', $saveData);

		$this->rowdelete($id, 'course', 'id');
		$this->rowdelete($id, 'section', 'course_id');
		$this->rowdelete($id, 'lesson', 'course_id');

		echo json_encode($insert);
	}

	public function delete_section($id)
	{
		$this->rowdelete($id, 'section', 'id');
		$this->rowdelete($id, 'lesson', 'section_id');
		echo json_encode(array(
			"statusCode" => 200
		));
	}

	public function delete_users($id)
	{
		$data['user'] = $this->request->rowTable($id, 'users', 'id');
		unlink($data['user'][0]->user_image);
		$this->rowdelete($id, 'users', 'id');
		echo json_encode(array(
			"statusCode" => 200
		));
	}

	public function delete_lesson($id)
	{
		$this->rowdelete($id, 'lesson', 'id');
		echo json_encode(array(
			"statusCode" => 200
		));
	}

	public function delete_question($id)
	{
		$this->rowdelete($id, 'question', 'id');
		echo json_encode(array(
			"statusCode" => 200
		));
	}

	private function upload_img($details, $author = '', $course = 0)
	{
		$ram = $this->random_date();
		$file_name = $_FILES['attachment']['name'];
		$tmp = explode('.', $file_name);
		$extension_img = end($tmp);

		$user_img_profile = $ram . '.' . $extension_img;

		$config['upload_path'] = 'assets/admin/document/author/' . $details . '/' . $author . '/' . $course;


		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, true);
		}
		$config['allowed_types'] = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|ppt|pptx|csv|odt|odp|pdf|rtf';
		$config['max_size'] = '15000';
		//$config['quality'] = '60%';
		$config['file_name'] = $user_img_profile;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('attachment')) {
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

	private function rowdelete($id = 0, $table = null, $field = null)
	{
		if ($id) {
			$this->request->delete_rows($id, $table, $field);
		}
	}

	private function date_()
	{
		date_default_timezone_set('America/Lima');
		return date('Y-m-d H:i:s');
	}
}
