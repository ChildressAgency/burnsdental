<?php get_header(); ?>
  <main id="main">
    <?php 
      $hp_about_bg_image = get_field('first_section_background_image'); //return url
      $hp_about_bg_image_css = get_field('first_section_background_image');
    ?>
    <section id="hp-about" class="styled-border styled-border-full" style="background-image:url(<?php echo esc_url($hp_about_bg_image); ?>); <?php echo esc_attr($hp_about_bg_image_css); ?>">
      <div class="container-fluid">
        <?php 
          if(have_posts()){
            while(have_posts()){
              the_post();
              the_content();
            }
          }
        ?>
      </div>
      <div class="overlay white-overlay"></div>
    </section>

    <section id="hp-modern">
      <div class="container-fluid">
        <h2 class="text-on-text styled-border"><?php the_field('modern_section_bottom_title'); ?><small data-aos="fade-up" data-aos-delay="1000"><?php the_field('modern_section_top_title'); ?></small></h2>
        <?php the_field('modern_section_content'); ?>
      </div>
    </section>

    <section id="meet-the-doctor" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/images/doctor-gradient.jpg);">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6" data-aos="fade-up">
            <?php the_field('meet_the_doctor_section_content'); ?>
            <?php
              $meet_doctor_link = get_field('meet_the_doctor_link');
              if($meet_doctor_link): ?>
                <a href="<?php echo esc_url($meet_doctor_link['url']); ?>" class="btn-main btn-large"><?php echo esc_html($meet_doctor_link['title']); ?></a>
            <?php endif; ?>
          </div>
          <div class="col-lg-6">
            <!-- need to redo background image and get img of just doctor -->
            <?php $dr_image = get_field('doctor_image'); ?>
            <img src="<?php echo esc_url($dr_image['url']); ?>" class="img-fluid d-block mx-auto align-bottom mt-5" alt="<?php echo esc_attr($dr_image['alt']); ?>" />
          </div>
        </div>
      </div>
      <div class="overlay dark-gradient"></div>
    </section>

  <?php get_template_part('partials/services_list'); ?>

  <?php
    $team_members = new WP_Query(array(
      'post_type' => 'team_member',
      'posts_per_page' => -1,
      'post_status' => 'publish'
    ));

    if($team_members->have_posts()): ?>
      <section id="hp-team">
        <div class="container-fluid">
          <h2 class="text-on-text styled-border"><?php the_field('team_section_bottom_title'); ?><small data-aos="fade-up" data-aos-delay="1000"><?php the_field('team_section_top_title'); ?></small></h2>
        </div>

        <div class="hp-team-members" style="background-image:url(<?php the_field('team_section_background_image'); ?>); <?php the_field('team_section_background_image_css'); ?>">
          <div class="container-fluid">
            <ul class="team-member-list">
              <?php while($team_members->have_posts()): $team_members->the_post(); ?>
                <li>
                  <div class="team-member">
                    <?php $member_image = get_field('team_member_image'); ?>
                    <img src="<?php echo esc_url($member_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($member_image['alt']); ?>" />
                    <a href="<?php echo esc_url(home_url('staff')); ?>">
                      <h4><?php the_title(); ?><small><?php the_field('team_member_title'); ?></small></h4>
                    </a>
                  </div>
                </li>
              <?php endwhile; ?>
            </ul>
            <p class="text-center">
              <a href="<?php echo esc_url(home_url('staff')); ?>" class="btn-main btn-x-large">The Team</a>
            </p>
          </div>
        </div>
      </section>
    <?php endif; ?>
  </main>
<?php get_footer();