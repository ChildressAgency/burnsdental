<?php get_header(); ?>
  <main id="main">
    <section id="what-we-do" class="styled-border styled-border-full">
      <div class="row no-gutters">
        <div class="col-lg-8 text-side">
          <article>
            <h2 class="text-on-text styled-border"><?php the_field('first_section_title_bottom_title'); ?><small data-aos="fade-up" data-aos-delay="1000"><?php the_field('first_section_title_top_title'); ?></small></h2>
            <?php the_field('first_section_content'); ?>
          </article>
        </div>
        <?php 
          $first_section_bg_img = get_field('first_section_image');
          $first_section_bg_img_css = get_field('first_section_image_css');
        ?>
        <div class="col-lg-4 image-side" style="background-image:url(<?php echo esc_url($first_section_bg_img); ?>); <?php echo esc_attr($first_section_bg_img_css); ?>">

        </div>
      </div>
    </section>

    <section id="burns-video">
      <div class="container">
        <?php the_field('video_section_content'); ?>
      </div>
    </section>

    <?php get_template_part('partials/services_list'); ?>

    <?php
      $emergency_message = get_field('emergency_message');
      if($emergency_message): ?>
        <section id="emergency">
          <div class="container">
            <div class="emergency-bubble" data-aos="fade-up">
              <?php echo apply_filters('the_content', wp_kses_post($emergency_message)); ?>
        </div>
      </div>
    </section>
  </main>

<?php get_footer();