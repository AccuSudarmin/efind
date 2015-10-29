 <style>
     #map {
      width: 500px;
      height: 400px;
     }
   </style>
<div class="article-container">
   <div class="flex-img">
      <img src="<?php echo base_url('public/img/bola.jpg');?>">
   </div>
   <div class="fill-article main-width">
      <article>
         <h1> <?php echo $event->arTitle; ?> </h1>
         <img src="<?php echo $event->arPict; ?>">
         <?php echo $event->arContent; ?>

         <?php $this->load->view('related-search');?>

      </article>
      <aside>
         <ul>
            <?php
               $dateStart = date_format(date_create_from_format("Y-m-j" , $event->arDateStart), 'd F Y');
               $dateEnd = date_format(date_create_from_format("Y-m-j" , $event->arDateEnd), 'd F Y');
            ?>
            <li>
               From <i class="tanggal"><?php echo $dateStart; ?></i> to <i class="tanggal"> <?php echo $dateEnd; ?> </i>
            </li>
            <li>
               <i class="fa fa-map-marker"></i> <?php echo $event->arEventLocation; ?>
            </li>
            <li>
               <div id='map' is='map-component' mapLat='<?php echo $event->mapLatitude ?>' mapLng='<?php echo $event->mapLongitude ?>"' mapZoom = '<?php echo $event->mapZoom ?>'></div>
               <input type="hidden" id="mapLat" value="<?php echo $event->mapLatitude; ?>">
               <input type="hidden" id="mapLng" value="<?php echo $event->mapLongitude; ?>">
               <input type="hidden" id="mapZoom" value="<?php echo $event->mapZoom; ?>">
            </i>
            </li>
            <li>
               <strong> Ticket Price : <?php echo $event->arTicketPrice; ?> </strong>
            </li>
            <li>
               <?php echo $event->arContact; ?>
            </li>
            <li>
               Twitter : <a href="#"> <?php echo $event->smTwitter; ?> </a> <br>
               Facebook : <a href="#"> <?php echo $event->smFacebook; ?> </a> <br>
               Line : <a href="#"> <?php echo $event->smLine; ?> </a> <br> <br>
               Instagram : <a href="#"> <?php echo $event->smInstagram; ?> </a> <br>
               Path : <a href="#"> <?php echo $event->smPath ?> </a>
            </li>
            <li class="barcode">
               <img src="<?php echo $event->arBarcode; ?>" title="<?php echo $event->arURLWebsite; ?>" />
               <p> scan me </p>
            </li>
         </ul>
      </aside>
   </div>
</div>
