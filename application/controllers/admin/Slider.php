<?php defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('admin/category_model', 'category');
		$this->load->library('session');
	}

	function index()
	{
		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)){
			redirect('/auth/login');
		}

		$data['info'] = array(
			'page_title' => 'Administrador - Slider',
			'title' => 'Slider',
			'sub_title' => 'Lista de sliders',
			'active' => 7,
			'script' => 'admin/slider/script',
			'sidebar' => 'admin/template/sidebar',
		);

		$this->load->view('admin/slider/manager', $data);
	}

	public function add()
	{
		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)){
			redirect('/auth/login');
		}

		$data = NULL;

		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('phrase', 'descripción corta', 'required');
		$this->form_validation->set_rules('slide_img', 'slide_img', 'trim');
		$this->form_validation->set_rules('link_read_more', 'link_read_more', 'required');

		if ($this->form_validation->run() == FALSE) :

			$data['info'] = array(
				'page_title' => 'Administrador - Slider',
				'title' => 'Slider',
				'sub_title' => 'Crear slider',
				'active' => 7,
				'script' => 'admin/slider/script',
				'sidebar' => 'admin/template/sidebar',
			);

			$this->load->view('admin/slider/add', $data);
		else:
			$saveData['title'] = html_entity_decode(set_value('title'));
			$saveData['phrase'] = set_value('phrase');
			$saveData['link_read_more'] = set_value('link_read_more');
			$saveData['date_added'] = $this->date_();

			$crs = $this->category->insert('slider', $saveData);

			$result = null;
			if (isset($_FILES['slide_img']['name']) && !empty($_FILES['slide_img']['name'])):
				$result = $this->upload_img($crs);
				$updateData['slide_img'] = $result['data'];

				$this->category->updateData('slider', $updateData, 'id', $crs);
			endif;

			$this->session->set_flashdata('message', 'Se creó exitosamente el slider');

			redirect(base_url() . 'admin/slider', 'location');
		endif;
	}

	public function edit($id = 0)
	{
		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)){
			redirect('/auth/login');
		}

		$data = NULL;

		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('phrase', 'descripción corta', 'required');
		$this->form_validation->set_rules('slide_img', 'slide_img', 'trim');
		$this->form_validation->set_rules('link_read_more', 'link_read_more', 'required');

		if ($this->form_validation->run() == FALSE) :

			$data['info'] = array(
				'page_title' => 'Administrador - Slider',
				'title' => 'Slider',
				'sub_title' => 'Editar slider',
				'active' => 7,
				'script' => 'admin/slider/script',
				'sidebar' => 'admin/template/sidebar',
			);

			$dt = array(
				'id' => $id,
			);

			$data['result'] = $this->category->rowTable('slider', $dt);

			$this->load->view('admin/slider/edit', $data);
		else:
			$saveData['title'] = html_entity_decode(set_value('title'));
			$saveData['phrase'] = set_value('phrase');
			$saveData['link_read_more'] = set_value('link_read_more');
			$saveData['date_added'] = $this->date_();

			$result = null;
			if (isset($_FILES['slide_img']['name']) && !empty($_FILES['slide_img']['name'])):
				$dt = array(
					'id' => $id,
				);
				$dataTemp = $this->category->rowTable('slider', $dt);
				$result = $this->upload_img($id);
				$saveData['slide_img'] = $result['data'];
				unlink($dataTemp->slide_img);
			endif;

			$this->category->updateData('slider', $saveData, 'id', $id);

			$this->session->set_flashdata('message', 'Se actualizaó exitosamente el slider');

			redirect(base_url() . 'admin/slider', 'location');
		endif;
	}

	private function upload_img($id = 0)
	{
		$ram = $this->random_date();
		$file_name = $_FILES['slide_img']['name'];
		$tmp = explode('.', $file_name);
		$extension_img = end($tmp);

		$user_img_profile = $ram . '.' . $extension_img;

		$config['upload_path'] = 'assets/admin/images/slider/' . $id;


		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, true);
		}

		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '2000';
		$config['quality'] = '60%';
		$config['file_name'] = $user_img_profile;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('slide_img')) {
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
