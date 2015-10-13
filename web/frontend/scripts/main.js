function getParameterByName(name) {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
  return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

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

  $('.fixed-header').width($('.wrap-content').width());
});
