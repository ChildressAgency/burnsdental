<?php get_header(); ?>
  <main id="main">
    <section id="about" class="styled-border styled-border-full">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="text-on-text styled-border"><?php the_field('first_section_title_bottom_title'); ?><small data-aos="fade-up" data-aos-delay="1000"><?php the_field('first_section_title_top_title'); ?></small></h2>
            <?php the_field('first_section_content'); ?>
          </div>
          <div class="col-lg-5">
            <?php $first_section_image = get_field('first_section_image'); ?>
            <img src="<?php echo esc_url($first_section_image['url']); ?>" class="img-fluid d-block mx-auto align-bottom" alt="<?php echo esc_attr($first_section_image['alt']); ?>" />
          </div>
        </div>
      </div>
      <div class="overlay white-overlay"></div>
    </section>

    <section id="more-about">
      <div class="container-fluid">
        <h2 class="text-on-text styled-border"><?php the_field('second_section_title_bottom_title'); ?><small data-aos-="fade-up" data-aos-delay="1000"><?php the_field('second_section_title_top_title'); ?></small></h2>
        <div class="row">
          <div class="col-md-8">
            <div class="article">
              <?php the_field('second_section_content'); ?>
            </div>
          </div>
          <div class="col-md-4">
            <?php $second_section_image = get_field('second_section_image'); ?>
            <img src="<?php echo esc_url($second_section_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($second_section_image['alt']); ?>" />
          </div>
        </div>
      </div>
    </section>
  </main>
<?php get_footer();
