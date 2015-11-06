   <body id="home">

      <nav id="mobile-menu" class="floatok">
         <div class="icon-close"> <i class="fa fa-times"> </i></div>
          <ul>
            <li><a href="http://eventfinder.co.id"><img src="<?php echo base_url('public/img/long-logo.png');?>"></a></li>
            <li><a href="#"><i class="fa fa-home"> </i> Home  </a> </li>
            <li><a href="<?php echo site_url('music'); ?>"><i class="fa fa-music"> </i> Music Events  </a> </li>
            <li><a href="<?php echo site_url('exhibition'); ?>"><i class="fa fa-paint-brush"> </i> Exhibition Events  </a> </li>
            <li><a href="<?php echo site_url('event'); ?>"><i class="fa fa-futbol-o"> </i> Sport Events</a> </li>
            <li><a class="aboutus" href="#">About us </a></li>
            <li class="mobile-sc"> <i class="fa fa-search rights mobile-search"> </i><div class='searchbar rights mobile-search'><input type="text"> </div>
            </li>
            <li class="social-icon">
               <?php
                  if (!empty($webprofile->webInstagram)) echo "<a href='https://www.instagram.com/" . $webprofile->webInstagram . "'><i class='fa fa-instagram'></i></a>";
                  if (!empty($webprofile->webTwitter)) echo "<a href='https://twitter.com/" . $webprofile->webTwitter . "'><i class='fa fa-twitter'></i></a>";
                  if (!empty($webprofile->webFacebook)) echo "<a href='https://facebook.com/" . $webprofile->webFacebook . "'><i class='fa fa-facebook'></i></a>";
               ?>
            </li>
         </ul>
      </nav>


      <div class="floatok body-wrapper">
      <header class="navigation main-width">
         <div class="logo rights"> <img src="<?php echo base_url('public/img/long-logo.png');?>"> </div>
         <nav class="rights">
            <div class="ul-wrapper">
               <ul class="left-ul rights">
                  <li><a href="#"> Home </a> </li>
                  <li><a href="<?php echo site_url('music');?>"> Music</a> </li>
                  <li><a href="<?php echo site_url('exhibition'); ?>">Exhibition </a> </li>
                  <li><a href="<?php echo site_url('event'); ?>">Sport</a> </li>
                  <li><a class="aboutus" href="#">About Us </a>
               </ul>

               <ul class="right-ul">
                  <li> <a href="#"><i class="fa fa-search"> </i></a><div class='searchbar'><input type="text"> </div> </li>
                  <?php
                     if (!empty($webprofile->webInstagram)) echo "<li><a href='https://www.instagram.com/" . $webprofile->webInstagram . "'><i class='fa fa-instagram'></i></a></li>";
                     if (!empty($webprofile->webTwitter)) echo "<li><a href='https://twitter.com/" . $webprofile->webTwitter . "'><i class='fa fa-twitter'></i></a></li>";
                     if (!empty($webprofile->webFacebook)) echo "<li><a href='https://facebook.com/" . $webprofile->webFacebook . "'><i class='fa fa-facebook'></i></a></li>";
                  ?>
               </ul>
            </div>
         </nav>
      </header>

      <button class="menu-toggle">
         <i class="fa fa-bars"></i>
      </button>

      <div class="about-us">
        <div class="main-width">
          <ul>
            <li> <h2> "FIND AND PROMOTE YOUR EVENT" </h2>
                  <p> <?php echo nl2br($webprofile->webDesc); ?> </p>
            </li>
            <li>  <h3> Contact Info </h3>
                  <p> <?php echo nl2br($webprofile->webContact); ?> </p>
            </li>

            <li class="maps">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.7372693224784!2d119.41570290000003!3d-5.145934599999989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf1d545293438d%3A0x8212955e6febb04!2sGedung+Mulo!5e0!3m2!1sen!2sid!4v1442471800245" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> </i>
            </li>
          </ul>
        </div>
      </div>

      <?php $this->load->view('slider');?>

      <section class="bodywrapper">
         <div class="tagline"><center><h1> Find your favorite event to be spent this week </h1></center></div>
         <nav class="main-menu">
            <div class="main-menu-wrapper">
               <a href="<?php echo site_url('music'); ?>">
                  <div class="inner-ninja">
                     <div class="div-img-bg" style="background-image:url(<?php echo base_url('public/img/menu1.jpg');?>);"></div>
                  </div>
                  <article>
                     <h1> Music Event</h1>
                     <p>
                        "There is no such thing as going to too many concerts".
                        Find out where's your favorite bands next concert.
                     </p>
                  </article>
               </a>
            </div>

            <div class="main-menu-wrapper">
               <a href="<?php echo site_url('exhibition'); ?>">
                  <div class="inner-ninja">
                     <div class="div-img-bg" style="background-image:url(<?php echo base_url('public/img/eksebisi.jpg');?>);"></div>
                  </div>

                  <article>
                     <h1> Exhibitions Event</h1>
                     <p>
                        Discover the best art or product exhibition for the upcoming week (or month)
                     </p>
                  </article>
               </a>
            </div>

            <div class="main-menu-wrapper">
               <a href="<?php echo site_url('sport'); ?>">
                  <div class="inner-ninja">
                    <div class="div-img-bg" style="background-image:url(<?php echo base_url('public/img/bola.jpg');?>);"></div>
                  </div>

                  <article>
                     <h1> Sport Events </h1>
                     <p> Football, Basketball, Badminton, Drag Race, Marathon, Triathlon, you name it! You'll never miss the  big game anymore!</p>
                  </article>
               </a>
            </div>

         </nav>
      </section>

   <footer>
      <center>Copyright (c) 2015 Copyright Holder All Rights Reserved.</center>
   </footer>
</div>

<script src="<?php echo base_url('public/js/home.js');?>"></script>

</body>
</html>
