<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Music extends CI_Controller{
   function __construct(){
      parent::__construct();

      $this->load->model('marticle');
   }

   public function index() {
      $year = date('Y');
      $month = date('m');
      $event = $this->marticle->getByYearMonthAndCategory($year, $month, 1);

      $this->load->view('head');
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
      $this->load->view('head');
      $this->load->view('body-calender-open');
      $this->load->view('menu');
      $this->load->view('article-container');
      $this->load->view('footer-calender');
	}

   public function show($link) {
      $callback = array("type" => "dialog-box");
		$callback['message'] = '
      <div class="article-container">
         <div class="flex-img">
            <img src=' . base_url('public/img/bola.jpg') . '>
         </div>
         <div class="fill-article main-width">
            <article>
               <h1> Lorem ipsum dolor sit amet, consectetur adipisicing elit. </h1>
               <img src=' . base_url('public/img/bola.jpg') . '>
               <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </article>
            <aside>
               <ul>
                  <li> From <i class="tanggal">28th September</i> to <i class="tanggal">29th September</i> </li>
                  <li> <i class="fa fa-map-marker"></i> Gedung Mulo, Makassar  </li>
                  <li> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.7372693224784!2d119.41570290000003!3d-5.145934599999989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf1d545293438d%3A0x8212955e6febb04!2sGedung+Mulo!5e0!3m2!1sen!2sid!4v1442471800245" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> </i> </li>
                  <li> <strong> Ticket Price : Free </strong> </li>
                  <li> Contact : <br>
                     Siamang <br>
                     Jl. Sianu Siapa </br>
                     Makassar
                  </li>
                  <li> Twitter : <a href="#"> @sianu </a> <br>
                       Facebook : <a href="#"> Sianu </a> <br>
                       Line : <a href="#"> @sianu </a> <br>
                  </li>
                  <li class="barcode">
                     <img src=' . base_url('public/img/barcode.jpg') . '>
                     <p> scan me </p>
                  </li>
               </ul>
            </aside>
         </div>
      </div>


      ';

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
