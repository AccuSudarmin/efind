var navbar= function(){


   $('.menu-toggle').click(function() {
    $('#mobile-menu').animate({
      left: "0px"
    }, 200);

    // $('body').animate({
    //   left: "50%"
    // }, 200);
  });

  $('.icon-close').click(function() {
    $('#mobile-menu').animate({
      left: "-50%"
    }, 200);

    // $('body').animate({
    //   left: "0px"
    // }, 200);
  });

  $('.aboutus').click(function() {
    var aboutus = document.querySelector('.about-us');

    if (aboutus.style.display == 'none') aboutus.style.display = 'block';
    else aboutus.style.display = 'none';

  });
};

$(document).ready(navbar);
