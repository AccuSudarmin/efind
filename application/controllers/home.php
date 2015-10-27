<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Home extends CI_Controller {

      function __construct() {
         parent::__construct();

         $this->load->model('mslider');
      }

      public function index() {
         $slider = $this->mslider->getAll();

         $this->load->view('head');
         $this->load->view('home', array(
            'slider' => $slider,
         ));
      }
   }
?>
