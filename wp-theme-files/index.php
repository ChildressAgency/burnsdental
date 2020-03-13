<?php get_header(); ?>
<main id="main">
  <div class="container">
    <section class="main-content">
      <article>
        <?php
          if(have_posts()){
            while(have_posts()){
              the_post();

              if(is_singular()){
                the_content();
              }
              else{
                echo '<div class="loop-item md-5">';
                  echo '<h3>' . esc_html(get_the_title()) . '</h3>';
                  the_excerpt();
                  echo '<a href="' . esc_url(get_permalink()) . '" class="read-more">Read more</a>';
                echo '</div>';
              }
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