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
         <button class="button-manager-ic danger-back-color" onclick="location.href='<?php echo $urlback;  ?>';" style="padding-left: 6px;">
            <i class="fa fa-times" style="color: #fff;"></i>
         </button>
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
         is="az-formorder"
         id="order"
         method="post"
         action="<?php echo $urltarget; ?>"
         success="<?php echo $urlsuccess; ?>">

         <?php foreach($slider as $data): ?>
            <div od-iddata="<?php echo $data->slId; ?>" class="container slider-col">
               <div class="slider-pict-crop">
                  <img src="<?php echo $data->slPict; ?>"/>
               </div>
               <div class="gallery-description">
                  <?php echo $data->slTitle; ?>
               </div>
            </div>
         <?php endforeach; ?>

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
