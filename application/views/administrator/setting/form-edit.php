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
            action = "<?php echo $urlaction ?>"
            callback-type = "modal-box"
            method = "post"
            >
            <table class="table-form">
               <tr>
                  <td class="label-form vertical-align-bottom">
                     Web Title
                  </td>
                  <td>
                     <az-input type="text" placeholder="Title" name="title" width= "100%" color="#2069b4"><?php echo $webprofile->webTitle; ?></az-input>
                  </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-top">
                     Web Description
                  </td>
                  <td>
                     <textarea name="desc" rows="8" cols="40"><?php echo $webprofile->webDesc; ?></textarea>
                  </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-top">
                     About Us
                  </td>
                  <td>
                     <textarea name="about" rows="8" cols="40"><?php echo $webprofile->webAbout; ?></textarea>
                  </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-top">
                     Contact
                  </td>
                  <td>
                     <textarea name="contact" rows="8" cols="40"><?php echo $webprofile->webContact; ?></textarea>
                  </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-top">
                     Social Media
                  </td>
                  <td>
                     <input type="text" class="input-data" name="twitter" placeholder="Twitter" value="<?php echo $webprofile->webTwitter; ?>">
                     <input type="text" class="input-data" name="facebook" placeholder="Facebook" value="<?php echo $webprofile->webFacebook; ?>">
                     <input type="text" class="input-data" name="line" placeholder="Line" value="<?php echo $webprofile->webLine; ?>">
                     <input type="text" class="input-data" name="path" placeholder="Path" value="<?php echo $webprofile->webPath; ?>">
                     <input type="text" class="input-data" name="instagram" placeholder="Instagram" value="<?php echo $webprofile->webInstagram; ?>">
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
