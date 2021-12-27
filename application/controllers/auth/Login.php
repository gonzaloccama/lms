<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation', 'encryption', 'session'));

		$this->load->helper(array('form', 'url', 'auth_rules'));

		$this->load->model('auth/auth_model', 'auth');

	}

	function index()
	{
		if ($this->session->userdata('is_logged')):

			if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2):
				redirect(base_url() . 'admin/courses');
			elseif ($this->session->userdata('role_id') == 3):
				redirect(base_url() . 'author/courses');
			endif;

		endif;

		$data['info'] = array(
			'page_title' => 'Login',
			'title' => 'Login',
			'_section_' => 'auth/login',
			'_script_' => 'auth/script',
		);

		$this->load->view('user/_layout_', $data);
	}


	function validate()
	{
		$this->form_validation->set_error_delimiters('', '');

		$rules = getLoginRules();

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() === FALSE) {
			$errors = array(
				'email' => form_error('email'),
				'password' => form_error('password')
			);
			echo json_encode($errors);
			$this->output->set_status_header(400);
		} else {

			$saveData['email'] = set_value('email');
			$saveData['password'] = set_value('password');

			$res = $this->auth->authSession($saveData['email']);

			if (isset($res) && !empty($res)) {
				if (!($this->encryption->decrypt($res->password) == $saveData['password'])) {
					echo json_encode(array('msg' => 'El usuario o la contraseña es incorrecta'));
					$this->output->set_status_header(401);
					exit;
				}
			} else {
				echo json_encode(array('msg' => 'El usuario o la contraseña es incorrecta'));
				$this->output->set_status_header(401);
				exit;
			}

			$data = array(
				'id' => $res->id,
				'name' => $res->name . ' ' . $res->first_parent . ' ' . $res->last_parent,
				'email' => $res->email,
				'social_link' => $res->social_link,
				'user_image' => $res->user_image,
				'role_id' => $res->role_id,
				'is_instructor' => $res->is_instructor,
				'is_logged' => TRUE
			);

			if ($res->role_id == 1 || $res->role_id == 2):
				$red_uri = 'admin/courses';
			elseif ($res->role_id == 3):
				$red_uri = 'author/courses';
			elseif ($res->role_id == 4):
				$red_uri = 'author/courses';
			endif;

			$this->session->set_userdata($data);
			$this->session->set_flashdata('message', "Hola <b>{$this->session->userdata('name')},</b> bienvenido al sistema.");

			echo json_encode(array("url" => base_url() . $red_uri));
		}
	}

	function logout()
	{
		$session_destroy = array(
			'id',
			'name',
			'first_parent',
			'last_parent',
			'email',
			'social_link',
			'user_image',
			'role_id',
			'is_instructor',
			'is_logged');

		$this->session->unset_userdata($session_destroy);
		$this->session->sess_destroy();

		redirect(base_url());
	}
}
