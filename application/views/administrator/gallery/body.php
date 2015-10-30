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
         <button class="button-manager-ic" style="padding-left: 6px;" form='formdelete'>
            <i class="fa fa-trash-o"></i>
         </button>
         <span id="totalSelected" class="select-description">
         </span>
      </div>
      <div class="float-right sorting-manager">
         <span class="active"> Name </span>
         <span> Size </span>
      </div>
   </div>

   <div class="content">
      <form
         is="az-form"
         action = "<?php echo $urltarget; ?>"
         success = "<?php echo $urlsuccess; ?>"
         callback-type = "modal-box"
         method = "post"
         id='formdelete'
         >
         <?php foreach ($gallery as $data): ?>
            <input type="checkbox" onchange="resetValue(this);" class="display-none checkbox-gallery" name='<?php echo $data->name; ?>' id="pict<?php echo $data->name; ?>">
            <label for="pict<?php echo $data->name; ?>" class="container gallery-col">
               <div class="gallery-pict-crop">
                  <img src="<?php echo base_url('./public/userfiles/image/' . $data->name) ?>"/>
               </div>
               <div class="gallery-description">
                  <?php echo $data->name; ?>
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
