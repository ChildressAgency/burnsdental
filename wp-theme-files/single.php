<?php get_header(); ?>
<main id="main">
  <div class="container-fluid">
    <div class="row">
      <div class="<?php echo (is_active_sidebar('sidebar-blog')) ? 'col-md-8 col-lg-9' : 'col-xs-12'; ?>">
        <section class="main-content">
          <article class="entry-content">
            <?php 
              if(have_posts()){
                while(have_posts()){
                  the_post();

                  the_content();
                }
              }
              else{
                get_template_part('partials/loop', 'no_content');
              }
            ?>
          </article>
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