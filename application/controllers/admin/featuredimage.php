<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Featuredimage extends MY_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('mfeaturedimage');
	}

	public function index() {
		$featuredimage = $this->mfeaturedimage->getAll();

		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar', array(
			'activate' => "featuredimage"
		));

		$this->load->view('administrator/featuredimage/body' , array (
         'pagetitle' => "Slider Home" ,
         'urlsorting' => site_url('admin/featuredimage/sorting') ,
			'urledit' => site_url('admin/featuredimage/edit') ,
			'urlaction' => site_url('admin/featuredimage/delete') ,
			'urlsuccess' => site_url('admin/featuredimage') ,
			'featuredimage' => $featuredimage
      ));

		$this->load->view('administrator/footer');
	}

	public function edit($id) {
		$featuredimage = $this->mfeaturedimage->getById($id);

		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar' , array(
			'activate' => "featuredimage"
		));
		$this->load->view('administrator/featuredimage/form-edit', array(
			'title' => 'Edit Slider Home' ,
			'urlaction' => site_url('admin/featuredimage/update') ,
			'urlsuccess' => site_url('admin/featuredimage') ,
			'urlback' => site_url('admin/featuredimage') ,
			'featuredimage' => $featuredimage
		));
		$this->load->view('administrator/footer');
	}

	public function update($id){
		$title = $this->input->post('title');
		$picture = $this->input->post('picture');
		$desc = $this->input->post('desc');

		$this->db->trans_begin();

		$result = $this->mfeaturedimage->update($id, array(
			'shTitle' => $title ,
			'shPict' => $picture ,
			'shDesc' => $desc
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

	public function delete(){
		$result = true;

		foreach($_POST as $key => $val){
			$query = $this->mfeaturedimage->delete($key);
			if (!$query) $result = false;
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

   public function sorting() {
		$featuredimage = $this->mfeaturedimage->getAll();

		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar', array(
			'activate' => "slider"
		));

		$this->load->view('administrator/slider/body-sorting' , array (
         'pagetitle' => "Slider" ,
         'urltarget' => site_url('admin/slider/sortingupdate') ,
         'urlsuccess' => site_url('admin/slider') ,
			'urlback' => site_url('admin/slider') ,
			'slider' => $featuredimage
      ));

		$this->load->view('administrator/footer');
	}

	public function sortingupdate() {
		$dataOBJ = json_decode($this->input->post('orderingValue'));

		$this->db->trans_start();
      foreach ($dataOBJ as $featuredimage) {
         $result = $this->mfeaturedimage->update($featuredimage->id, array(
            'slOrder' => $featuredimage->orderNum
         ));
      }
		$this->db->trans_complete();

      $data = array('type' => 'modal-box');

      if ($this->db->trans_status()) {
			$this->db->trans_commit();
         $data['message'] = 'Data berhasil disimpan';
         $data['delayURL'] = 500;
      } else {
			$this->db->trans_rollback();
         $data['message'] = 'Data gagal disimpan';
         $data['success'] = false;
      }

      echo json_encode($data);

	}
}
