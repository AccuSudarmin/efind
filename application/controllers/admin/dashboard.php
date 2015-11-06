<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!$this->session->has_userdata('admin_eventfinder')) {
         header("LOCATION: " . site_url('admin/login'));
      } else {
         $userdata = $this->session->userdata('admin_eventfinder');
      }

		$this->load->model('mvisitor');
	}

	private function visitorGraph($today = null, $tillDay = null){
		$visitor = $this->mvisitor->getByDate($today, $tillDay);
		$result = array();
		$time = time();

		$maxHeight = 0;
		foreach ($visitor as $value) {
			if ($value->vtTotal > $maxHeight) $maxHeight = $value->vtTotal;
		}

		$tod = new DateTime($today);
		$todTime =  strtotime($tod->format( 'j F Y' ));

		$tilld = new DateTime($tillDay);
		$tilldTime =  strtotime($tilld->format( 'j F Y' ));

		$max = ($tilldTime - $todTime) / 86400;

		if (strtotime(date('j F Y')) >= $todTime && strtotime(date('j F Y')) <= $tilldTime) {
			$visitorToday = $this->mvisitor->getByDate(date('Y-m-d'));
			if ($visitorToday) {
				if ($visitorToday->total > $maxHeight) $maxHeight = $visitorToday->total;
			}
		}

		for ($i=0; $i <= $max; $i++) {
			$std = new stdClass();

			$std->barHeight = '0';
			$std->value =  '0';
			$std->day = $tod->format( 'D' );
			$std->id = 'bar'.$i;

			$dateSelect = $tod->format('Y-m-d');

			if ($dateSelect == date('Y-m-d')) {
				$std->barHeight = isset($visitorToday) ? (($visitorToday->total / $maxHeight) * 100) : '0';
				$std->value = isset($visitorToday) ? $visitorToday->total : '0';
			} else {
				foreach ($visitor as $data) {
					if ($dateSelect == $data->vtDate) {
						$std->barHeight = ($data->vtTotal / $maxHeight) * 100;
						$std->value = $data->vtTotal;
					}
				}
			}
			$result[] = $std;
			$tod->modify('next day');
		}

		return $result;
	}

	public function index() {
		$this->mvisitor->joiningAll();

		$dayEnd = date('Y-m-d');

		$dateTime = new DateTime($dayEnd);
		$dateTime->modify('-8 day');
		$dayStart = $dateTime->format( 'Y-m-d' );

		$visitor = $this->visitorGraph($dayStart, $dayEnd);

		$dateStart = $dateTime->format( 'd M Y' );
		$dateTime->modify('+8 day');
		$dateEnd = $dateTime->format( 'd M Y' );

		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar', array(
			'activate' => "dashboard"
		));
		$this->load->view('administrator/statistic', array(
			'visitor' => $visitor ,
			'dateStart' => $dateStart ,
			'dateEnd' => $dateEnd
		));
		$this->load->view('administrator/footer');

	}

	public function requestGraph() {

	}
}
