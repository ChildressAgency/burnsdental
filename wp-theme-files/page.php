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
            echo '<p>Sorry, we could not find what you were looking for.</p>';
          }
        ?>
      </article>
    </section>
  </div>
</main>
<?php get_footer();