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
		$this->load->view('calender');
      // $this->load->view('article-container');
      $this->load->view('footer-calender');
	}

   public function coba() {
      $this->load->view('head');
      $this->load->view('body-calender-open');
      $this->load->view('menu');
      $this->load->view('article-container');
      $this->load->view('footer-calender');
	}

   public function view($link) {
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
}
