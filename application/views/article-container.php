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

         <div class="share-button">
            <ul>
               <a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo site_url(strtolower($event->catName) . '/' . $event->arURL); ?>', '_blank', 'width=600, height=400'); return false">
                  <li class="fesbuk"> <i class="fa fa-facebook"> </i> <span> Share </share> </li>
               </a>
               <a onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo $event->arMetaDesc; ?>&url=<?php echo site_url(strtolower($event->catName) . '/' . $event->arURL); ?>', '_blank', 'width=600, height=400'); return false;">
                  <li class="twider"> <i class="fa fa-twitter"> </i> <span> Share </share> </li>
               </a>
            </ul>
        </div>

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
               <strong> Ticket Price :</strong> <br> <?php echo $event->arTicketPrice; ?>
            </li>
            <li>
               <strong> Contact :</strong> <br>
               <?php echo $event->arContact; ?>
            </li>
            <li>
               Twitter : <a href="https://instagram.com/" target="_blank"> <?php echo $event->smTwitter; ?> </a> <br>
               Facebook : <a href="https://www.facebook.com/<?php echo $event->smInstagram; ?>" target="_blank"> <?php echo $event->smFacebook; ?> </a> <br>
               Line : <?php echo $event->smLine; ?> <br>
               Instagram : <a href="https://instagram.com/<?php echo $event->smInstagram; ?>" target="_blank"> <?php echo $event->smInstagram; ?> </a> <br>
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
