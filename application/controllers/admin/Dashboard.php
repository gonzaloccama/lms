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
		$data['page_title'] = 'Administrador - Dashboard';
		$data['title'] = 'Administrador';
		$data['sub_title'] = 'Cursos';

		$data['course'] = $this->dashboard->ListTable(1, 'course');

		$this->load->view('admin/dashboard', $data);
    }
}
