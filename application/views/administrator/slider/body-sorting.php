<section class="main has-sidebar">
   <div class="page-title">
      <div class="title">
         <div class="middle">
            <h2> <?php echo $pagetitle; ?> </h2>
         </div>
      </div>
   </div>

   <div class="header-content-manager">
      <div class="button-manager">
         <span class="button-manager-ic danger-back-color" style="padding-left: 6px;">
            <i class="fa fa-times" style="color: #fff;"></i>
         </span>
         <button type="submit" class="button-manager-ic success-back-color" form="order">
            <i class="fa fa-check" style="color: #fff"></i>
         </button>
      </div>
      <div class="float-right sorting-manager">
         <span> Name </span>
         <span> Upload </span>
         <span class="active"> Order </span>
         <span> Size </span>
      </div>
   </div>

   <div class="content">
      <form
         od-controller="menu"
         id="order"
         method="post"
         od-target="<?php echo $urltarget; ?>"
         od-success="<?php echo $urlsuccess; ?>">

         <div od-iddata="1" for="gal1" class="container slider-col">
            <div class="slider-pict-crop">
               <img src="<?php echo base_url('./public/userfiles/image/2.jpg') ?>" alt="Picture 2" />
            </div>
            <div class="gallery-description">
               file1.png
            </div>
         </div>

         <div od-iddata="2" for="gal2" class="container slider-col">
            <div class="slider-pict-crop">
               <img src="<?php echo base_url('./public/userfiles/image/3.jpg') ?>" alt="Picture 2" />
            </div>
            <div class="gallery-description">
               file1lroemsodfslkdfjsldfsldfjksdk_sdfsd.png
            </div>
         </div>

         <div od-iddata="3" for="gal3" class="container slider-col">
            <div class="slider-pict-crop">
               <img src="<?php echo base_url('./public/userfiles/image/2.jpg') ?>" alt="Picture 2" />
            </div>
            <div class="gallery-description">
               Lorem ipsum dolor sit amet, consectetur adipisicing elit
            </div>
         </div>

         <div od-iddata="4" for="gal4" class="container slider-col">
            <div class="slider-pict-crop">
               <img src="<?php echo base_url('./public/userfiles/image/3.jpg') ?>" alt="Picture 2" />
            </div>
            <div class="gallery-description">
               Lorem ipsum dolor sit amet, consectetur adipisicing elit
            </div>
         </div>

         <div od-iddata="5" for="gal5" class="container slider-col">
            <div class="slider-pict-crop">
               <img src="<?php echo base_url('./public/userfiles/image/2.jpg') ?>" alt="Picture 2" />
            </div>
            <div class="gallery-description">
               Lorem ipsum dolor sit amet, consectetur adipisicing elit
            </div>
         </div>
      </form>
   </div>
</section>

<script type="text/javascript">
   var iSelected = 0;
   var elm = document.getElementById('totalSelected');
   function resetValue(c) {

      if (c.checked) {
         iSelected += 1;
      } else {
         iSelected -= 1;
      }

      if (iSelected > 0) {
         elm.innerHTML = iSelected + " Selected Picture";
      } else {
         elm.innerHTML = "";
      }
   }
</script>
