<?php get_header(); ?>
<main id="main">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-lg-9">
        <section id="news">
          <?php if(have_posts()): ?>
            <div class="post-loop">
              <?php while(have_posts()): the_post(); ?>
                <?php get_template_part('partials/loop', 'recent_posts'); ?>
              <?php endwhile; ?>
            </div>
          <?php else: ?>
            <?php get_template_part('partials/loop', 'no_content'); ?>
          <?php endif; ?>
        </section>
      </div>
      <div class="col-md-4 col-lg-3">
        <?php get_sidebar('blog'); ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer();