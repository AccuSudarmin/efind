<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->library('session');
		$this->load->helper('url');

		if (!$this->session->has_userdata('admin_ulp')) {
         header("LOCATION: " . base_url('index.php/admin/login'));
      } else {
         $userdata = $this->session->userdata('admin_ulp');
      }
	}

	public function index() {

		$this->load->view('administrator/header');
		$this->load->view('administrator/navbar');
		$this->load->view('administrator/sidebar');
		$this->load->view('administrator/statistic');
		$this->load->view('administrator/footer');

	}
}
