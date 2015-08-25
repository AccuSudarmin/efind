<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Profile extends CI_Controller
   {
      function __construct() {
         parent::__construct();

         $this->load->helper('url');
         $this->load->model('mprofile');
      }

      public function index()  {

         $profile = $this->mprofile->getAll();

         $this->load->view('administrator/header');
   		$this->load->view('administrator/navbar');
   		$this->load->view('administrator/sidebar');
   		$this->load->view('administrator/profile/content' , array(
            "profile" => $profile
         ));
   		$this->load->view('administrator/footer');

      }

      public function edit($id) {

         $profile = $this->mprofile->getById($id);

         $this->load->view('administrator/header');
   		$this->load->view('administrator/navbar');
   		$this->load->view('administrator/sidebar');
   		$this->load->view('administrator/profile/form-edit' , array(
            "profile" => $profile
         ));
   		$this->load->view('administrator/footer');

      }

      public function update($id) {
         $title = $this->input->post('title');
         $content = $this->input->post('desc');

         $result = $this->mprofile->update( array(
            "pfId" => $id ,
            "pfTitle" => $title ,
            "pfContent" => $content
         ));

         $data = array("type" => "modal-box");

         if ($result) {
            $data['message'] = "Data Berhasil Disimpan";
            $data['delayURL'] = 1000;
         } else {
            $data['message'] = "Data Gagal Disimpan";
            $data['success'] = false;
         }

         echo json_encode($data);
      }

      public function delte() {

      }
   }

?>
