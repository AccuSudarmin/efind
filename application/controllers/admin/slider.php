<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

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
			'activate' => "slider"
		));

		$this->load->view('administrator/slider/body' , array (
         'pagetitle' => "Slider" ,
         'urlsorting' => site_url('admin/slider/sorting') ,
			'urladd' => site_url('admin/slider/add')
      ));

		$this->load->view('administrator/footer');
	}

	public function add() {
		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar' , array(
			'activate' => "slider"
		));
		$this->load->view('administrator/slider/form', array(
			'title' => 'Input Data Slider' ,
			'subtitle' => 'Content Management' ,
			'urltarget' => site_url('admin/slider/save') ,
			'urlsuccess' => site_url('admin/slider') ,
			'urlback' => site_url('admin/slider')
		));
		$this->load->view('administrator/footer');
	}

   public function sorting() {

		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar', array(
			'activate' => "slider"
		));

		$this->load->view('administrator/slider/body-sorting' , array (
         'pagetitle' => "Slider" ,
         'urltarget' => site_url('admin/slider/sortingupdate') ,
         'urlsuccess' => site_url('admin/slider')
      ));

		$this->load->view('administrator/footer');
	}
}
