<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

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
		$this->load->view('administrator/sidebar' , array(
			'activate' => "event"
		));
		$this->load->view('administrator/content');

	}

	public function add() {
		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar' , array(
			'activate' => "event"
		));
		$this->load->view('administrator/form', array(
			'title' => 'Input Data Event' ,
			'subtitle' => 'Content Management' ,
			'urltarget' => site_url('/event/save') ,
			'urlsuccess' => site_url('/event') ,
			'urlback' => site_url('/event')
		));
	}
}
