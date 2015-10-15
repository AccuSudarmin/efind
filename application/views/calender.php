<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Calendar Mockup</title>
      <link rel="stylesheet" href="<?php echo base_url('public/stylesheets/screen.css');?>" media="screen, projection" title="no title" charset="utf-8">
      <link rel="stylesheet" href="<?php echo base_url('public/stylesheets/print.css');?>" media="print" title="no title" charset="utf-8">
      <link rel="stylesheet" href="<?php echo base_url('public/stylesheets/ie.css');?>" media="screen" title="no title" charset="utf-8">
      <link rel="stylesheet" href="<?php echo base_url('public/css/font-awesome.css');?>" media="screen" title="no title" charset="utf-8">
      <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>

      <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('public/favico/apple-icon-57x57.png');?>">
      <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('public/favico/apple-icon-60x60.png');?>">
      <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('public/favico/apple-icon-72x72.png');?>">
      <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('public/favico/apple-icon-76x76.png');?>">
      <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('public/favico/apple-icon-114x114.png');?>">
      <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('public/favico/apple-icon-120x120.png');?>">
      <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('public/favico/apple-icon-144x144.png');?>">
      <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('public/favico/apple-icon-152x152.png');?>">
      <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('public/favico/apple-icon-180x180.png');?>">
      <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('public/favico/android-icon-192x192.png');?>">
      <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('public/favico/favicon-32x32.png');?>">
      <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('public/favico/favicon-96x96.png');?>">
      <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('public/favico/favicon-16x16.png');?>">
      <link rel="manifest" href="<?php echo base_url('public/favico/manifest.json');?>">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">

   </head>
   <body id="calendar">

      <nav id="mobile-menu" class="floatok">
         <div class="icon-close"> <i class="fa fa-times"> </i></div>
          <ul>
            <li><a href="http://eventfinder.co.id"><img src="<?php echo base_url('public/img/long-logo.png');?>"></a></li>
            <li><a href="#"><i class="fa fa-home"> </i> Home  </a> </li>
            <li><a href="#"><i class="fa fa-music"> </i> Music Events  </a> </li>
            <li><a href="#"><i class="fa fa-paint-brush"> </i> Exhibition Events  </a> </li>
            <li><a href="#"><i class="fa fa-futbol-o"> </i> Sport Events</a> </li>
            <li class="mobile-sc"> <i class="fa fa-search rights mobile-search"> </i><div class='searchbar rights mobile-search'><input type="text"> </div>
            </li>
            <li class="social-icon"> <a href="#"><i class="fa fa-youtube"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-facebook"></i></a></li>
         </ul>
      </nav>


      <div class="straight-menu">
         <header class="navigation main-width">
            <div class="logo rights"> <img src="<?php echo base_url('public/img/long-logo.png');?>"> </div>
            <nav class="rights">
               <div class="ul-wrapper">
                  <ul class="left-ul rights">
                     <li><a href="#"> Home </a> </li>
                     <li><a href="<?php echo site_url('calender');?>">Sub Menu 12 </a> </li>
                     <li><a href="#">Sub Menu 23 </a> </li>
                     <li><a href="#">Sub Menu 3</a> </li>
                  </ul>

                  <ul class="right-ul">
                     <li> <a href="#"><i class="fa fa-search"> </i></a><div class='searchbar'><input type="text"> </div>
                     </li>

                     <li> <i class="fa fa-twitter"></i></li>
                     <li> <i class="fa fa-facebook"></i></li>
                     <li> <i class="fa fa-youtube"></i></li>

                  </ul>
               </div>
            </nav>
         </header>
      </div>

      <button class="menu-mobile menu-toggle">

         <i class="fa fa-bars"></i>
      </button>

      <div class="calendar-container">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
         <script src="<?php echo base_url('public/js/calendar.js');?>"></script>

         <h2> January 2015 </h2> <button><i class="fa fa-search"> </i></button>
         <ul class="calendar-ul">
            <!-- <li class="thearrow"><a href="#" class="arrow-prev"><i class="fa fa-angle-left"></i></a></li> -->
            <li class="main-calendar">
                 <ul>
                 <li class="selected"><div class="isi-calender">
                      <div class="calender-date"> 01 | Mon </div> <article> <ul> <ol><a href="#"> Lorem </a> </ol> <ol> Ipsum </ol> </ul> </article> </div>
                    <img src="<?php echo base_url('public/img/music1.jpg');?>">
                    <img src="<?php echo base_url('public/img/music5.jpg');?>">
                 </li>
                 <li><div class="isi-calender">
                      <div class="calender-date"> 01 | Monday </div> <article> <ul> <ol><a href="#"> Lorem </a> </ol> <ol> Ipsum </ol> </ul> </article> </div><img src="<?php echo base_url('public/img/music5.jpg');?>"></li>
                 <li><div class="isi-calender">
                      <div class="calender-date"> 01 | Monday </div> <article> <ul> <ol><a href="#"> Lorem </a> </ol> <ol> Ipsum </ol> </ul> </article> </div><img src="<?php echo base_url('public/img/3.jpg');?>"></li>
                 <li><div class="isi-calender">
                      <div class="calender-date"> 01 | Monday </div> <article> <ul> <ol><a href="#"> Lorem </a> </ol> <ol> Ipsum </ol> </ul> </article> </div><img src="<?php echo base_url('public/img/music4.jpg');?>"></li>
                </ul>
             </li>
           <li class="main-calendar activated">
                <ul>
                <li class="selected"><div class="isi-calender">
                     <div class="calender-date"> 01 | Mon </div> <article> <ul> <ol><a href="#"> Lorem </a> </ol> <ol> Ipsum </ol> </ul> </article> </div>
                   <img src="<?php echo base_url('public/img/music1.jpg');?>">
                   <img src="<?php echo base_url('public/img/music5.jpg');?>">
                </li>
                <li><div class="isi-calender">
                     <div class="calender-date"> 01 | Monday </div> <article> <ul> <ol><a href="#"> Lorem </a> </ol> <ol> Ipsum </ol> </ul> </article> </div><img src="<?php echo base_url('public/img/music5.jpg');?>"></li>
                <li><div class="isi-calender">
                     <div class="calender-date"> 01 | Monday </div> <article> <ul> <ol><a href="#"> Lorem </a> </ol> <ol> Ipsum </ol> </ul> </article> </div><img src="<?php echo base_url('public/img/3.jpg');?>"></li>
                <li><div class="isi-calender">
                     <div class="calender-date"> 01 | Monday </div> <article> <ul> <ol><a href="#"> Lorem </a> </ol> <ol> Ipsum </ol> </ul> </article> </div><img src="<?php echo base_url('public/img/music4.jpg');?>"></li>
               </ul>
            </li>
            <li class="main-calendar">
                 <ul>
                 <li class="selected"><div class="isi-calender">
                      <div class="calender-date"> 01 | Mon </div> <article> <ul> <ol><a href="#"> Lorem </a> </ol> <ol> Ipsum </ol> </ul> </article> </div>
                    <img src="<?php echo base_url('public/img/music1.jpg');?>">
                    <img src="<?php echo base_url('public/img/music5.jpg');?>">
                 </li>
                 <li><div class="isi-calender">
                      <div class="calender-date"> 01 | Monday </div> <article> <ul> <ol><a href="#"> Lorem </a> </ol> <ol> Ipsum </ol> </ul> </article> </div><img src="<?php echo base_url('public/img/music5.jpg');?>"></li>
                 <li><div class="isi-calender">
                      <div class="calender-date"> 01 | Monday </div> <article> <ul> <ol><a href="#"> Lorem </a> </ol> <ol> Ipsum </ol> </ul> </article> </div><img src="<?php echo base_url('public/img/3.jpg');?>"></li>
                 <li><div class="isi-calender">
                      <div class="calender-date"> 01 | Monday </div> <article> <ul> <ol><a href="#"> Lorem </a> </ol> <ol> Ipsum </ol> </ul> </article> </div><img src="<?php echo base_url('public/img/music4.jpg');?>"></li>
                </ul>
             </li>

           <!-- <li class="thearrow rights" style="right:0;"> <a href="#" class="arrow-next"><i class="fa fa-angle-right"></i></a></li> -->
         </ul>

         <button class="left"> <i class="fa fa-chevron-circle-down"></i></button>
      </div>

      <div class="article-container">
         <div class="flex-img">
            <img src="<?php echo base_url('public/img/bola.jpg');?>">
         </div>
         <div class="fill-article main-width">
            <article>
               <h1> Lorem ipsum dolor sit amet, consectetur adipisicing elit. </h1>
               <img src="<?php echo base_url('public/img/bola.jpg');?>">
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
                     <img src="<?php echo base_url('public/img/barcode.jpg');?>">
                     <p> scan me </p>
                  </li>
               </ul>
            </aside>
         </div>
      </div>

      <script src="<?php echo base_url('public/js/home.js');?>"></script>
      
   </body>
</html>
