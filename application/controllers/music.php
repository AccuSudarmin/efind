<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Music extends CI_Controller{

   public function index()
	{
    $this->load->view('head');
		$this->load->view('calender');
    $this->load->view('article-container');
    $this->load->view('footer-calender');
	}
}
