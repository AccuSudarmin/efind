<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Search extends CI_Controller {

      function __construct() {
         parent::__construct();

         $this->load->model('mwebprofile');
      }

      public function index() {
         $webprofile = $this->mwebprofile->getAll();

         $this->load->view('head' ,array(
            'webtitle' => $webprofile->webTitle ,
            'webdesc' => $webprofile->webDesc
         ));
         
         $this->load->view('menu');
         $this->load->view('search');
         $this->load->view('footer-calender');
      }
   }
?>
