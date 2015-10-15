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
            action = "<?php echo $urlaction . "/" . $event->arId; ?>"
            success = "<?php echo $urlsuccess; ?>"
            method = "post"
            >
            <table class="table-form">
               <tr>
                  <td class="label-form vertical-align-bottom">
                     Title
                  </td>
                  <td>
                     <az-input type="text" placeholder="Title" name="title" width= "100%" color="#2069b4"><?php echo $event->arTitle; ?></az-input>
                  </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-top">
                     Description
                  </td>
                  <td>
                     <textarea is='az-texteditor' name="content">
                        <?php echo $event->arContent; ?>
                     </textarea>
                  </td>
               </tr>

               <tr>
                  <td class="label-form">
                     Category
                  </td>
                  <td>
                     <?php
                        $music = ($event->arCategory == '1') ? 'checked' : '';
                        $exhibition = ($event->arCategory == '2') ? 'checked' : '';
                        $sport = ($event->arCategory == '3') ? 'checked' : '';
                     ?>
                     <input type="radio" class="display-none input-category" name="category" id="music" value="1" <?php echo $music; ?>>
                     <label for="music" class="form-option-icon">
                        <span class="back-effect"></span>
                        <i class="fa fa-music fa-lg"></i>
                     </label>

                     <input type="radio" class="display-none input-category" name="category" id="exhibition" value="2" <?php echo $exhibition; ?>>
                     <label for="exhibition" class="form-option-icon">
                        <span class="back-effect"></span>
                        <i class="fa fa-camera-retro fa-lg"></i>
                     </label>

                     <input type="radio" class="display-none input-category" name="category" id="sport" value="3" <?php echo $sport; ?>>
                     <label for="sport" class="form-option-icon">
                        <span class="back-effect"></span>
                        <i class="fa fa-futbol-o fa-lg"></i>
                     </label>
                  </td>
               </tr>

               <tr>
                  <td class="label-form">
                     Date
                  </td>
                  <td>
                     <input class="input-data" type="date" name="datestart" value="<?php echo $event->arDateStart; ?>"> s.d <input class="input-data" type="date" name="dateend" value="<?php echo $event->arDateEnd; ?>">
                  </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-top">
                     Contact
                  </td>
                  <td>
                     <textarea name="contact" rows="8" cols="40"><?php echo $event->arContact; ?></textarea>
                  </td>
               </tr>

               <tr>
                  <td class="label-form">
                     Picture
                  </td>
                  <td>
                     <input type="text" class="input-data" name="picture" id="picture" readonly="true" value="<?php echo $event->arPict; ?>">
                     <az-button name="choosepicture" type='button' id="browsepicture" class="overflow-visible" width="150px" color="#FB7D7D"> Choose Picture </az-button>
                  </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-top">
                     Ticket Price
                  </td>
                  <td>
                     <textarea name="ticket" rows="8" cols="40"><?php echo $event->arTicketPrice; ?></textarea>
                  </td>
               </tr>

               <tr>
                  <td class="label-form">
                     Url for barcode
                  </td>
                  <td>
                     <input class="input-data" type="text" name="barcode" value='<?php echo $event->arBarcode; ?>'>
                  </td>
               </tr>

               <tr>
                  <td class="label-form">
                     Social Media
                  </td>
                  <td>
                     <input placeholder="Twitter" class="input-data" type="text" name="twitter" value="<?php echo $sosmed->smTwitter; ?>">
                     <input placeholder="Facebook" class="input-data" type="text" name="facebook" value="<?php echo $sosmed->smFacebook; ?>">
                     <input placeholder="Line" class="input-data" type="text" name="line" value="<?php echo $sosmed->smLine; ?>">
                     <input placeholder="Path" class="input-data" type="text" name="path" value="<?php echo $sosmed->smPath; ?>">
                     <input placeholder="Instagram" class="input-data" type="text" name="instagram" value="<?php echo $sosmed->smInstagram; ?>">
                  </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-top">
                     Map
                  </td>
                  <td>
                     <div id="map"></div> <br>
                     <input type="text" class="input-data" name="lng" id="lng" readonly="true" value="<?php echo $map->mapLongitude; ?>">
                     <input type="text" class="input-data" name="lat" id="lat" readonly="true" value="<?php echo $map->mapLatitude; ?>">
                     <input type="text" class="input-data" name="mapzoom" id="mapzoom" readonly="true" value="<?php echo $map->mapZoom; ?>">
                  </td>
               </tr>

               <tr>
                  <td class="label-form">
                     Publish
                  </td>
                  <td>
                     <?php $publish = ($event->arStatus == '1') ? 'checked' : ''; ?>
                     <input type="checkbox" id="publish" name="status" value="1" <?php echo $publish; ?>>
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

   var map;
   var marker = null;
   var elmLat = document.getElementById("lat")
      , elmLng = document.getElementById("lng")
      , elmZoom = document.getElementById("mapzoom");

   function initMap() {
      var haightAshbury = {lat: 0, lng: 0};
      haightAshbury.lat = parseFloat(document.getElementById('lat').value);
      haightAshbury.lng = parseFloat(document.getElementById('lng').value);

      var mapZoom = parseFloat(document.getElementById('mapzoom').value);

      map = new google.maps.Map(document.getElementById('map'), {
         zoom: mapZoom,
         center: haightAshbury,
         mapTypeId: google.maps.MapTypeId.TERRAIN
      });

      map.addListener('click', function(event) {
         addMarker(event.latLng);
      });

      map.addListener('zoom_changed', function() {
         elmZoom.value = map.getZoom();
      });

      addMarker(haightAshbury);
   }

   function addMarker(location) {
      if (marker) marker.setMap(null);

      marker = new google.maps.Marker({
         position: location,
         map: map
      });

      elmLat.value = (typeof(location.lat) == 'function') ? location.lat() : location.lat;
      elmLng.value = (typeof(location.lng) == 'function') ? location.lng() : location.lng;

      elmZoom.value = map.getZoom();
   }

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBG40TbA050SuXOcL0ur3-ySuQNb84O-no&signed_in=true&callback=initMap"></script>
