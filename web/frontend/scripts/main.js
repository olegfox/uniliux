$(function(){
  //  Инициализация слайдера на главной
  $('.slider').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 3000
  });

  $('.slider').on('init setPosition', function (slick) {
    $('.slider .slick-slide div').css({
      'height': $('body').height(),
      'width': $('body').width()
    });
  });
});
