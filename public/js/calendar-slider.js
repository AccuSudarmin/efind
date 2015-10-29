var calendarslider = function(){

   if($('.isi-calender img') > 1) {
      var kalender = $('.isi-calender img');
      kalender.first().addClass('activeevent');

      $('.activeevent').show();

      var autoslide = setInterval(function(){
         var sliders = $('.activeevent');
         var nextsliders = sliders.next();

         var dot = $('.activedot');
         var nextdot = dot.next();

         if(nextsliders.length === 0){
           nextsliders = $('.slide').first();
           nextdot = $('.dot').first();
         }

         sliders.fadeOut("600").removeClass('activeevent');
         nextsliders.fadeIn("600").addClass('activeevent');

      },
      2000);

   } else {
      $('.isi-calender img').first().show();
   }




};


$(document).ready(calendarslider);
