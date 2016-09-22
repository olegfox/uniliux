function getParameterByName(name) {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
  return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

$(function(){


/*** Parallax ***/ 
    
/* detect touch */
if("ontouchstart" in window){
    document.documentElement.className = document.documentElement.className + " touch";
}
if(!$("html").hasClass("touch")){
    /* background fix */
    $(".parallax").css("background-attachment", "fixed");
}

/* fix vertical when not overflow
call fullscreenFix() if .fullscreen content changes */
function fullscreenFix(){
    var h = $('body').height();
    // set .fullscreen height
    $(".content-b").each(function(i){
        if($(this).innerHeight() > h){
            $(this).closest(".fullscreen").addClass("overflow");
        }
    });
}
$(window).resize(fullscreenFix);
fullscreenFix();

    
  $(window).load(function(){
    $(".pace").fadeOut(1500);
  });

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

  $(window).resize(function(){
    $('.fixed-header').width($('.wrap-content').width());
  });

    
  jQuery('.parallax-layer').parallax({
    mouseport: jQuery("#port, .st-container"), 
    xorigin: 0.5,
    yorigin: 0.5,
    width: 50,
    height: 50,
    decay: 0.9
  });
    
});
