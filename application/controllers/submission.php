<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Submission extends CI_Controller {

      function __construct() {
         parent::__construct();

      }

      public function index() {
         $this->load->view('headsubmission');
         $this->load->view('submission', array(
            'urlaction' => site_url('submission/save') ,
            'urlsuccess' => site_url('submission/success')
         ));
      }

      public function save() {
         $this->load->library('upload');
         $this->load->model('msubmission');

         $title = $this->input->post('title');
   		$content = $this->input->post('content');
   		$category = $this->input->post('category');
   		$organizer = $this->input->post('organizer');
   		$datestart = $this->input->post('datestart');
   		$dateend = $this->input->post('dateend');
   		$contact = $this->input->post('contact');
   		$eventlocation = $this->input->post('eventloc');
   		$ticket = nl2br($this->input->post('ticket'));
   		$urlwebsite = $this->input->post('urlwebsite');
         $contactadmin = $this->input->post('contactadmin');
   		$datepost = date("Y-m-j");

   		// social media
   		$twitter = $this->input->post('twitter');
   		$facebook = $this->input->post('facebook');
   		$line = $this->input->post('line');
   		$path = $this->input->post('path');
   		$instagram = $this->input->post('instagram');

   		$this->db->trans_begin();

         if (!empty($_FILES['picture']['name'])) {
            $config = array();

            $config['upload_path'] = './public/userfiles/image';
            $config['allowed_types'] = 'jpg|png|JPG|PNG|jpeg|gif';

            $this->upload->initialize($config);
            if($this->upload->do_upload('picture')){
               $uploadresult = $this->upload->data();
               $pict = $uploadresult['file_name'];
            }
         }

         $result = $this->msubmission->add( array(
   			'seTitle' => $title ,
   			'seContent' => $content ,
   			'seDateStart' => $datestart ,
   			'seDateEnd' => $dateend ,
   			'sePict' => $pict ,
   			'seOrganizer' => $organizer ,
   			'seTicketPrice' => $ticket ,
   			'seWebURL' => $urlwebsite ,
   			'seCategory' => $category ,
   			'seContact' => $contact ,
   			'seEventLocation' => $eventlocation ,
   			'seAdminContact' => $contactadmin ,
   			'seTwitter' => $twitter ,
   			'seFacebook' => $facebook ,
   			'seLine' => $line ,
   			'sePath' => $path ,
            'seInstagram' => $instagram
   		));

         $callback = array("type" => "modal-box");

   		if ( !$this->db->trans_status() ) {
            $this->db->trans_rollback();
            $callback['message'] = "Data gagal disimpan";
            $callback['success'] = false;
         } else {
            $this->db->trans_commit();
            $callback['message'] = "Data berhasil disimpan";
            $callback['delayURL'] = 500;
         }

   		echo json_encode($callback);
      }

      public function success(){
         $this->load->view('headsubmission');
         $this->load->view('submission-success');
      }
   }
?>
