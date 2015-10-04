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

  // Форма поиска
  $("a.search").on("click", function () {
    return $("body").toggleClass("open-search"), $(".search-container input").first().focus(), !1
  });
  $(".search-container form").submit(function () {
    return $("input[name=q]").val() ? void 0 : !1
  });
});
