<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Home extends CI_Controller {

      function __construct() {
         parent::__construct();

         $this->load->model('mslider');
         $this->load->model('mwebprofile');
         $this->load->model('mvisitor');
      }

      public function index() {
         $slider = $this->mslider->getAll();
         $webprofile = $this->mwebprofile->getAll();

         $this->load->view('head' ,array(
            'webtitle' => $webprofile->webTitle ,
            'webdesc' => $webprofile->webDesc
         ));

         $this->load->view('home', array(
            'slider' => $slider,
         ));

         $visitor = $this->mvisitor->increaseVisitorToday();
      }
   }
?>
