<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!$this->session->has_userdata('admin_eventfinder')) {
         header("LOCATION: " . site_url('admin/login'));
      } else {
         $userdata = $this->session->userdata('admin_eventfinder');
      }
	}

	public function index() {

		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar', array(
			'activate' => "gallery"
		));
		$this->load->view('administrator/gallery/body');
		$this->load->view('administrator/footer');

	}
}
