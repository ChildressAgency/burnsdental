<?php get_header(); ?>
<main id="main">
  <div class="container">
    <section class="main-section">
      <article>
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
</main>
<?php get_footer();