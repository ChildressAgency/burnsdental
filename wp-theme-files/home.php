<?php get_header(); ?>
<?php
  $blog_page = get_page_by_path('news-blog');
  $blog_page_id = $blog_page->ID;
?>
<main id="main">
  <div class="container-fluid">
    <h2 class="text-on-text styled-border"><?php the_field('blog_page_bottom_title', $blog_page_id); ?><small data-aos="fade-up" data-aos-delay="1000"><?php the_field('blog_page_top_title', $blog_page_id); ?></small></h2>
    <div class="row">
      <div class="<?php echo (is_active_sidebar('sidebar-blog')) ? 'col-md-8 col-lg-9' : 'col-12'; ?>">
        <section id="news">
          <?php
            $most_recent_post_id = '';
            $most_recent = new WP_Query(array(
              'post_type' => 'post',
              'posts_per_page' => 1,
              'post_status' => 'publish',
            ));

            if($most_recent->have_posts()): while($most_recent->have-posts()): $most_recent->the_post(); ?>
              <?php 
                $most_recent_post_id = get_the_ID();
                $bg_img_url = '';
                $bg_img_css = '';

                if(has_post_thumbnail()){
                  $bg_img_url = get_the_post_thumbnail_url($most_recent_post_id, 'large');
                  $bg_img_css = 'background-position:center center;';
                }
                else{
                  $bg_img_url = get_field('post_default_featured_image', $blog_page_id);
                  $bg_img_css = get_field('post_default_featured_image_css', $blog_page_id);
                }
              ?>
              <div class="featured-post">
                <div class="row no-gutters">
                  <div class="col-lg-6 image-side" style="background-image:url(<?php echo esc_url($bg_img_url); ?>); <?php echo esc_attr($bg_img_css); ?>">

                  </div>
                  <div class="col-lg-6 text-side">
                    <h3><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="btn-main btn-alt btn-large">Read More</a>
                  </div>
                </div>
              </div>
          <?php endwhile; endif; ?>

          <?php 
            $recent_posts = new WP_Query(array(
              'post_type' => 'post',
              'post_status' => 'publish',
              'posts_per_page' => 6, 
              'post__not_in' => array($most_recent_post_id),
              'paged' => 1
            )); 

            if($recent_posts->have_posts()): ?>
              <div class="post-loop">
                <?php while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
                  <?php get_template_part('partials/loop', 'recent_posts'); ?>
                <?php endwhile; ?>
              </div>

              <div class="pagination">

              </div>
          <?php endif; ?>
        </section>
      </div>
      <?php if(is_active_sidebar('sidebar-blog')): ?>
        <div class="col-md-4 col-lg-3">
          <?php get_sidebar('blog'); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</main>
<?php get_footer();
