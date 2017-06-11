$(document).ready(function() {
  // start flex slider
  $('.flexslider').flexslider({
    animation: 'slide',
    directionNav: false,
    start : function(){
        $('.flex-control-paging').removeClass('flex-control-paging');
    }
  });
  // remove ok
  $('.okay').click(function(){
  	$('.header__more').addClass('hide');
  });
  // bookmark star
  $('.header__bar__bookmark a').click(function(){
    $('.header__bar__bookmark a .fa').toggleClass('fa-star-o').toggleClass('fa-star');
  });

  $('#cat-nav').on('show.bs.collapse', function (){
    $('.header__bar__title .fa').toggleClass('fa-angle-up').toggleClass('fa-angle-down');
  });
  $('#cat-nav').on('hide.bs.collapse', function (){
    $('.header__bar__title .fa').toggleClass('fa-angle-up').toggleClass('fa-angle-down');
  });

  // filter
  $('.filter__trigger').click(function(){
    $('.filter__option').toggleClass('hide');
  })

  $('.filter__option__item').click(function(){
    $('.filter__option__item').removeClass('active');
    $(this).toggleClass('active');
  })
});