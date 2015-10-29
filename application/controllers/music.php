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

      $callback = array("type" => "dialog-box");
		$message = '
         <div class="article-container">
            <div class="flex-img">
               <img src=' . base_url('public/img/bola.jpg') . '>
            </div>
            <div class="fill-article main-width">
               <article>
                  <h1> ' . $event->arTitle . ' </h1>
                  <img src=' . $event->arPict . '>
                  ' . $event->arContent;

      $message .= "
                  <div class='related-search'>
                     <h2> RELATED POSTS </h2> ";

      foreach ($relatedEvent as $datarelated){

         $message .= "
                  <div class='related-box'>
                     <h5> <a href='" . site_url('/' . strtolower($datarelated->catName) . '/' . $datarelated->arURL) . "' target='_blank'> " . $datarelated->arTitle . "</a> </h5>
                     ";

         if (!empty($datarelated->arPict)) $message .= "<img src='" . $datarelated->arPict . "'>";

         $message .= "</div>";
      }

      $message .=  "</div>";

      $message .= '
               </article>
               <aside>
                  <ul>
                     <li> From <i class="tanggal"> ' . $dateStart . ' </i> to <i class="tanggal">' . $dateEnd . '</i> </li>
                     <li> <i class="fa fa-map-marker"></i>' . $event->arEventLocation . '</li>
      ';

      if (!empty($event->mapLongitude) && !empty($event->mapLatitude)) {
         $message .= "<li><div id='map' is='map-component' mapLat='" . $event->mapLatitude;
         $message .= "' mapLng='" . $event->mapLongitude . "' mapZoom = '" . $event->mapZoom . "'></div></li>";
      }

      $message .= '
                     <li> <strong> Ticket Price : Free </strong> </li>
                     <li> Contact : <br>
                        ' . $event->arContact . '
                     </li>
                     <li>
                        Twitter : <a href="#"> ' . $event->smTwitter . ' </a> <br>
                        Facebook : <a href="#"> ' . $event->smFacebook . ' </a> <br>
                        Line : <a href="#"> ' . $event->smLine . ' </a> <br>
                        Instagram : <a href="#"> ' . $event->smInstagram . ' </a> <br>
                        Path : <a href="#"> ' . $event->smPath . ' </a>
                     </li>
                     <li class="barcode">
                        <img src="' . $event->arBarcode . '" title="' . $event->arURLWebsite . '">
                        <p> scan me </p>
                     </li>
                  </ul>
               </aside>
            </div>
         </div>
      ';

      $callback['message'] = $message;
      echo json_encode($callback);
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
