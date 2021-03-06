<nav id="mobile-menu" class="floatok">
   <div class="icon-close"> <i class="fa fa-times"> </i></div>
    <ul>
      <li><a href="http://eventfinder.co.id"><img src="<?php echo base_url('public/img/long-logo.png');?>"></a></li>
      <li><a href="#"><i class="fa fa-home"> </i> Home  </a> </li>
      <li><a href="<?php echo site_url('music');?>"><i class="fa fa-music"> </i> Music Events  </a> </li>
      <li><a href="<?php echo site_url('exhibition');?>"><i class="fa fa-paint-brush"> </i> Exhibition Events  </a> </li>
      <li><a href="<?php echo site_url('sport');?>"><i class="fa fa-futbol-o"> </i> Sport Events</a> </li>
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


<div class="straight-menu">
   <header class="navigation main-width">
      <div class="logo rights"> <img src="<?php echo base_url('public/img/long-logo.png');?>"> </div>
      <nav class="rights">
         <div class="ul-wrapper">
            <ul class="left-ul rights">
               <li><a href="<?php echo site_url();?>"> Home </a> </li>
               <li><a href="<?php echo site_url('music');?>">Music </a> </li>
               <li><a href="<?php echo site_url('exhibition');?>">Exhibition </a> </li>
               <li><a href="<?php echo site_url('sport');?>">Sport</a> </li>
               <li><a class="aboutus" href="#">About Us </a>
            </ul>

            <ul class="right-ul">
               <li> <a href="#"><i class="fa fa-search"> </i></a><div class='searchbar'><input type="text"> </div>
               </li>

               <?php
                  if (!empty($webprofile->webInstagram)) echo "<li><a href='https://www.instagram.com/" . $webprofile->webInstagram . "'><i class='fa fa-instagram'></i></a></li>";
                  if (!empty($webprofile->webTwitter)) echo "<li><a href='https://twitter.com/" . $webprofile->webTwitter . "'><i class='fa fa-twitter'></i></a></li>";
                  if (!empty($webprofile->webFacebook)) echo "<li><a href='https://facebook.com/" . $webprofile->webFacebook . "'><i class='fa fa-facebook'></i></a></li>";
               ?>

            </ul>
         </div>
      </nav>
   </header>
</div>

<button class="menu-mobile menu-toggle">

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
