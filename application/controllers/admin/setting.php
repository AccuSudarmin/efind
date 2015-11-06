<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Setting extends CI_Controller
   {
      function __construct() {
         parent::__construct();

         $this->load->model('mwebprofile');
      }

      public function index() {

         $webprofile = $this->mwebprofile->getAll();

         $this->load->view('administrator/head');
         $this->load->view('administrator/header');
         $this->load->view('administrator/sidebar', array(
            'activate' => "setting"
         ));
   		$this->load->view('administrator/setting/form-edit' , array(
            'webprofile' => $webprofile ,
            'title' => 'Setting' ,
            'urlaction' => site_url('admin/setting/update')
         ));
   		$this->load->view('administrator/footer');

      }

      public function update() {
         $title = $this->input->post('title');
         $desc = $this->input->post('desc');
         $about = $this->input->post('about');
         $contact = $this->input->post('contact');
         $twitter = $this->input->post('twitter');
         $facebook = $this->input->post('facebook');
         $line = $this->input->post('line');
         $path = $this->input->post('path');
         $instagram = $this->input->post('instagram');

         $result = $this->mwebprofile->update( array(
            'webTitle' => $title ,
            'webDesc' => $desc ,
            'webAbout' => $about ,
            'webContact' => $contact ,
            'webTwitter' => $twitter ,
            'webFacebook' => $facebook ,
            'webLine' => $line ,
            'webPath' => $path ,
            'webInstagram' => $instagram
         ));

         $data = array("type" => "modal-box");

         if ($result) {
            $data['message'] = "Data Berhasil Disimpan";
         } else {
            $data['message'] = "Data Gagal Disimpan";
            $data['success'] = false;
         }

         echo json_encode($data);
      }
   }

?>
