<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Search extends CI_Controller {

      function __construct() {
         parent::__construct();

         $this->load->model('mwebprofile');
         $this->load->model('marticle');
      }

      public function index() {
         $webprofile = $this->mwebprofile->getAll();
         $searchkeyword = (!empty($this->input->get('search'))) ? $this->input->get('search') : '';

         if (!empty($searchkeyword)) {
            $event = $this->marticle->search($searchkeyword);
         } else {
            $event = array();
         }

         $this->load->view('head' ,array(
            'webtitle' => $webprofile->webTitle ,
            'webdesc' => $webprofile->webDesc
         ));

         $this->load->view('menu');
         $this->load->view('search', array(
            'event' => $event ,
            'searchkeyword' => $searchkeyword
         ));
         $this->load->view('footer-calender');
      }
   }
?>
