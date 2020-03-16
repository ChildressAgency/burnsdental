<?php get_header(); ?>
<main id="main">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-lg-9">
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
      <div class="col-md-4 col-lg-3">
        <?php get_sidebar('blog'); ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer();