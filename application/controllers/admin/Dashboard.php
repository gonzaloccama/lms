<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

         $this->load->library('pagination');

        // $this->load->helper('url');

         $this->load->model('admin/dashboard_model', 'dashboard');

         $this->load->library('session');
    }

    function index()
    {
		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)){
			redirect('/auth/login');
		}

		$data['info'] = array(
			'page_title' => 'Administrador - Dashboard',
			'title' => 'Dashboard',
			'sub_title' => 'Cursos',
			'active' => 1,
			'script' => 'admin/script',
			'sidebar' => 'admin/template/sidebar',
		);

		$data['course'] = $this->dashboard->ListTable(1, 'course');

		$this->load->view('admin/dashboard', $data);
    }
}
