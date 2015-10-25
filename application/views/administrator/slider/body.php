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
         <span class="button-manager-ic" style="padding-left: 6px;">
            <a href="<?php echo $urladd; ?>"><i class="fa fa-plus"></i></a>
         </span>
         <button type="submit" class="button-manager-ic" style="padding-left: 6px;" form='formdelete'>
            <i class="fa fa-trash-o"></i>
         </button>
         <span class="button-manager-ic" style="padding-left: 7.5px;">
            <a href="<?php echo $urlsorting; ?>"> <i class="fa fa-sort"></i> </a>
         </span>
         <span id="totalSelected" class="select-description"></span>
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
         is = "az-form"
         action = "<?php echo $urlaction; ?>"
         success = "<?php echo $urlsuccess; ?>"
         method = "post"
         id = "formdelete"
         >
         <?php foreach($slider as $data): ?>
            <input
               type="checkbox"
               onchange="resetValue(this);"
               class="display-none checkbox-gallery"
               id="<?php echo $data->slId; ?>"
               name="<?php echo $data->slId; ?>"
               value="<?php echo $data->slId; ?>"
            >
            <label for="<?php echo $data->slId; ?>" class="container slider-col">
               <div class="slider-pict-crop">
                  <img src="<?php echo $data->slPict; ?>" alt="Picture 2" />
               </div>
               <div class="gallery-description">
                  <b> <?php echo $data->slTitle; ?> </b>
                  <a href="#"></a>
                  <p>
                     <?php echo $data->slDesc; ?>
                  </p>

               </div>
            </label>
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
