<?php
  //$testimonials_page = get_page_by_path('testimonials');
  //$testimonials_page_id = $testimonials_page->ID;

  if(have_rows('testimonials_carousel', 'option')): ?>
    <section id="testimonials" style="background-image:url(<?php the_field('testimonials_carousel_background_image', 'option'); ?>); <?php the_field('testimonials_carousel_background_image_css', 'option'); ?>">
      <div class="container-fluid">
        <h2><?php the_field('testimonials_carousel_title', 'option'); ?></h2>
        <div class="row">
          <div class="col-md-2 d-flex align-items-center">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/left-quote.png" class="img-fluid d-none d-md-block mr-auto" alt="" />
          </div>
          <div class="col-md-8">
            <div id="testimonials-carousel" class="carousel slide carousel-fade carousel-heights" data-ride="carousel">
              <div class="carousel-inner">

                <?php $s = 0; while(have_rows('testimonials_carousel', 'option')): the_row(); ?>
                  <div class="carousel-item<?php if($s == 0){ echo ' active'; } ?>">
                    <?php
                      $star_review = get_sub_field('star_review');
                      if($star_review): ?>
                        <div class="stars <?php echo esc_attr($star_review); ?>"></div>
                    <?php endif; ?>

                    <?php the_sub_field('testimonial'); ?>
                    <hr />
                    <cite>- <?php the_sub_field('testimonial_author'); ?></cite>
                  </div>
                <?php $s++; endwhile; ?>
              </div>
            </div>
          </div>
          <div class="col-md-2 d-flex align-items-center">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/right-quote.png" class="img-fluid d-none d-md-block ml-auto" alt="" />
          </div>
        </div>

        <a href="<?php echo home_url('testimonials'); ?>" class="btn-main btn-large">Read All</a>
      </div>
      <div class="overlay white-overlay"></div>
    </section>
<?php endif; ?>