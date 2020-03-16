<?php get_template_part('partials/testimonials_carousel.php'); ?>

<?php
  $instagram_feed_shortcode = get_field('instagram_feed_shortcode', 'option');
  if($instagram_feed_shortcode): ?>
    <section id="instagram-feed">
      <div class="container-fluid">
        <?php echo do_shortcode($instagram_feed_shortcode); ?>
        <p class="instagram-followus">Follow Us On Instagram @</p>
      </div>
    </section>
<?php endif; ?>

  <section id="newsletter-signup">
    <div class="container-fluid">
      <h3><?php the_field('newsletter_section_title', 'option'); ?></h3>
      <?php echo do_shortcode(get_field('newsletter_form_shortcode', 'option')); ?>
    </div>
  </section>

  <footer id="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <a href="<?php echo esc_url(home_url)); ?>">
            <?php $logo = get_field('site_logo', 'option'); ?>
            <img src="<?php echo esc_url($logo['url']); ?>" class="img-fluid d-block mx-auto mb-4" alt="<?php echo esc_attr($logo['alt']); ?>" />
          </a>
        </div>
        <div class="col-md-5 offset-md-1">
          <h3>Contact Us</h3>
          <p id="footer-address" class="footer-contact" itemscope itemtype="https://schema.org/LocalBusiness">
            <svg class="contact-icon">
              <use xlink:href="#icon-map-marker" />
            </svg>
            <?php
              $contact_page = get_page_by_path('contact');
              $contact_page_id = $contact_page->ID;
            ?>

            <span itemprop="streetAddress"><?php the_field('street_address', $contact_page_id); ?></span>, <span itemprop="addressLocality"><?php the_field('city', $contact_page_id); ?></span>, <span itemprop="addressRegion"><?php the_field('state', $contact_page_id); ?></span> <span itemprop="postalCode"><?php the_field('zip_code', $contact_page_id); ?></span>
          </p>
          <p id="footer-hours" class="footer-contact">
            <svg class="contact-icon">
              <use xlink:href="#icon-clock" />
            </svg>
            Office Hours: <a href="<?php echo esc_url(home_url('contact')); ?>">Learn More</a>
          </p>
          <p id="footer-phone" class="footer-contact" itemscope itemtype="https://schema.org/LocalBusiness">
            <svg class="contact-icon">
              <use xlink:href="#icon-phone" />
            </svg>
            <?php $phone = get_field('phone', $contact_page_id); ?>
            Call: <a href="tel:<?php echo esc_attr($phone); ?>"><span itemprop="telephone"><?php echo esc_html($phone); ?></span></a>
          </p>
        </div>
        <div class="col-md-3">
          <h3>Follow Us</h3>
          <div class="social">
            <?php
              $facebook = get_field('facebook', 'option');
              $twitter = get_field('twitter', 'option');
              $instagram = get_field('instagram', 'option');
            ?>
            <?php if($facebook): ?>
              <a href="<?php echo esc_url($facebook); ?>" id="facebook" aria-label="Facebook" target="_blank">
                <svg class="social-icon">
                  <use xlink:href="#icon-facebook" />
                </svg>
              </a>
            <?php endif; if($instagram): ?>
              <a href="<?php echo esc_url($instagram); ?>" id="instagram" aria-label="Instagram" target="_blank">
                <svg class="social-icon">
                  <use xlink:href="#icon-instagram" />
                </svg>
              </a>
            <?php endif; if($twitter): ?>
              <a href="<?php echo esc_url($twitter); ?>" id="twitter" aria-label="Twitter" target="_blank">
                <svg class="social-icon"> 
                  <use xlink:href="#icon-twitter" />
                </svg>
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="copyright">
        <p>&copy;<?php echo date('Y'); ?> <?php echo esc_html(bloginfo('name')); ?></p>
        <p>website created by <a href="https://childressagency.com" target="_blank">Childress Agency</a></p>
      </div>
    </div>
  </footer>

  <?php get_template_part('partials/sprites.svg'); ?>
  <?php wp_footer(); ?>
</body>
</html>