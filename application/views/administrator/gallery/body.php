<section class="main has-sidebar">
   <div class="page-title">
      <div class="title">
         <div class="middle">
            <h2> Gallery </h2>
         </div>
      </div>
   </div>

   <div class="header-content-manager">
      <div class="button-manager">
         <span class="button-manager-ic" style="padding-left: 6px;">
            <a href="<?php echo $urladd; ?>"> <i class="fa fa-plus"></i> </a>
         </span>
         <span class="button-manager-ic" style="padding-left: 6px;">
            <i class="fa fa-trash-o"></i>
         </span>
         <span id="totalSelected" class="select-description">
         </span>
      </div>
      <div class="float-right sorting-manager">
         <span class="active"> Name </span>
         <span> Size </span>
      </div>
   </div>

   <div class="content">
      <form>

      <input type="checkbox" onchange="resetValue(this);" class="display-none checkbox-gallery" id="gal1">
      <label for="gal1" class="container gallery-col">
         <div class="gallery-pict-crop">
            <img src="<?php echo base_url('./public/userfiles/image/photo1.png') ?>" alt="Picture 2" />
         </div>
         <div class="gallery-description">
            file1.png
         </div>
      </label>

      <input type="checkbox" onchange="resetValue(this);" class="display-none checkbox-gallery" id="gal2">
      <label for="gal2" class="container gallery-col">
         <div class="gallery-pict-crop">
            <img src="<?php echo base_url('./public/userfiles/image/photo2.png') ?>" alt="Picture 2" />
         </div>
         <div class="gallery-description">
            file1lroemsodfslkdfjsldfsldfjksdk_sdfsd.png
         </div>
      </label>

      <input type="checkbox" onchange="resetValue(this);" class="display-none checkbox-gallery" id="gal3">
      <label for="gal3" class="container gallery-col">
         <div class="gallery-pict-crop">
            <img src="<?php echo base_url('./public/userfiles/image/photo3.png') ?>" alt="Picture 2" />
         </div>
         <div class="gallery-description">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit
         </div>
      </label>

      <input type="checkbox" onchange="resetValue(this);" class="display-none checkbox-gallery" id="gal4">
      <label for="gal4" class="container gallery-col">
         <div class="gallery-pict-crop">
            <img src="<?php echo base_url('./public/userfiles/image/photo4.png') ?>" alt="Picture 2" />
         </div>
         <div class="gallery-description">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit
         </div>
      </label>

      <input type="checkbox" onchange="resetValue(this);" class="display-none checkbox-gallery" id="gal5">
      <label for="gal5" class="container gallery-col">
         <div class="gallery-pict-crop">
            <img src="<?php echo base_url('./public/userfiles/image/photo5.png') ?>" alt="Picture 2" />
         </div>
         <div class="gallery-description">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit
         </div>
      </label>

      <input type="checkbox" onchange="resetValue(this);" class="display-none checkbox-gallery" id="gal6">
      <label for="gal6" class="container gallery-col">
         <div class="gallery-pict-crop">
            <img src="<?php echo base_url('./public/userfiles/image/photo1.png') ?>" alt="Picture 2" />
         </div>
         <div class="gallery-description">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit
         </div>
      </label>

      <input type="checkbox" onchange="resetValue(this);" class="display-none checkbox-gallery" id="gal7">
      <label for="gal7" class="container gallery-col">
         <div class="gallery-pict-crop">
            <img src="<?php echo base_url('./public/userfiles/image/photo2.png') ?>" alt="Picture 2" />
         </div>
         <div class="gallery-description">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit
         </div>
      </label>
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
