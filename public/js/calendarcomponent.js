   (function() {

      var calendarcomponent = Object.create(HTMLElement.prototype);
      var nextSlider = 0;

      calendarcomponent.attachedCallback = function () {
         var img = this.querySelectorAll('img');
         if (img.length > 1) {
            setInterval(function () {
               for (var i = 0; i < img.length; i++) {
                  if (nextSlider == i) img[i].style.opacity = 1;
                  else img[i].style.opacity = 0;
               }

               if (nextSlider == (img.length - 1)) nextSlider = 0;
               else nextSlider += 1;

            }, 5000);
         }
      }

      document.registerElement('calendar-slider', {
         prototype: calendarcomponent
      });
   })();
