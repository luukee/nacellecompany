// category hover
$(function() {
    $('[data-callout-hover-reveal]').hover(function() {
        $(this).find('.callout-footer').slideDown(250);
    }, function() {
        $(this).find('.callout-footer').slideUp(250);
    });
})


// ps: disable on small devices!
 // var $animationElements = $('.animation-element');
 // var $window = $(window);

 // ps: Let's FIRST disable triggering on small devices!
//  var isMobile = window.matchMedia("only screen and (max-width: 768px)");
//  if (isMobile.matches) {
//      $animationElements.removeClass('animation-element');
//  }
//
//  function checkIfInView() {
//
//      var windowHeight = $window.height();
//      var windowTopPosition = $window.scrollTop();
//      var windowBottomPosition = (windowTopPosition + windowHeight);
//
//      $.each($animationElements, function () {
//          var $element = $(this);
//          var elementHeight = $element.outerHeight();
//          var elementTopPosition = $element.offset().top;
//          var elementBottomPosition = (elementTopPosition + elementHeight);
//
// //check to see if this current container is within viewport
//          if ((elementBottomPosition >= windowTopPosition) &&
//              (elementTopPosition <= windowBottomPosition)) {
//              $element.addClass('in-view');
//          } else {
//              $element.removeClass('in-view');
//          }
//      });
//  }
//
//  $window.on('scroll resize', checkIfInView);
//  $window.trigger('scroll');


 /* @end viewport trigger script  */
