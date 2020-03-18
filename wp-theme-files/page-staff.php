<?php get_header(); ?>
<main id="main">
  <section class="main-section">
    <div class="container">
      <?php
        if(have_posts()){
          while(have_posts()){
            the_post();

            the_content();
          }
        }
      ?>
    </div>
  </section>
  <?php
    $team_members = new WP_Query(array(
      'post_type' => 'team_member',
      'posts_per_page' => -1,
      'post_status' => 'publish',
      'orderby' => 'menu_order',
      'order' => 'ASC'
    ));

    if($team_members->have_posts()): ?>
      <section id="hp-team">
        <div class="container-fluid">
          <h2 class="text-on-text styled-border"><?php the_field('team_section_title_bottom_title'); ?><small data-aos="fade-up" data-aos-delay="1000"><?php the_field('team_section_title_top_title'); ?></small></h2>
        </div>

        <div class="hp-team-members" style="background-image:url(<?php the_field('team_section_background_image'); ?>); <?php the_field('team_section_background_image_css'); ?>">
          <div class="container-fluid">
            <ul class="team-member-list">
              <?php while($team_members->have_posts()): $team_members->the_post(); ?>
                <?php get_template_part('partials/loop', 'team_member'); ?>
              <?php endwhile; ?>
            </ul>
          </div>
        </div>
      </section>
    <?php endif; wp_reset_postdata(); ?>    
</main>

<div id="team-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="team_member_name" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-5">
              <img src="" id="team_member_image" class="img-fluid d-block mx-auto rounded-circle" alt="" />
            </div>
            <div class="col-md-7">
              <h3 id="team_member_name"></h3>
              <h4 id="team_member_title"></h4>
              <div id="team_member_bio"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer();