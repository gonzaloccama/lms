<?php defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation', 'encryption', 'session', 'email'));

		$this->load->helper(array('form', 'url', 'auth_rules'));

		$this->load->model('auth/auth_model', 'auth');

	}

	function index()
	{

//		if ($this->session->userdata('is_logged')):
//
//			if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2):
//				redirect(base_url() . 'admin/courses');
//			elseif ($this->session->userdata('role_id') == 3):
//				redirect(base_url() . 'author/courses');
//			endif;
//
//		endif;

		$data['info'] = array(
			'page_title' => 'Register',
			'title' => 'Register',
			'_section_' => 'auth/register',
			'_script_' => 'auth/script',
		);

		$this->load->view('user/_layout_', $data);
	}

	function validate()
	{
		$this->form_validation->set_rules('dni', 'DNI', 'required|numeric|exact_length[8]');
		$this->form_validation->set_rules('name', 'Nombres', 'required');
		$this->form_validation->set_rules('first_parent', 'Apellido Paterno', 'required');
		$this->form_validation->set_rules('last_parent', 'Apellido Materno', 'trim');
		$this->form_validation->set_rules('email', 'Correo Electrónico', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[8]');
		$this->form_validation->set_rules('password_v', 'Validar Contraseña', 'required|min_length[8]');

		if ($this->form_validation->run() === FALSE) {
			$errors = array(
				'dni' => form_error('dni'),
				'name' => form_error('name'),
				'first_parent' => form_error('first_parent'),
				'last_parent' => form_error('last_parent'),
				'email' => form_error('email'),
				'password' => form_error('password'),
				'password_v' => form_error('password_v')
			);
			echo json_encode($errors);
			$this->output->set_status_header(400);
		} else {

			$saveData['email'] = set_value('email');
			$saveData['password'] = $this->encryption->encrypt(set_value('password'));
			$password_v = $this->encryption->encrypt(set_value('password_v'));

			if ($this->encryption->decrypt($saveData['password']) != $this->encryption->decrypt($password_v)) {
				echo json_encode(array('msg' => 'Las contraseñas no coenciden.'));
				$this->output->set_status_header(402);
				exit;
			}

			if ($this->auth->authSession($saveData['email'])) {
				echo json_encode(array('msg' => 'El usuario con el correo <b>' . $saveData['email'] . '</b> ya existe.'));
				$this->output->set_status_header(401);
				exit;
			}

			$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$verification_code = substr(str_shuffle($set), 0, 126);

			$saveData['dni'] = set_value('dni');
			$saveData['name'] = set_value('name');
			$saveData['first_parent'] = set_value('first_parent');
			$saveData['last_parent'] = set_value('last_parent');
			$saveData['verification_code'] = $this->encryption->encrypt($verification_code);

			$saveData['date_added'] = $this->date_();
			$saveData['role_id'] = 4;

			$res = $this->auth->insert('users', $saveData);

			$send = $this->send_email(
				$res,
				$saveData['email'],
				$this->encryption->decrypt($saveData['password']),
				$verification_code);

			$text = json_encode(array(
				'mssg' => "Hola, <b>" . $saveData['name'] . ".</b> ¡Te registraste exitosamente!",
				'class' => 'success',
				'send' => $send));

//			echo json_encode($text);

			$this->session->set_flashdata('message', $text);

			echo json_encode(array("url" => base_url() . 'auth/register/success/' . urlencode(base64_encode($res))));
		}
	}

	public function success($id)
	{
		if (isset($id) && !empty($id)):
			$id = base64_decode(urldecode($id));

			$dt = array('id' => $id);

			$users = $this->auth->rowTable('users', $dt);

			$data['email'] = $users[0]->email;

			$data['info'] = array(
				'page_title' => 'Registro exitosa',
				'_section_' => 'auth/success',
				'_script_' => 'auth/script',
			);
			$this->load->view('user/_layout_', $data);
		endif;
	}

	public function activate($id, $code)
	{
		if (isset($id) && !empty($id)) {

			$id = base64_decode(urldecode($id));

			$srs = array('id' => $id);
			$user = $this->auth->rowTable('users', $srs);

			if (!$user[0]->status
				&& $code == $this->encryption->decrypt($user[0]->verification_code)) {

				$saveData['status'] = 1;
				$saveData['last_modified'] = $this->date_();
				$dt = array('id' => $id);
				$this->auth->updateData('users', $saveData, $dt);

				$text = json_encode(array(
					'mssg' => "Hola, </b> ¡Su cuenta se encuentra activada!",
				));

				$this->session->set_flashdata('message', $text);

				$data['email'] = $user[0]->email;

				$data['info'] = array(
					'page_title' => 'Activación exitosa',
					'_section_' => 'auth/activate',
					'_script_' => 'auth/script',
				);

				$this->load->view('user/_layout_', $data);

			} else {

				$text = json_encode(array(
					'mssg', "Hola, <b>" . $user[0]->name . ".</b> ¡Su cuenta ya se encuentra activada!"
				));

				$this->session->set_flashdata('message', $text);

				redirect(base_url() . 'auth/login');
			}
		}
	}

	private function date_()
	{
		date_default_timezone_set('America/Lima');
		return date('Y-m-d H:i:s');
	}

	private function send_email($id = 0, $email, $password, $code)
	{
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.onelcn.com',
			'smtp_port' => 26,
			'smtp_user' => 'admin@onelcn.com', // change it to yours
			'smtp_pass' => 'Ccama8903ys', // change it to yours
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'validation' => TRUE
		);

		$this->email->initialize($config);

		$message = "
						<html lang='es'>
						<head>
							<title>Código de verificación</title>
						</head>
						<body>
							<h2>Gracias por registrarte.</h2>
							<p>Su cuenta:</p>
							<p>Email: " . $email . "</p>
							<p>Password: " . $password . "</p>
							<p>Haga clic en el enlace de abajo para activar su cuenta.</p>
							<h4><a href='" . base_url() . "auth/register/activate/" . urlencode(base64_encode($id)) . "/" . $code . "'>Activar mi cuenta</a></h4>
						</body>
						</html>
						";


		$this->email->set_newline("\r\n");
		$this->email->from($config['smtp_user']);
		$this->email->to("$email");
		$this->email->subject('Correo electrónico de verificación de registro');
		$this->email->message($message);

		if ($this->email->send()):
			return 'enviado';
		else:
			return $this->email->print_debugger();
		endif;
	}
}
