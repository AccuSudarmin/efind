<!DOCTYPE html>
<html>
   <head>
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
      <!-- <meta name="theme-color" content="#ffffff"> -->

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Event Finder Mockup</title>
      <link rel="stylesheet" href="<?php echo base_url('public/stylesheets/screen.css');?>" media="screen, projection" title="no title" charset="utf-8">
      <link rel="stylesheet" href="<?php echo base_url('public/stylesheets/print.css');?>" media="print" title="no title" charset="utf-8">
      <link rel="stylesheet" href="<?php echo base_url('public/stylesheets/ie.css');?>" media="screen" title="no title" charset="utf-8">
      <link rel="stylesheet" href="<?php echo base_url('public/css/font-awesome.css');?>" media="screen" title="no title" charset="utf-8">
      <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>

   </head>
   <body id="home">

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


      <div class="floatok body-wrapper">
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

      <button class="menu-toggle">
         <i class="fa fa-bars"></i>
      </button>

      <section class="slide-wrapper">
         <?php $this->load->view('slider');?>
      </section>

      <section class="bodywrapper">
         <div class="tagline"><center><h1> Find your favorite event to be spent this week </h1></center></div>
        <nav class="main-menu">
              <div class="main-menu-wrapper">
                 <a href="#">
                 <div class="inner-ninja">
                 <div class="div-img-bg" style="background-image:url(<?php echo base_url('public/img/menu1.jpg');?>);"></div></div>

                 <article>
                <h1> Music Event</h1>
                <p> "There is no such thing as going to too many concerts".
                Find out where's your favorite bands next concert.</p></article>
             </a>

              </div>

              <div class="main-menu-wrapper">
                 <a href="#">
                 <div class="inner-ninja">
                 <div class="div-img-bg" style="background-image:url(<?php echo base_url('public/img/eksebisi.jpg');?>);"></div></div>

                 <article>
                <h1> Exhibitions Event</h1>
                <p> Discover the best art or product exhibition for the upcoming week (or month)</p></article></a>

              </div>

              <div class="main-menu-wrapper">
                 <a href="#">
                 <div class="inner-ninja">
                 <div class="div-img-bg" style="background-image:url(<?php echo base_url('public/img/bola.jpg');?>);"></div></div>

                 <article>
                <h1> Sport Events </h1>
                <p> Football, Basketball, Badminton, Drag Race, Marathon, Triathlon, you name it! You'll never miss the  big game anymore!</p></article></a>

              </div>


        </nav>
      </section>
      <footer>
        <!-- <div class="footer-container main-width">
          <div class="footer-list rights">
            <h3> Judul </h3>
            <ul>
              <li> <a href="#"> Home </a> </li>
              <li> Profil</li>
              <li><a href="#">Penjaminan Mutu</a></li>
              <li><a href="#"> Layanan </a></li>
              <li><a href="#"> Fasilitas </a></li>
              <li><a href="#"> Regulasi </a></li>
              <li><a href="#"> Download </a></li>
              <li><a href="#"> Forum </a></li>
              <li><a href="#"> Kontak Kami </a></li>
            </ul>
          </div>

          <div class="footer-list contact rights">
            <h3> CONTACT US </h3>
            <ul>
              <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </li>

            </ul>
          </div>

          <div class="footer-social">
             <ul>
                <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                <li> <i class="fa fa-facebook"></i></li>
                <li> <i class="fa fa-youtube"></i></li>
             </ul>
          </div>

        </div> -->

        <center>Copyright (c) 2015 Copyright Holder All Rights Reserved.</center>
      </footer>
   </div>

      <script src="<?php echo base_url('public/js/home.js');?>"></script>
<!-- 
      </script>

      </script> -->
   </body>
</html>
