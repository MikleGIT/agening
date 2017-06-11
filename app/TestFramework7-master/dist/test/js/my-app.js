// Initialize app
var myApp = new Framework7(precompileTemplates: true);

var mySwiper1 = myApp.swiper('.swiper-1', {
        pagination:'.swiper-1 .swiper-pagination',
        spaceBetween: 50
      });
// If we need to use custom DOM library, let's save it to $$ variable:
var $$ = Dom7;
// Add view
var mainView = myApp.addView('.view-main', {
  // Because we want to use dynamic navbar, we need to enable it for this view:
  dynamicNavbar: true
});


      