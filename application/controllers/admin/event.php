<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends MY_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('marticle');
		$this->load->model('msocialmedia');
		$this->load->model('mmaps');
		$this->load->model('meventtag');
	}

	public function index($page = 1) {
		$this->load->library('pagination');

		$category = $this->input->get('category');

		$limit = 10;
		$offset = ($page - 1) * $limit;

		if ($category) {
			$event = $this->marticle->getByCategory($category, $limit, $offset);
			$activate = $category;
			$config['suffix'] = '&category=' . $category;
			$config['total_rows'] = $this->marticle->countByCategory($category);
		} else {
			$event = $this->marticle->getAll($limit, $offset);
			$activate = '0';
			$config['total_rows'] = $this->marticle->countAll();
		}

		//pagination setup
		$config['base_url'] = site_url('admin/event') . "/";
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['use_global_url_suffix'] = FALSE;
		$config['query_string_segment'] = 'page';
		$config['reuse_query_string'] = TRUE;
		$config['uri_segment'] = 3;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();

		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar' , array(
			'activate' => 'event'
		));

		$this->load->view('administrator/event/body' , array(
			'activate' => $activate ,
			'urladd' => site_url('admin/event/add') ,
			'event' => $event ,
			'pagination' => $pagination
		));

	}

	public function add() {
		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar' , array(
			'activate' => "event"
		));
		$this->load->view('administrator/event/form', array(
			'title' => 'Input Data Event' ,
			'urlaction' => site_url('/admin/event/save') ,
			'urlsuccess' => site_url('/admin/event') ,
			'urlback' => site_url('/admin/event')
		));

	}

	public function save(){

		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$datestart = $this->input->post('datestart');
		$dateend = $this->input->post('dateend');
		$pict = $this->input->post('picture');
		$url = preg_replace("( |,|\\|\"|\'|\/)", '-', $title);
		$author = $this->userdata['id'];
		$ticket = $this->input->post('ticket');
		$barcode = "https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=" . $this->input->post('urlwebsite') . "&choe=UTF-8";
		$urlwebsite = $this->input->post('urlwebsite');
		$category = $this->input->post('category');
		$contact = $this->input->post('contact');
		$eventlocation = $this->input->post('eventloc');
		$datepost = date("Y-m-j");
		$metadesc = $this->input->post('metadesc');
		$status = ($this->input->post('status')) ? 1 : 0;
		$organizer = $this->input->post('organizer');

		// social media
		$twitter = $this->input->post('twitter');
		$facebook = $this->input->post('facebook');
		$line = $this->input->post('line');
		$path = $this->input->post('path');
		$instagram = $this->input->post('instagram');

		// maps
		$longitude = $this->input->post('lng');
		$latitude = $this->input->post('lat');
		$zoom = $this->input->post('mapzoom');

		//tag
		$eventtag = $this->input->post('eventtag');

		$url = $this->marticle->getAvailableUrl($url);

		$this->db->trans_begin();

		$result = $this->marticle->add( array(
			'arTitle' => $title ,
			'arContent' => $content ,
			'arDateStart' => $datestart ,
			'arDateEnd' => $dateend ,
			'arPict' => $pict ,
			'arURL' => $url ,
			'arAuthor' => $author ,
			'arEventLocation' => $eventlocation ,
			'arTicketPrice' => $ticket ,
			'arBarcode' => $barcode ,
			'arURLWebsite' => $urlwebsite ,
			'arCategory' => $category ,
			'arContact' => $contact ,
			'arDatePost' => $datepost ,
			'arStatus' => $status ,
			'arMetaDesc' => $metadesc ,
			'arOrganizer' => $organizer
		));

		if ($result) {
			$idarticle = $this->marticle->getId($url);
			$this->msocialmedia->add( array(
				'smTwitter' => $twitter ,
				'smFacebook' => $facebook ,
				'smLine' => $line ,
				'smPath' => $path ,
				'smInstagram' => $instagram ,
				'smArticleId' => $idarticle
			));

			$this->mmaps->add( array(
				'mapLongitude' => $longitude ,
				'mapLatitude' => $latitude ,
				'mapZoom' => $zoom ,
				'mapArticleId' => $idarticle
			));

			$tags = explode("," , $eventtag);

			foreach ($tags as $data) {
				if (!empty($data)) {
					$this->meventtag->add( array(
						'etName' => $data ,
						'etArticleId' => $idarticle
					));
				}
			}
		}

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

	public function edit($id) {
		$event = $this->marticle->getById($id);
		$sosmed = $this->msocialmedia->getByIdArticle($id);
		$map = $this->mmaps->getByIdArticle($id);
		$tag = $this->meventtag->getByIdArticle($id);
		$tags = array();
		foreach ($tag as $data) {
			array_push($tags, $data->etName);
		}

		$eventtag = implode(",", $tags);

		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar' , array(
			'activate' => "event"
		));

		$this->load->view('administrator/event/form-edit', array(
			'title' => 'Edit Data Event' ,
			'urlaction' => site_url('/admin/event/update') ,
			'urlsuccess' => site_url('/admin/event') ,
			'urlback' => site_url('/admin/event') ,
			'event' => $event ,
			'sosmed' => $sosmed ,
			'map' => $map ,
			'tag' => $eventtag
		));
	}

	public function update($idarticle) {
		$event = $this->marticle->getById($idarticle);

		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$datestart = $this->input->post('datestart');
		$dateend = $this->input->post('dateend');
		$pict = $this->input->post('picture');
		$url = preg_replace("( |\\|\"|\'|\/)", '-', $title);
		$author = $this->userdata['id'];
		$eventlocation = $this->input->post('eventloc');
		$ticket = $this->input->post('ticket');
		$barcode = "https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=" . $this->input->post('urlwebsite') . "&choe=UTF-8";
		$urlwebsite = $this->input->post('urlwebsite');
		$category = $this->input->post('category');
		$contact = $this->input->post('contact');
		$datepost = date("Y-m-j");
		$status = ($this->input->post('status')) ? 1 : 0;
		$metadesc = $this->input->post('metadesc');
		$organizer = $this->input->post('organizer');

		// social media
		$twitter = $this->input->post('twitter');
		$facebook = $this->input->post('facebook');
		$line = $this->input->post('line');
		$path = $this->input->post('path');
		$instagram = $this->input->post('instagram');

		// maps
		$longitude = $this->input->post('lng');
		$latitude = $this->input->post('lat');
		$zoom = $this->input->post('mapzoom');

		//event tag
		$eventtag = $this->input->post('eventtag');

		if ($url != $event->arURL) {
			$url = $this->marticle->getAvailableUrl($url);
		}

		$this->db->trans_begin();

		$result = $this->marticle->update($idarticle, array(
			'arTitle' => $title ,
			'arContent' => $content ,
			'arDateStart' => $datestart ,
			'arDateEnd' => $dateend ,
			'arPict' => $pict ,
			'arURL' => $url ,
			'arAuthor' => $author ,
			'arEventLocation' => $eventlocation ,
			'arTicketPrice' => $ticket ,
			'arBarcode' => $barcode ,
			'arURLWebsite' => $urlwebsite ,
			'arCategory' => $category ,
			'arContact' => $contact ,
			'arDatePost' => $datepost ,
			'arStatus' => $status ,
			'arOrganizer' => $organizer ,
			'arMetaDesc' => $metadesc
		));

		if ($result) {
			$this->msocialmedia->updateByIdArticle($idarticle, array(
				'smTwitter' => $twitter ,
				'smFacebook' => $facebook ,
				'smLine' => $line ,
				'smPath' => $path ,
				'smInstagram' => $instagram ,
				'smArticleId' => $idarticle
			));

			$this->mmaps->updateByIdArticle($idarticle, array(
				'mapLongitude' => $longitude ,
				'mapLatitude' => $latitude ,
				'mapZoom' => $zoom ,
				'mapArticleId' => $idarticle
			));

			$tags = explode("," , $eventtag);

			foreach ($tags as $data) {
				if (!empty($data)) {
					$exist = $this->meventtag->checkExist($data, $idarticle);
					if(!$exist){
						$this->meventtag->add( array(
							'etName' => $data ,
							'etArticleId' => $idarticle
						));
					}
				}
			}
		}

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

	public function delete($idarticle) {
		$this->marticle->delete($idarticle);
		$this->msocialmedia->deleteByIdArticle($idarticle);
		$this->mmaps->deleteByIdArticle($idarticle);
		$this->meventtag->deleteByIdArticle($idarticle);
		redirect('admin/event');
	}

	public function view($id) {
		$event = $this->marticle->getById($id);

		$this->load->view('administrator/head');
		$this->load->view('administrator/header');
		$this->load->view('administrator/sidebar' , array(
			'activate' => "event"
		));
		$this->load->view('administrator/event/view', array(
			'title' => 'View Event'
		));
	}
}
