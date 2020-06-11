<?php
  $services = new WP_Query(array(
    'post_type' => 'service',
    'posts_per_page' => -1,
    'post_status' => 'publish'
  ));

  if($services->have_posts()): ?>
    <section id="hp-services">
      <div class="container-fluid">
        <h2 class="text-on-text styled-border text-center"><?php the_field('services_section_title_bottom_title'); ?><small data-aos="fade-up" data-aos-delay="1000"><?php the_field('services_section_title_top_title'); ?></small></h2>
        <div class="hp-services d-flex justify-content-between flex-wrap">

          <?php while($services->have_posts()): $services->the_post(); ?>
            <?php 
              $service_title = get_the_title();
              $service_slug = sanitize_title($service_title);
            ?>
            <div id="<?php echo esc_attr($service_slug); ?>" class="hp-service">
              <h3><?php echo esc_html($service_title); ?></h3>
              <?php the_field('service_summary'); ?>
              <a href="<?php the_permalink(); ?>" class="btn-main">Learn More</a>
            </div>
          <?php endwhile; ?>

        </div>
      </div>
    </section>
<?php endif; wp_reset_postdata(); ?>
