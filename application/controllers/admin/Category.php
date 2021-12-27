<?php defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
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
		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)) {
			redirect('/auth/login');
		}

		$data['info'] = array(
			'page_title' => 'Administrador - Categoria',
			'title' => 'Categoria',
			'sub_title' => 'Lista de categorias',
			'active' => 2,
			'script' => 'admin/script',
			'sidebar' => 'admin/template/sidebar',
			'nn' => (!$this->session->userdata('is_logged')),
		);

		$this->load->view('admin/category/manager', $data);
	}

	function add()
	{
		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)) {
			redirect('/auth/login');
		}

		$data = NULL;

		$this->form_validation->set_rules('name', 'nombre de categoria', 'required');
		$this->form_validation->set_rules('parent', 'parent', 'trim');
		$this->form_validation->set_rules('color', 'color', 'required');
		$this->form_validation->set_rules('thumbnail', 'thumbnail', 'trim');

		if ($this->form_validation->run() == FALSE) :

			$data['info'] = array(
				'page_title' => 'Administrador - Categoria',
				'title' => 'Categoria',
				'sub_title' => 'Crear categoria',
				'active' => 2,
				'script' => 'admin/script',
				'sidebar' => 'admin/template/sidebar',
			);


			$data['categories'] = $this->category->ListTable(1, 'category');

			$this->load->view('admin/category/add', $data);
		else:
			$saveData['name'] = set_value('name');
			$saveData['parent'] = set_value('parent');
			$saveData['color'] = set_value('color');
			$saveData['date_added'] = $this->date_();

			$crs = $this->category->insert('category', $saveData);

			$result = null;
			if (isset($_FILES['thumbnail']['name']) && !empty($_FILES['thumbnail']['name'])):
				$result = $this->upload_img($crs);
				$updateData['thumbnail'] = $result['data'];

				$this->category->updateData('category', $updateData, 'id', $crs);

				$this->session->set_flashdata('message', 'Se creó exitosamente la categoria');
			endif;


			$this->session->set_flashdata('message', 'Se creó exitosamente la categoria');

			redirect(base_url() . 'admin/category', 'location');
		endif;
	}

	public function edit($id = 0)
	{

		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)) {
			redirect('/auth/login');
		}

		$this->form_validation->set_rules('name', 'nombre de categoria', 'required');
		$this->form_validation->set_rules('parent', 'parent', 'trim');
		$this->form_validation->set_rules('color', 'color', 'required');
		$this->form_validation->set_rules('thumbnail', 'thumbnail', 'trim');

		if ($this->form_validation->run() == FALSE) :
			$data['info'] = array(
				'page_title' => 'Administrador - Categoria',
				'title' => 'Categoria',
				'sub_title' => 'Actualizar',
				'active' => 2,
				'script' => 'admin/script',
				'sidebar' => 'admin/template/sidebar',
			);

			$dt = array(
				'id' => $id,
			);

			$data['result'] = $this->category->rowTable('category', $dt);
			$data['categories'] = $this->category->ListTable(1, 'category');

			$this->load->view('admin/category/edit', $data);
		else:
			$saveData['name'] = set_value('name');
			$saveData['parent'] = set_value('parent');
			$saveData['color'] = set_value('color');
			$saveData['last_modified'] = $this->date_();


			if (isset($_FILES['thumbnail']['name']) && !empty($_FILES['thumbnail']['name'])):
				$dt = array(
					'id' => $id,
				);
				$dataTemp = $this->category->rowTable('category', $dt);
				$result = $this->upload_img($id);
				$saveData['thumbnail'] = $result['data'];
				unlink($dataTemp->thumbnail);
			endif;

			$crs = $this->category->updateData('category', $saveData, 'id', $id);

			$this->session->set_flashdata('message', 'Se actualizó exitosamente la categoria');

			redirect(base_url() . 'admin/category', 'location');
		endif;
	}

	private function upload_img($id = 0)
	{
		$ram = $this->random_date();
		$file_name = $_FILES['thumbnail']['name'];
		$tmp = explode('.', $file_name);
		$extension_img = end($tmp);

		$user_img_profile = $ram . '.' . $extension_img;

		$config['upload_path'] = 'assets/admin/images/categories/' . $id;


		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, true);
		}

		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '2000';
		$config['quality'] = '60%';
		$config['file_name'] = $user_img_profile;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('thumbnail')) {
			return array('values' => false, 'data' => $this->upload->display_errors());

		} else {
			return array('values' => true, 'data' => $config['upload_path'] . '/' . $user_img_profile);
		}
	}

	public function delete_category($id = 0)
	{
		$dt = array('id' => $id);

		$dataTemp = $this->category->rowTable('category', $dt);

		if (isset($dataTemp) && !empty($dataTemp) && $dataTemp->thumbnail != '') {
			unlink($dataTemp->thumbnail);
		}

		$this->rowdelete($id, 'category', 'id');
		echo json_encode(array(
			"statusCode" => 200
		));
	}

	private function rowdelete($id = 0, $table = null, $field = null)
	{
		if ($id) {
			$this->category->delete_rows($id, $table, $field);
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

