
   <div class="content">
      <h2> SUBMIT YOUR EVENTS!</h2>
      <h4> to get featured on <span class="eventfinder-text"> eventfinder.co.id </span> </h4>
      <div class="container form">
         <form is='az-form'
            action = ""
            success = ""
            method = "post"
            >
            <table class="table-form">
               <tr>
                  <td class="label-form vertical-align-bottom">
                     Title
                  </td>
                  <td>
                     <az-input type="text" placeholder="Title Event here..." name="title" width= "100%" color="#2069b4"></az-input>
                  </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-top">
                     Description
                  </td>
                  <td>
                     <textarea is='az-texteditor' name="content" rows="8" cols="40"></textarea>
                  </td>
               </tr>

               <tr>
                  <td class="label-form">
                     Category
                  </td>
                  <td>
                     <input type="radio" class="display-none input-category" name="category" id="music" value="1" checked>
                     <label for="music" class="form-option-icon">
                        <span class="back-effect"></span>
                        <i class="fa fa-music fa-lg"></i>
                     </label>

                     <input type="radio" class="display-none input-category" name="category" id="exhibition" value="2">
                     <label for="exhibition" class="form-option-icon">
                        <span class="back-effect"></span>
                        <i class="fa fa-camera-retro fa-lg"></i>
                     </label>

                     <input type="radio" class="display-none input-category" name="category" id="sport" value="3">
                     <label for="sport" class="form-option-icon">
                        <span class="back-effect"></span>
                        <i class="fa fa-futbol-o fa-lg"></i>
                     </label>
                  </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-bottom">
                     Organizer
                  </td>
                  <td>
                     <input type="text" class='input-data' name="organizer" value="">
                  </td>
               </tr>

               <tr>
                  <td class="label-form">
                     Date
                  </td>
                  <td>
                     <input class="input-data" type="date" name="datestart"> s.d <input class="input-data" type="date" name="dateend">
                  </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-top">
                     Contact
                  </td>
                  <td>
                     <textarea name="contact" rows="8" cols="40"></textarea>
                  </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-top">
                     Event Location
                  </td>
                  <td>
                     <textarea name="eventloc" rows="8" cols="40"></textarea>
                  </td>
               </tr>


               <tr>
                  <td class="label-form">
                     Picture
                  </td>
                  <td>
                     <input type="file" class="input-data" name="picture" id="picture"><label for="picture"> Choose File </label>
                     </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-top">
                     Ticket Price
                  </td>
                  <td>
                     <textarea name="ticket" rows="8" cols="40"></textarea>
                  </td>
               </tr>

               <tr>
                  <td class="label-form">
                     Url for barcode
                  </td>
                  <td>
                     <input class="input-data" type="text" name="barcode">
                  </td>
               </tr>

               <tr class="social-input">
                  <td class="label-form">
                     Social Media
                  </td>
                  <td>
                     <i class="fa fa-twitter"> </i> <input placeholder="Twitter" class="input-data" type="text" name="twitter">
                     <i class="fa fa-facebook"> </i>  <input placeholder="Facebook" class="input-data" type="text" name="facebook">
                     <i> <img src="<?php echo base_URL('public/favico/line-messenger.png');?>"> </i> <input placeholder="Line" class="input-data" type="text" name="line">
                     <i> <img src="<?php echo base_URL('public/favico/path-1024-black.png');?>"> </i> <input placeholder="Path" class="input-data" type="text" name="path">
                     <i class="fa fa-instagram"> </i> <input placeholder="Instagram" class="input-data" type="text" name="instagram">
                  </td>
               </tr>

               <tr class="please-contact"> <td colspan="2"> <h5> Please also leave your Personal Relations contact so we can get back to you :) </h4> </td> </tr>
               <tr>
                  <td class="label-form vertical-align-top">
                     Personal Relations Manager <br> Contact
                  </td>
                  <td>
                     <textarea name="contact" rows="8" cols="40"></textarea>
                  </td>
               </tr>


               <tr>
                  <td colspan="2">
                     <div class="float-right"> <az-button name="save" type='submit' width="250px" color="#2069b4"> Save </az-button> </div>
                  </td>
               </tr>
            </table>
         </form>
      </div>
   </div>
