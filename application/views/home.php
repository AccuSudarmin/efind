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

         <?php $this->load->view('slider');?>


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

      p<footer>


        <center>Copyright (c) 2015 Copyright Holder All Rights Reserved.</center>
      </footer>
   </div>

      <script src="<?php echo base_url('public/js/home.js');?>"></script>

   </body>
</html>
