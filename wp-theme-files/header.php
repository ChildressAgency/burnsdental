<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="cache-control" content="public">
  <meta http-equiv="cache-control" content="private">

  <title><?php echo esc_html(bloginfo('name')); ?></title>
  <php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div id="schedule">
    <a href="<?php the_field('schedule_calendar_link', 'option'); ?>">
      <span class="schedule-icon">
        <svg class="calendar-icon">
          <use xlink:href="#icon-calendar" />
        </svg>
        <svg class="check-icon">
          <use xlink:href="#icon-check-circle" />
        </svg>
      </span>
    </a>
  </div>

  <header id="header">
    <div id="masthead" class="navbar navbar-expand-lg">
      <div class="container-fluid">

        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target=".navmenu" aria-controls="navmenu" aria-expanded="false" aria-label="Toggle Navigation">
          <svg class="hamburger">
            <use xlink:href="#icon-menu-bars" />
          </svg>
        </button>

          <div class="d-none d-lg-flex hours-phone-social">
            <div id="header-hours" class="header-contact ml-auto">
              <a href="<?php echo esc_url(home_url('contact')); ?>">
                <svg class="contact-icon">
                  <use xlink:href="#icon-clock" />
                </svg>
                Business Hours
              </a>
            </div>
            <?php $contact_phone = get_field('phone', 'option'); ?>
            <div id="header-phone" class="header-contact">
              <a href="tel:<?php echo esc_attr($contact_phone); ?>">
                <svg class="contact-icon">
                  <use xlink:href="#icon-phone" />
                </svg>  
                Call: <?php echo esc_html($contact_phone); ?>
              </a>
            </div>
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
    </div>

    <nav id="header-nav" class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a href="<?php echo esc_html(home_url()); ?>" class="brand">
          <?php $logo = get_field('site_logo', 'option'); ?>
          <img src="<?php echo esc_url($logo['url']); ?>" class="img-fluid d-block" alt="<?php echo esc_attr($logo['alt']); ?>" />
        </a>

        <?php 
          $header_nav_args = array(
            'theme_location' => 'header-nav',
            'menu' => '',
            'container' => 'div',
            'container_id' => 'main-menu', 
            'container_class' => 'collapse navbar-collapse navmenu',
            'menu_id' => '',
            'menu_class' => 'navbar-nav ml-auto',
            'echo' => true,
            'fallback_cb' => 'burnsdental_header_fallback_menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 2,
            'walker' => new WP_Bootstrap_Navwalker()
          );
          wp_nav_menu($header_nav_args);
        ?>

      </div>
    </nav>
  </header>

  <section id="<?php if(is_front_page()){ echo 'hp-hero'; } ?>" class="hero" style="background-image:url(../wp-theme-files/images/242-butler.jpg);" data-aos="fade-in">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="hero-caption" data-aos="fade-up" data-aos-delay="500">

            <?php if(is_front_page()): ?>
              <div class="hero-caption-inner">
                <img src="<?php echo esc_url($logo['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($logo['alt']); ?>" />
                <h1><?php the_field('hero_caption'); ?></h1>
              </div>
            <?php else: ?>

              <h1><?php the_field('hero_caption'); ?></h1>
              <p><?php the_field('hero_sub_caption'); ?></p>

            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
    <div class="overlay white-gradient" data-aos="slide-right" data-aos-delay="250"></div>
  </section>
