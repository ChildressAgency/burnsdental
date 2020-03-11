/*!
 * theme custom scripts
*/

jQuery(document).ready(function($){
  AOS.init();

  $('#testimonials-carousel.carousel-heights .carousel-inner .carousel-item').carouselHeights();
}); //end jQuery

/**
 * Normalize Carousel Heights
 */
$.fn.carouselHeights = function () {
  var items = $(this), //grab all slides
    heights = [], //create empty array to store height values
    tallest; //create variable to make note of the tallest slide

  var normalizeHeights = function () {
    items.each(function () { //add heights to array
      heights.push($(this).height());
    });
    tallest = Math.max.apply(null, heights); //cache largest value
    //if(tallest < 300){ tallest = 300; }
    items.each(function () {
      $(this).css('min-height', tallest + 'px');
    });
  };

  normalizeHeights();

  $(window).on('resize orientationchange', function () {
    //reset vars
    tallest = 0;
    heights.length = 0;

    items.each(function () {
      $(this).css('min-height', '0'); //reset min-height
    });
    normalizeHeights(); //run it again 
  });
};