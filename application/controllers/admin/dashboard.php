<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!$this->session->has_userdata('admin_eventfinder')) {
         header("LOCATION: " . site_url('admin/login'));
      } else {
         $userdata = $this->session->userdata('admin_eventfinder');
      }

		$this->load->model('mvisitor');
	}

	public function index() {
		$this->mvisitor->joiningAll();

		$today = date('Y-m-d');
		$dayNow = date('j') + 8;
		$dayNow = (strlen($dayNow) > 1) ? '0' . $dayNow : $dayNow;

		$tillDay = date('Y-m-') . $dayNow;

		$visitor = $this->mvisitor->getByDate($today, $tillDay);

		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar', array(
			'activate' => "dashboard"
		));
		$this->load->view('administrator/statistic', array(
			'visitor' => $visitor
		));
		$this->load->view('administrator/footer');

	}
}
