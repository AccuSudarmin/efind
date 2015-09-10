var navbar= function(){
   var searchicon = $('.fa-search');
   var searchbar= $('.searchbar');

   searchicon.click(function(){
      searchbar.innerHTML = "<style> width:"
      $('.fa-twitter').hidden();
      $('.fa-facebook').hidden();
      $('.fa-youtube').hidden();
   });
};

$(document).ready(navbar);
