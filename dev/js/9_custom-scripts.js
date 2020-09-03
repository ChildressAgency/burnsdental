/*!
 * theme custom scripts
*/

jQuery(document).ready(function($){
  AOS.init();

  $('#testimonials-carousel.carousel-heights .carousel-inner .carousel-item').carouselHeights();

  $('#team-modal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var teamMemberName = button.data('member_name');
    var teamMemberTitle = button.data('member_title');
    var teamMemberImg = button.data('modal_img');
    var teamMemberBio = button.data('member_bio');

    var modal = $(this);

    modal.find('#team_member_name').text(teamMemberName);
    modal.find('#team_member_title').text(teamMemberTitle);
    //modal.find('#team_member_image').attr('src', teamMemberImg);
    modal.find('#team_member_image').html(teamMemberImg);
    modal.find('#team_member_bio').html(teamMemberBio);
  });

  $('.scrolling-message p').marquee({
    pauseOnHover: true,
    speed: 100
  });
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