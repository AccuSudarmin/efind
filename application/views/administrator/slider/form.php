<section class="main has-sidebar">
   <div class="page-title">
      <div class="">
         <div class="title">
            <div class="middle">
               <h2> <?php echo $title; ?> </h2>
            </div>
         </div>
      </div>
      <div class="">

      </div>
   </div>
   <div class="content">
      <div class="container form">
         <form is='az-form'
            action = "<?php echo $urlaction; ?>"
            success = "<?php echo $urlsuccess; ?>"
            callback-type = "modal-box"
            method = "post"
            >
            <table class="table-form">
               <tr>
                  <td class="label-form vertical-align-bottom">
                     Title
                  </td>
                  <td>
                     <az-input type="text" placeholder="Title Slider" name="title" width= "100%" color="#2069b4"></az-input>
                  </td>
               </tr>

               <tr>
                  <td class="label-form">
                     Picture
                  </td>
                  <td>
                     <input type="text" class="input-data" name="picture" id="picture" readonly="true">
                     <az-button name="choosepicture" type='button' id="browsepicture" class="overflow-visible" width="150px" color="#FB7D7D"> Choose Picture </az-button>
                  </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-top">
                     Description
                  </td>
                  <td>
                     <textarea name="desc" rows="8" cols="40"></textarea>
                  </td>
               </tr>

               <tr>
                  <td colspan="2">
                     <div class="float-right"> <az-button name="save" width="250px" color="#2069b4"> Save </az-button> </div>
                  </td>
               </tr>
            </table>
         </form>
      </div>
   </div>
</section>

<script src="<?php echo base_url('public/js/azuploader/azuploader.js') ?>" charset="utf-8"></script>
<script type="text/javascript">
   var az = new azuploader({
      button: 'browsepicture' ,
      baseURL: 'http://localhost/eventfinder/public/js/azuploader' ,
      modul: [
         {method:'getName', target: 'picture'}
      ]
   });

   az.on();

</script>
