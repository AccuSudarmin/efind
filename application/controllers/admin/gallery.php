<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller {

	function __construct() {
		parent::__construct();

	}

	public function index() {
		$event = $this->mgallery->getAll();

		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar', array(
			'activate' => "gallery"
		));
		$this->load->view('administrator/gallery/body');
		$this->load->view('administrator/footer');

	}

	public function add() {

		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar' , array(
			'activate' => "gallery"
		));
		$this->load->view('administrator/gallery/form', array(
			'title' => 'Input Data Gallery' ,
			'urlaction' => site_url('/admin/gallery/save') ,
			'urlsuccess' => site_url('/admin/gallery') ,
			'urlback' => site_url('/admin/gallery')
		));

	}
}
