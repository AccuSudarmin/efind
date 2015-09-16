var navbar= function(){


   $('.menu-toggle').click(function() {
    $('#mobile-menu').animate({
      left: "0px"
    }, 200);

    $('body').animate({
      left: "50%"
    }, 200);
  });

  $('.icon-close').click(function() {
    $('#mobile-menu').animate({
      left: "-50%"
    }, 200);

    $('body').animate({
      left: "0px"
    }, 200);
  });

};

$(document).ready(navbar);
