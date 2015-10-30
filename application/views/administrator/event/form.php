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
                     <az-input type="text" placeholder="Title Event here..." name="title" width= "100%" color="#2069b4"></az-input>
                  </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-top">
                     Description
                  </td>
                  <td>
                     <textarea is='az-texteditor' urlcomponent="http://localhost/eventfinder/public/js/azcomponent" name="content" rows="8" cols="40"></textarea>
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
                     <input type="text" class="input-data" name="picture" id="picture" readonly="true">
                     <az-button name="choosepicture" type='button' id="browsepicture" class="overflow-visible" width="150px" color="#FB7D7D"> Choose Picture </az-button>
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
                     Website Evet
                  </td>
                  <td>
                     <input class="input-data" type="text" name="urlwebsite">
                  </td>
               </tr>

               <tr>
                  <td class="label-form">
                     Social Media
                  </td>
                  <td>
                     <input placeholder="Twitter" class="input-data" type="text" name="twitter">
                     <input placeholder="Facebook" class="input-data" type="text" name="facebook">
                     <input placeholder="Line" class="input-data" type="text" name="line">
                     <input placeholder="Path" class="input-data" type="text" name="path">
                     <input placeholder="Instagram" class="input-data" type="text" name="instagram">
                  </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-top">
                     Map
                  </td>
                  <td>
                     <input id="pac-input" class="input-data" type="text" placeholder="Enter a location">
                     <div id="map"></div> <br>
                     <input type="text" class="input-data" name="lng" id="lng" readonly="true">
                     <input type="text" class="input-data" name="lat" id="lat" readonly="true">
                     <input type="text" class="input-data" name="mapzoom" id="mapzoom" readonly="true">
                  </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-top">
                     Event Tag
                  </td>
                  <td>
                     <textarea name="eventtag" rows="8" cols="40"></textarea> <br>
                     <i>Use comma's to seperate tag </i>
                  </td>
               </tr>

               <tr>
                  <td class="label-form vertical-align-top">
                     Meta Description (SEO)
                  </td>
                  <td>
                     <textarea name="metadesc" rows="8" cols="40"></textarea>
                  </td>
               </tr>

               <tr>
                  <td class="label-form">
                     Publish
                  </td>
                  <td>
                     <input type="checkbox" id="publish" name="status" value="1" checked>
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

<script type="text/javascript">
   var az = new azuploader({
      button: 'browsepicture' ,
      baseURL: 'http://localhost/eventfinder/public/js/azuploader' ,
      modul: [
         {method:'getFilesLocation', target: 'picture'}
      ]
   });

   az.on();

   var map;
   var marker = null;
   var infowindow;
   var autocomplete;
   var elmLat = document.getElementById("lat")
      , elmLng = document.getElementById("lng")
      , elmZoom = document.getElementById("mapzoom");
   var input = document.getElementById('pac-input');

   function initMap() {
      var haightAshbury = {lat: -5.135069401600222, lng: 119.41178306937218};

      map = new google.maps.Map(document.getElementById('map'), {
         zoom: 4,
         center: haightAshbury,
         mapTypeId: google.maps.MapTypeId.ROADMAP
      });

      autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.bindTo('bounds', map);
      autocomplete.setTypes([]);

      infowindow = new google.maps.InfoWindow();

      map.addListener('click', function(event) {
         addMarker(event.latLng);
      });

      map.addListener('zoom_changed', function() {
         elmZoom.value = map.getZoom();
      });

      autocomplete.addListener('place_changed', function() {
         infowindow.close();
         marker.setVisible(false);
         var place = autocomplete.getPlace();
         if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
         }

         // If the place has a geometry, then present it on a map.
         if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
         } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
         }
         marker.setIcon(/** @type {google.maps.Icon} */({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
         }));
         marker.setPosition(place.geometry.location);
         marker.setVisible(true);

         var address = '';
         if (place.address_components) {
            address = [
               (place.address_components[0] && place.address_components[0].short_name || ''),
               (place.address_components[1] && place.address_components[1].short_name || ''),
               (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
         }

         infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
         infowindow.open(map, marker);

         elmLat.value = place.geometry.location.lat();
         elmLng.value = place.geometry.location.lng();
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

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBG40TbA050SuXOcL0ur3-ySuQNb84O-no&signed_in=true&libraries=places&callback=initMap"></script>
