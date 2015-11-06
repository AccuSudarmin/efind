<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exhibition extends CI_Controller{
   function __construct(){
      parent::__construct();

      $this->load->model('marticle');
      $this->load->model('mwebprofile');
      $this->load->model('mvisitor');
      $this->load->model('mhit');
   }

   public function index() {
      $year = date('Y');
      $month = date('m');
      $event = $this->marticle->getByYearMonthAndCategory($year, $month, 2);
      $webprofile = $this->mwebprofile->getAll();

      $this->load->view('head' ,array(
         'webtitle' => $webprofile->webTitle ,
         'webdesc' => $webprofile->webDesc
      ));

      $this->load->view('body-calender-open');
      $this->load->view('menu' , array(
         'webprofile' => $webprofile
      ));
		$this->load->view('calender' , array(
         'urlaction' => site_url('exhibition/showbydate') ,
         'urlview' => site_url('exhibition') ,
         'urlshow' => site_url('exhibition/show') ,
         'event' => $event ,
         'month' => $month ,
         'year' => $year
      ));

      $this->load->view('footer-calender');
      $visitor = $this->mvisitor->increaseVisitorToday();
	}

   public function view($url) {
      $event = $this->marticle->getByURL($url);
      $relatedEvent = $this->marticle->getRelatedByTag($event->arId);
      $webprofile = $this->mwebprofile->getAll();

      $this->load->view('head-event-view' ,array(
         'webtitle' => $event->arTitle ,
         'webdesc' => $event->arMetaDesc,
         'metaURL' => site_url('exhibition/' . $event->arURL) ,
         'metaDesc' => $event->arMetaDesc ,
         'metaImage' => $event->arPict
      ));

      $this->load->view('body-calender-open');
      $this->load->view('menu' , array(
         'webprofile' => $webprofile
      ));
      $this->load->view('article-container', array(
         'event' => $event ,
         'relatedEvent' => $relatedEvent
      ));

      $this->load->view('footer-calender');

      $visitor = $this->mvisitor->increaseVisitorToday();

      $date = date('Y-m-d');
      $this->mhit->increaseHit($date, $event->arId);
	}

   public function show($url) {
      $event = $this->marticle->getByURL($url);
      $relatedEvent = $this->marticle->getRelatedByTag($event->arId);

      $dateStart = date_format(date_create_from_format("Y-m-j" , $event->arDateStart), 'd F Y');
      $dateEnd = date_format(date_create_from_format("Y-m-j" , $event->arDateEnd), 'd F Y');

      $date = date('Y-m-d');
      $this->mhit->increaseHit($date, $event->arId);

      $this->load->view('article-container', array(
         'event' => $event ,
         'relatedEvent' => $relatedEvent
      ));
   }

   public function showbydate() {
      $year = $this->input->post('year');
      $month = $this->input->post('month');
      $event = $this->marticle->getByYearMonthAndCategory($year, $month, 2);

      $message = "";
      $urlview = site_url('exhibition');

      $i = 1;

      foreach ($event as $key => $value){
         $date = date_create_from_format('Y-m-d' , $year . '-' . $month . '-' .$key);

         if ($i == 1) {
            $message .= "<li class='main-calendar'> <ul>";
         }

         $message .= " <li> <div class='isi-calender'>";
         $day = date_format($date, 'l');

         if ($day == 'Saturday' || $day == 'Sunday') $message .= "<div class='calender-date tanggal-merah'> " . $key . " | " . $day . "</div>";
         else $message .= "<div class='calender-date'> " . $key . " | " . $day . "</div>";

         $message .= "<article> <ul>";

         foreach ($value as $data) {

            $message .= "  <ol>
                           <a is='az-anchorajax'
                              href = '" . $urlview . "/" . $data->arURL . "'
                              action='" . site_url('exhibition/show/' . $data->arURL) . "'
                              method='click'
                           > " . $data->arTitle . " </a>
                        </ol>
                     ";
         }

         $message .= " </ul> </article> </div> ";

         if (count($value) > 0) {
            foreach ($value as $data) {
               if (!empty($data->arPict)) {
                  $message .= "<img src='" . $data->arPict . "'>";
               }
            }
         }  else {
            $message .= "<img src='" . base_url('public/img/no-content/' . $i . '.jpg') . "'>";
         }

         $message .= "</li>";

         if ($i >= 4){
            $i=0;
            $message .= "</ul> </li>";
         }

         $i++;
      }

      $callback = array("type" => "own-div-clear");
		$callback['message'] = $message;
      $callback['targetDiv'] = 'list-event';

      echo json_encode($callback);
   }
}
