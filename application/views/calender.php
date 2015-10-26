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
         <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
         <script src="<?php echo base_url('public/js/calendar.js');?>"></script> -->

         <!-- <h2> January 2015 </h2> <button><i class="fa fa-search"> </i></button> -->
         <form action= "">
           <select name ="month">
           <option value = "January"> January </option>
           <option value = "February"> February </option>
           <option value = "March"> March </option>
           <option value = "April"> April </option>
           <option value = "May"> May </option>
           <option value = "June"> June </option>
           <option value = "July"> July </option>
           <option value = "August"> August </option>
           <option value = "September"> September </option>
           <option value = "October"> October </option>
           <option value = "November"> November </option>
           <option value = "Desember"> Desember </option>
         </select>

         <input type = "number" min="1999" value="1999" name="Year"> </input>

         <button><i class="fa fa-search"> </i></button>

        </form>
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

         <!-- <button class="left"> <i class="fa fa-chevron-circle-down"></i></button> -->
      </div>
