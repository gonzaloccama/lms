<?php defined('BASEPATH') or exit('No direct script access allowed');

class Instructor extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));

		$this->load->library(array('form_validation', 'encryption', 'session'));

		$this->load->model('admin/instructor_model', 'instructor');

	}

	function index()
	{
		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)){
			redirect('/auth/login');
		}

		$data['info'] = array(
			'page_title' => 'Administrador - Instructor',
			'title' => 'Instructor',
			'sub_title' => 'Instructores',
			'active' => 4,
			'script' => 'admin/instructor/script',
			'sidebar' => 'admin/template/sidebar',
		);

		$this->load->view('admin/instructor/manager', $data);
	}

	public function add()
	{
		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)){
			redirect('/auth/login');
		}

		$this->form_validation->set_rules('dni', 'DNI', 'required|numeric|exact_length[8]');
		$this->form_validation->set_rules('name', 'Nombre', 'required');
		$this->form_validation->set_rules('first_parent', 'Apellido Paterno', 'required');
		$this->form_validation->set_rules('last_parent', 'Apellido Materno', 'trim');
		$this->form_validation->set_rules('biography', 'Biografía', 'trim');
		$this->form_validation->set_rules('user_image', 'user_image', 'trim');
		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('social_link[]', 'Social', 'trim');

		if ($this->form_validation->run() == FALSE) :
			$data['info'] = array(
				'page_title' => 'Administrador - Instructor',
				'title' => 'Instructor',
				'sub_title' => 'Añadir Instructor',
				'active' => 4,
				'script' => 'admin/instructor/script',
				'sidebar' => 'admin/template/sidebar',
			);

			$this->load->view('admin/instructor/add', $data);
		else:

			$saveData['dni'] = set_value('dni');
			$saveData['name'] = set_value('name');
			$saveData['first_parent'] = set_value('first_parent');
			$saveData['last_parent'] = set_value('last_parent');
			$saveData['biography'] = html_entity_decode(set_value('biography'));
			$saveData['email'] = set_value('email');
			$saveData['password'] = $this->encryption->encrypt(set_value('password'));
			$saveData['date_added'] = $this->date_();
			$saveData['is_instructor'] = 1;
			$saveData['social_link'] = json_encode(set_value('social_link'));

			$user = $this->instructor->insert('users', $saveData);

			if (isset($_FILES['user_image']['name']) && !empty($_FILES['user_image']['name'])):
				$result = $this->upload_img($user);
				$updateData['user_image'] = $result['data'];
				$this->instructor->updateData('users', $updateData, 'id', $user);
			endif;

			$this->session->set_flashdata('message', '¡Registro exitoso de nuevo usuario!');
			redirect(base_url() . 'admin/instructor', 'location');
		endif;
	}

	public function edit($id = 0)
	{
		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)){
			redirect('/auth/login');
		}

		$this->form_validation->set_rules('dni', 'DNI', 'required|numeric|exact_length[8]');
		$this->form_validation->set_rules('name', 'Nombre', 'required');
		$this->form_validation->set_rules('first_parent', 'Apellido Paterno', 'required');
		$this->form_validation->set_rules('last_parent', 'Apellido Materno', 'trim');
		$this->form_validation->set_rules('biography', 'Biografía', 'trim');
		$this->form_validation->set_rules('user_image', 'user_image', 'trim');
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('social_link[]', 'Social', 'trim');

		if ($this->form_validation->run() == FALSE) :
			$data['info'] = array(
				'page_title' => 'Administrador - Instructor',
				'title' => 'Instructor',
				'sub_title' => 'Editar Instructor',
				'active' => 4,
				'script' => 'admin/instructor/script',
				'sidebar' => 'admin/template/sidebar',
			);

			$dt = array(
				'is_instructor' => 1,
				'id' => $id,
			);

			$data['user'] = $this->instructor->rowTable('users', $dt);

			$this->load->view('admin/instructor/edit', $data);
		else:

			$saveData['dni'] = set_value('dni');
			$saveData['name'] = set_value('name');
			$saveData['first_parent'] = set_value('first_parent');
			$saveData['last_parent'] = set_value('last_parent');
			$saveData['biography'] = html_entity_decode(set_value('biography'));
			$saveData['email'] = set_value('email');
			$saveData['password'] = $this->encryption->encrypt(set_value('password'));
			$saveData['last_modified'] = $this->date_();
			$saveData['social_link'] = json_encode(set_value('social_link'));

			if (isset($_FILES['user_image']['name']) && !empty($_FILES['user_image']['name'])):
				$tmp = $this->instructor->rowTable('users', array('id' => $id));
				$result = $this->upload_img($id);
				$saveData['user_image'] = $result['data'];
				unlink($tmp->user_image);
			endif;

			$this->instructor->updateData('users', $saveData, 'id', $id);

			$this->session->set_flashdata('message', '¡Actualización exitosa del usuario!');
			redirect(base_url() . 'admin/instructor', 'location');

		endif;
	}

	private function upload_img($id = 0)
	{


		$ram = $this->random_date();
		$file_name = $_FILES['user_image']['name'];
		$tmp = explode('.', $file_name);
		$extension_img = end($tmp);

		$user_img_profile = $ram . '.' . $extension_img;

		$config['upload_path'] = 'assets/admin/images/users/avatar/' . $id;


		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, true);
		}

		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '5000';
		$config['quality'] = '60%';
		$config['file_name'] = $user_img_profile;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('user_image')) {
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
