<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller {

	function __construct() {
		parent::__construct();

	}

	private function getAll() {
		$result = array();

		if ($handle = opendir(ABSOLUTE_PATH_GALLERY)) {

			while (false !== ($entry = readdir($handle))) {
				$ext = pathinfo($entry, PATHINFO_EXTENSION);
				if ($ext == 'jpg' || $ext == 'png' || $ext == "gif" || $ext == "jpeg") {

					$data = new stdClass();
					$data->name = $entry;

					array_push($result, $data);
				}
			}

			closedir($handle);
		}

		return $result;
	}

	public function index() {
		$gallery = $this->getAll();

		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar', array(
			'activate' => "gallery"
		));

		$this->load->view('administrator/gallery/body', array(
			'urladd' => site_url('admin/gallery/add') ,
			'urltarget' => site_url('admin/gallery/delete') ,
			'urlsuccess' => site_url('admin/gallery') ,
			'gallery' => $gallery
		));

		$this->load->view('administrator/footer');

	}

	public function add() {

		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar' , array(
			'activate' => "gallery"
		));
		$this->load->view('administrator/gallery/form', array(
			'title' => 'Input Data Gallery' ,
			'urlaction' => site_url('/admin/gallery/save') ,
			'urlsuccess' => site_url('/admin/gallery') ,
			'urlback' => site_url('/admin/gallery')
		));

	}

	public function save() {
		$this->load->library('upload');
		$result = true;

      if (!empty($_FILES['filesurat']['name'])) {
         $files = $_FILES;
         $config = array();
         $i= 0;

         foreach ($_FILES['filesurat']['name'] as $name) {
            $config['upload_path'] = './public/userfiles/image/';
            $config['allowed_types'] = 'gif|jpg|png';

            $_FILES['filesurat']['name']= $files['filesurat']['name'][$i];
            $_FILES['filesurat']['type']= $files['filesurat']['type'][$i];
            $_FILES['filesurat']['tmp_name']= $files['filesurat']['tmp_name'][$i];
            $_FILES['filesurat']['error']= $files['filesurat']['error'][$i];
            $_FILES['filesurat']['size']= $files['filesurat']['size'][$i];

            $this->upload->initialize($config);

				if (!$this->upload->do_upload('filesurat')) {
					$result = false;
				}

            $i++;
         }
      }

      $data = array('type' => 'modal-box');

      if (!$result ) {
         $data['message'] = "Data gagal disimpan";
         $data['success'] = false;
      } else {
         $data['message'] = "Data berhasil disimpan";
         $data['delayURL'] = 1000;
      }

      echo json_encode($data);
	}

	public function delete(){
		$result = true;

		foreach($_POST as $key => $val){
			$file = explode('_', $key);
			$ext = end($file);

			array_pop($file);

			$file = implode('_', $file);
			$loc = realpath(ABSOLUTE_PATH_GALLERY . "/" . $file . "." . $ext);
			if (!empty($loc)) {
				if(!unlink($loc)) $result = false;
			}
		}

		$data = array('type' => 'modal-box');
		if (!$result ) {
         $data['message'] = "Data gagal dihapus";
         $data['success'] = false;
      } else {
         $data['message'] = "Data berhasil dihapus";
         $data['delayURL'] = 1000;
      }

      echo json_encode($data);
	}
}
