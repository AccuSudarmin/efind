var main = function(){

   // var calendarslide = $('.main-calendar ul li img');
   // var nextcalendarside = calendarslide.next();
   //
   // if(nextcalendarside.length() === 0 ){
   //    nextcalendarside = $('.main-calendar ul li img').first();
   // }

   var showall = $(".fa-chevron-circle-down");

   showall.click(function(){
      var maincalendar= $('.main-calendar');

      if(maincalendar.height() !== 0){
         maincalendar.height(0);
      } else {
         maincalendar.height(200);
      }


   })







}

$(document).ready(main);
