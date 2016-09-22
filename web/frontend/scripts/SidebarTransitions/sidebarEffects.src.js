/**
 * sidebarEffects.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */
var SidebarMenuEffects = (function() {

  function hasParentClass( e, classname ) {
    if(e === document) return false;
    if( classie.has( e, classname ) ) {
      return true;
    }
    return e.parentNode && hasParentClass( e.parentNode, classname );
  }

  // http://coveroverflow.com/a/11381730/989439
  function mobilecheck() {
    var check = false;
    (function(a){if(/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
    return check;
  }

  /*
   Перезагрузка социальных кнопок
   */
  function plusoRemove() {
    $("script, iframe, img").each(function (index, element) {
      src = $(element).attr('src');
      if (src != undefined) {
        if (-1 < src.indexOf('share.pluso.ru') ||
          -1 < src.indexOf('cm.g.doubleclick.net') ||
          -1 < src.indexOf('ads.adfox.ru') ||
          -1 < src.indexOf('eu-de-user.bidswitch.net')) {
          $(element).remove();
        }
      }
    });
    delete window.pluso;
    delete window.ifpluso;
    $("#xidx-ui").remove();
    $("#kitcode").remove();
    $("#auditorius").remove();
  }

  /*
   * Right Menu
   */
  function initMenu() {

    var container = document.getElementById( 'st-menu-menu' ),
      buttons = Array.prototype.slice.call( document.querySelectorAll( '.nav li.last a' ) ),
    // event type (if mobile use touch events)
      eventtype = 'click',
      resetMenu = function() {
        classie.remove( container, 'st-menu-open' );
        classie.remove( document.getElementById( 'st-container' ), 'st-menu-open' );
      };
      //bodyClickFn = function(evt) {
      //  if( !hasParentClass( evt.target, 'st-menu' ) ) {
      //    resetMenu();
      //    document.removeEventListener( eventtype, bodyClickFn );
      //  }
      //};

    buttons.forEach( function( el, i ) {
      console.log(el);
      var effect = el.getAttribute( 'data-effect' );

      el.addEventListener( eventtype, function( ev ) {
        ev.stopPropagation();
        ev.preventDefault();
        //container.className = 'st-menu-menu'; // clear
        $('#st-menu-nav').removeClass('st-menu-open');
        document.getElementById( 'st-container').className = 'st-container';
        $('.st-menu .close').click(function(){
          resetMenu();
        });
        classie.add( container, effect );
        classie.add( document.getElementById( 'st-container' ), effect );
        setTimeout( function() {
          classie.add( container, 'st-menu-open' );
          classie.add( document.getElementById( 'st-container' ), 'st-menu-open' );
        }, 50 );
        //document.addEventListener( eventtype, bodyClickFn );
        $('.st-container .st-pusher').click(function(e){
          if( e.target !== this )
            return;

          //if($('.st-container').hasClass('st-menu-open')){
            resetMenu();
            $('#st-menu-menu').removeClass('st-menu-open');
          //}
        })
      });
    } );

  }

  /*
   * Toogle Menu
   */
  function initToggleMenu() {

    var container = document.getElementById( 'st-menu-nav' ),
      buttons = Array.prototype.slice.call( document.querySelectorAll( '.navbar-toggle' ) ),
    // event type (if mobile use touch events)
      eventtype = mobilecheck() ? 'touchstart' : 'click',
      resetMenu = function() {
        classie.remove( container, 'st-menu-open' );
        classie.remove( document.getElementById( 'st-container' ), 'st-menu-open' );
      };

      $('#st-menu-nav ul li').click(function(){
        resetMenu();
      });
    //bodyClickFn = function(evt) {
    //  if( !hasParentClass( evt.target, 'st-menu' ) ) {
    //    resetMenu();
    //    document.removeEventListener( eventtype, bodyClickFn );
    //  }
    //};

    buttons.forEach( function( el, i ) {
      console.log(el);
      var effect = el.getAttribute( 'data-effect' );

      el.addEventListener( eventtype, function( ev ) {
        ev.stopPropagation();
        ev.preventDefault();
        //container.className = 'st-menu-menu'; // clear
        document.getElementById( 'st-container').className = 'st-container';
        classie.add( container, effect );
        classie.add( document.getElementById( 'st-container' ), effect );
        setTimeout( function() {
          classie.add( container, 'st-menu-open' );
          classie.add( document.getElementById( 'st-container' ), 'st-menu-open' );
        }, 25 );
        //document.addEventListener( eventtype, bodyClickFn );
        $('.st-container .st-pusher').click(function(e){
          if( e.target !== this )
            return;
          if($('.st-container').hasClass('st-menu-open')){
            resetMenu();
          }
        })
      });
    });
  }

  /*
   * News and Comments Menu
   */
  function initNews(selector, selector2) {

    var container = document.getElementById( selector2 ),
      buttons = Array.prototype.slice.call( document.querySelectorAll( selector ) ),
    // event type (if mobile use touch events)
      eventtype = 'click',
      resetMenu = function() {
        classie.remove( container, 'st-menu-open' );
        classie.remove( document.getElementById( 'st-container' ), 'st-menu-open' );
        if (window.history.pushState) {
          window.history.back();
        }
      },
      bodyClickFn = function(evt) {
        if( !hasParentClass( evt.target, 'st-menu' ) ) {
          resetMenu();
          document.removeEventListener( mobilecheck() ? 'touchstart' : 'click', bodyClickFn );
        }
      };

    buttons.forEach( function( el, i ) {
      console.log(el);
      var effect = el.getAttribute( 'data-effect' );

      el.addEventListener( eventtype, function( ev ) {
        ev.stopPropagation();
        ev.preventDefault();
        //container.className = 'st-menu-menu'; // clear
        document.getElementById( 'st-container').className = 'st-container';

        $('.' + selector2).html(decodeURIComponent($(this).data( 'text' ).replace(/\+/g, ' ')));

        // Init Slider
          $('.slider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            fade: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000
          });

          function blink(){
            if($('.slider .slick-prev').hasClass('bounceInLeft animated')){
              $('.slider .slick-prev')
                .removeClass('bounceInLeft animated');
            }else{
              $('.slider .slick-prev')
                .addClass('bounceInLeft animated');
            }
            if($('.slider .slick-next').hasClass('bounceInRight animated')){
              $('.slider .slick-next')
                .removeClass('bounceInLeft animated');
            }else{
              $('.slider .slick-next')
                .addClass('bounceInRight animated');
            }
          }

          blink();

          $('.st-menu .close').click(function(){
            resetMenu(); 
            document.removeEventListener( mobilecheck() ? 'touchstart' : 'click', bodyClickFn );
          });

          // Инициализация социальных кнопок
          $('.social-likes').socialLikes();

        if (window.history.pushState) {
          window.history.pushState(null, null, $(this).attr( 'href' ));
        }

        classie.add( container, effect );
        classie.add( document.getElementById( 'st-container' ), effect );
        setTimeout( function() {
          classie.add( container, 'st-menu-open' );
          classie.add( document.getElementById( 'st-container' ), 'st-menu-open' );
        }, 25 );
        document.addEventListener( mobilecheck() ? 'touchstart' : 'click', bodyClickFn );
      });
    } );

  }

  /*
   * News Media
   */
  function initMedia() {

    var container = document.getElementById( 'st-menu-media' ),
      buttons = Array.prototype.slice.call( document.querySelectorAll( '.wrap-media .media .wrap-box .box' ) ),
    // event type (if mobile use touch events)
      eventtype = 'click',
      resetMenu = function() {
        classie.remove( container, 'st-menu-open' );
        classie.remove( document.getElementById( 'st-container' ), 'st-menu-open' );
        if (window.history.pushState) {
          window.history.back();
        }
      },
      bodyClickFn = function(evt) {
        if( !hasParentClass( evt.target, 'st-menu' ) && !hasParentClass( evt.target, 'ps-toolbar-content' ) && $(evt.target).attr('class') != undefined) {
          resetMenu();
          document.removeEventListener( mobilecheck() ? 'touchstart' : 'click', bodyClickFn );
        }
      };

    buttons.forEach( function( el, i ) {
      console.log(el);
      var effect = el.getAttribute( 'data-effect' );

      el.addEventListener( eventtype, function( ev ) {
        ev.stopPropagation();
        ev.preventDefault();
        //container.className = 'st-menu-menu'; // clear
        document.getElementById( 'st-container').className = 'st-container';
        $(".st-menu-media").html($.parseJSON($(this).data( 'text' )));

        // Init Slider
        $('.slider').slick({
          dots: true,
          infinite: true,
          speed: 500,
          fade: false,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: false,
          autoplaySpeed: 2000
        });

        function blink(){
          if($('.slider .slick-prev').hasClass('bounceInLeft animated')){
            $('.slider .slick-prev')
              .removeClass('bounceInLeft animated');
          }else{
            $('.slider .slick-prev')
              .addClass('bounceInLeft animated');
          }
          if($('.slider .slick-next').hasClass('bounceInRight animated')){
            $('.slider .slick-next')
              .removeClass('bounceInLeft animated');
          }else{
            $('.slider .slick-next')
              .addClass('bounceInRight animated');
          }
        }

        blink();

        $('.st-menu .close').click(function(){
          resetMenu();
        });

        if (window.history.pushState) {
          window.history.pushState(null, null, $(this).attr( 'href' ));
        }

        // Инициализация социальных кнопок
        $('.social-likes').socialLikes();

        $(".st-menu-media .gallery").each(function (i, e) {
          $(e).unbind('click').click(function () {
            Code.photoSwipe('a', this);
            Code.PhotoSwipe.Current.show(0);
            return false;
          });
        });

        classie.add( container, effect );
        classie.add( document.getElementById( 'st-container' ), effect );
        setTimeout( function() {
          classie.add( container, 'st-menu-open' );
          classie.add( document.getElementById( 'st-container' ), 'st-menu-open' );
        }, 25 );
        document.addEventListener( mobilecheck() ? 'touchstart' : 'click', bodyClickFn );
      });
    } );

  }

  //initMenu();
  initToggleMenu();
  initNews('.feature-news a', 'st-menu-news');
  initNews('.news-list:not(.news-list-main) a', 'st-menu-news');
  initNews('.factory-list:not(.factory-list-main) a', 'st-menu-news');
  //initMedia();

})();