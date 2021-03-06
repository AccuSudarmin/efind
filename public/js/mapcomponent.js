
   (function() {

      var mapcomponent = Object.create(HTMLDivElement.prototype);

      mapcomponent.attachedCallback = function () {
         var lat = parseFloat(this.getAttribute('mapLat'))
            , lng = parseFloat(this.getAttribute('mapLng'))
            , mapZoom = parseFloat(this.getAttribute('mapZoom'));

         var location = new google.maps.LatLng(lat, lng);
         var map = new google.maps.Map(this, {
            center: location,
            zoom: mapZoom,
            mapTypeId: google.maps.MapTypeId.ROADMAP
         });

         var marker = new google.maps.Marker({
            position: location,
            map: map
         });
      }

      document.registerElement('map-component', {
         prototype: mapcomponent ,
         extends: 'div'
      });
      // end of js az-button
   })();
