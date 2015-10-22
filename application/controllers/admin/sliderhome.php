<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sliderhome extends MY_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('msliderhome');
	}

	public function index() {
		$sliderhome = $this->msliderhome->getAll();

		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar', array(
			'activate' => "sliderhome"
		));

		$this->load->view('administrator/sliderhome/body' , array (
         'pagetitle' => "Slider" ,
         'urlsorting' => site_url('admin/sliderhome/sorting') ,
			'urladd' => site_url('admin/sliderhome/add') ,
			'urlaction' => site_url('admin/sliderhome/delete') ,
			'urlsuccess' => site_url('admin/sliderhome') ,
			'slider' => $sliderhome
      ));

		$this->load->view('administrator/footer');
	}

	public function add() {
		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar' , array(
			'activate' => "slider"
		));
		$this->load->view('administrator/slider/form', array(
			'title' => 'Input Data Slider' ,
			'subtitle' => 'Content Management' ,
			'urlaction' => site_url('admin/slider/save') ,
			'urlsuccess' => site_url('admin/slider') ,
			'urlback' => site_url('admin/slider')
		));
		$this->load->view('administrator/footer');
	}

	public function save(){
		$order = $this->msliderhome->getCurrentOrder();
		$title = $this->input->post('title');
		$picture = $this->input->post('picture');

		$this->db->trans_begin();

		$result = $this->msliderhome->add( array(
			'slTitle' => $title ,
			'slPict' => $picture ,
			'slOrder' => $order
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
			$query = $this->msliderhome->delete($key);
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
		$sliderhome = $this->msliderhome->getAll();

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
			'slider' => $sliderhome
      ));

		$this->load->view('administrator/footer');
	}

	public function sortingupdate() {
		$dataOBJ = json_decode($this->input->post('orderingValue'));

		$this->db->trans_start();
      foreach ($dataOBJ as $sliderhome) {
         $result = $this->msliderhome->update($sliderhome->id, array(
            'slOrder' => $sliderhome->orderNum
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
