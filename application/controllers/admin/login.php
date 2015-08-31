<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('madmin');

		if ($this->session->has_userdata('admin_eventfinder')) header("LOCATION: " . base_url('index.php/admin'));
	}

	public function index() {
		$this->load->view('administrator/login');
	}

	public function doLogin() {
		$name = $this->input->post('name');
		$pass = $this->input->post('pass');

		$data = $this->madmin->getByName($name);

		if ($data) {
			if ($data[0]['amPassword'] === $pass) {
				$this->session->set_userdata('admin_eventfinder' , array(
					'id' => $data[0]['amId'] ,
					'name' => $data[0]['amName'],
					'password' => $data[0]['amPassword']
				));

				$result = array (
	            "message" => "Berhasil Login" ,
	            "type" => "modal-box" ,
	            "delayURL" => 3000 ,
	         );

			} else {
				$result = array (
	            "message" => "Gagal Login" ,
	            "type" => "modal-box" ,
	            "success" => false
	         );
			}
		} else {
			$result = array (
				"message" => "Gagal Login" ,
				"type" => "modal-box" ,
				"success" => false
			);
		}

		echo json_encode($result);
	}

	public function dologout() {
		$this->session->unset_userdata('admin_eventfinder');
	}
}
?>
