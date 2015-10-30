<div class="article-container">
   <div class="flex-img">
      <img src="<?php echo base_url('public/img/bola.jpg') ?>">
   </div>
   <div class="fill-article main-width">
      <article>
         <h1> <?php echo $submission->seTitle ?> </h1>
         <?php if (!empty($submission->sePict)): ?>
            <img src="<?php echo $submission->sePict; ?>" />
         <?php endif; ?>
         <?php echo $submission->seContent ?>
      </article>
      <aside>
         <ul>
            <?php
               $dateStart = date_format(date_create_from_format("Y-m-j" , $submission->seDateStart), 'd F Y');
               $dateEnd = date_format(date_create_from_format("Y-m-j" , $submission->seDateEnd), 'd F Y');
            ?>
            <li>
               From <i class="tanggal"><?php echo $dateStart; ?></i> to <i class="tanggal"> <?php echo $dateEnd; ?> </i>
            </li>
            <li>
               <i class="fa fa-map-marker"></i> <?php echo $submission->seEventLocation; ?>
            </li>
            <li>
               <strong> Ticket Price : <br> <?php echo $submission->seTicketPrice; ?> </strong>
            </li>
            <li>
               Contact : <br>
               <?php echo $submission->seContact; ?>
            </li>
            <li>
               Twitter : <a href="#"> <?php echo $submission->seTwitter; ?> </a> <br>
               Facebook : <a href="#"> <?php echo $submission->seFacebook; ?> </a> <br>
               Line : <a href="#"> <?php echo $submission->seLine; ?> </a> <br>
               Instagram : <a href="#"> <?php echo $submission->seInstagram; ?> </a> <br>
               Path : <a href="#"> <?php echo $submission->sePath; ?> </a>
            </li>
            <li class="barcode">
               <?php echo $seWebURL; ?>
            </li>
         </ul>
      </aside>
   </div>
</div>
