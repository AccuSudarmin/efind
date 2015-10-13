<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class MY_Controller extends CI_Controller
   {

      function __construct()
      {
         parent::__construct();

   		if (!$this->session->has_userdata('admin_eventfinder')) {
            header("LOCATION: " . site_url('admin/login'));
         } else {
            $this->userdata = $this->session->userdata('admin_eventfinder');
         }
      }
   }

?>
