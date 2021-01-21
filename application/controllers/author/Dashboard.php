<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // $this->load->library('pagination');

        // $this->load->helper('url');

         $this->load->model('author/dashboard_model', 'dashboard');

        // $this->load->library('session');
    }

    function index()
    {
		$data['page_title'] = 'Instructor - Dashboard';
		$data['title'] = 'Instructor';
		$data['sub_title'] = 'Dashboard';
		$data['active'] = 1;

		$data['course'] = $this->dashboard->ListTable(1, 'course');

		$this->load->view('author/dashboard', $data);
    }
}
