<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Music extends CI_Controller{
   function __construct(){
      parent::__construct();

      $this->load->model('marticle');
      $this->load->model('mwebprofile');
   }

   public function index() {
      $year = date('Y');
      $month = date('m');
      $event = $this->marticle->getByYearMonthAndCategory($year, $month, 1);
      $webprofile = $this->mwebprofile->getAll();

      $this->load->view('head' ,array(
         'webtitle' => $webprofile->webTitle ,
         'webdesc' => $webprofile->webDesc
      ));
      $this->load->view('body-calender-open');
      $this->load->view('menu');
		$this->load->view('calender' , array(
         'urlaction' => site_url('music/showbydate') ,
         'urlview' => site_url('music') ,
         'event' => $event ,
         'month' => $month ,
         'year' => $year
      ));
      $this->load->view('footer-calender');
	}

   public function view($url) {
      $event = $this->marticle->getByURL($url);
      $relatedEvent = $this->marticle->getRelatedByTag($event->arId);
      $webprofile = $this->mwebprofile->getAll();

      $this->load->view('head' ,array(
         'webtitle' => $webprofile->webTitle ,
         'webdesc' => $webprofile->webDesc
      ));
      $this->load->view('body-calender-open');
      $this->load->view('menu');
      $this->load->view('article-container', array(
         'event' => $event ,
         'relatedEvent' => $relatedEvent
      ));
      $this->load->view('footer-calender');
	}

   public function show($url) {
      $event = $this->marticle->getByURL($url);
      $relatedEvent = $this->marticle->getRelatedByTag($event->arId);

      $dateStart = date_format(date_create_from_format("Y-m-j" , $event->arDateStart), 'd F Y');
      $dateEnd = date_format(date_create_from_format("Y-m-j" , $event->arDateEnd), 'd F Y');

      $this->load->view('article-container', array(
         'event' => $event ,
         'relatedEvent' => $relatedEvent
      ));
   }

   public function showbydate() {
      $year = $this->input->post('year');
      $month = $this->input->post('month');
      $event = $this->marticle->getByYearMonthAndCategory($year, $month, 1);

      $message = "";
      $urlview = site_url('music');

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
                              action='" . site_url('music/show/' . $data->arId) . "'
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
            $message .= "<img src='" . base_url('public/img/music5.jpg') . "'>";
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
