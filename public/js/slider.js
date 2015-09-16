var main = function(){



      $('.activeslide').show();


      var autoslide = setInterval(function(){
         var sliders = $('.activeslide');
         var nextsliders = sliders.next();

         var dot = $('.activedot');
         var nextdot = dot.next();

         if(nextsliders.length === 0){
           nextsliders = $('.slide').first();
           nextdot = $('.dot').first();
         }

         sliders.fadeOut("600").removeClass('activeslide');
         nextsliders.fadeIn("600").addClass('activeslide');
         dot.removeClass('activedot');
         nextdot.addClass('activedot');

      },
      5000);

   $('.arrow-next').click(function(){
      var sliders = $('.activeslide');
      var nextsliders = sliders.next();

      var dot = $('.activedot');
      var nextdot = dot.next();

      if(nextsliders.length === 0){
        nextsliders = $('.slide').first();
        nextdot = $('.dot').first();
      }

      sliders.fadeOut("600").removeClass('activeslide');
      nextsliders.fadeIn("600").addClass('activeslide');
      dot.removeClass('activedot');
      nextdot.addClass('activedot');
   });

   $('.arrow-prev').click(function(){
      var asliders = $('.activeslide');
      var prevsliders = asliders.prev();

      var adot = $('.activedot');
      var prevdot = adot.prev();

      if(prevsliders.length === 0){
        prevsliders = $('.slide').last();
        prevdot = $('.dot').last();
      }

      asliders.fadeOut("600").removeClass('activeslide');
      prevsliders.fadeIn("600").addClass('activeslide');
      adot.removeClass('activedot');
      prevdot.addClass('activedot');

   });

};


$(document).ready(main);
