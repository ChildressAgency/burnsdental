<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="cache-control" content="public">
  <meta http-equiv="cache-control" content="private">

  <title><?php echo esc_html(bloginfo('name')); ?></title>
  <?php wp_head(); ?>
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
            <?php 
              $contact_page = get_page_by_path('contact');
              $contact_page_id = $contact_page->ID;
              $contact_phone = get_field('phone', $contact_page_id); 
            ?>
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

  <?php
    $scrolling_message = get_field('scrolling_message', 'option');
    $scrolling_message_link = get_field('scrolling_message_link', 'option');
    if($scrolling_message): ?>
      <div class="scrolling-message">
        <p>
          <?php if($scrolling_message_link): ?>
            <a href="<?php echo esc_url($scrolling_message_link['url']); ?>" target="<?php echo $scrolling_message_link['target'] ? $scrolling_message_link['target'] : '_self'; ?>">
              <?php echo esc_html($scrolling_message); ?>
            </a>
          <?php else: ?>
            <?php echo esc_html($scrolling_message); ?>
          <?php endif ?>
        </p>
      </div>
  <?php endif; ?>

  <?php
    $page_id = get_the_ID();

    if(is_home()){
      $blog_page = get_page_by_path('news-blog');
      $page_id = $blog_page->ID;
    }

    $count = 0;
    $hero_slides = get_field('hero_slides', $page_id);
    if(is_array($hero_slides)){
      $count = count($hero_slides);
    }

    if(have_rows('hero_slides', $page_id)){
      echo '<section id="hero" class="hero-slider">';
      echo ($count > 1) ? '<div class="swiper-container"><div class="swiper-wrapper">' : '';

      while(have_rows('hero_slides', $page_id)){
        the_row();

        $hero_image = get_sub_field('hero_image');
        if($hero_image): ?>
          <div class="swiper-slide" style="background-image: url(<?php echo esc_url($hero_image['url']); ?>);">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-6">
                  <?php
                    $caption_style = get_sub_field('hero_caption_style');
                    if($caption_style == 'logo'): ?>
                      <div class="hero-caption" data-aos="fade-up" data-aos-delay="500">
                        <div class="hero-caption-inner">
                          <img src="<?php echo esc_url($logo['url']); ?>" class="img-fluid d-block mx-auto" alt="Logo" />
                          <h1><small>Create a beautiful smile with</small>Burns Family Dentistry</h1>
                        </div>
                      </div>
                  <?php elseif($caption_style == 'title'): ?>
                      <div class="hero-caption" data-aos="fade-up" data-aos-delay="500">
                        <h1><?php the_sub_field('hero_caption'); ?></h1>
                        <p><?php the_sub_field('hero_sub_caption'); ?></p>
                      </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php if($caption_style != 'none'): ?>
              <div class="overlay white-gradient"></div>
            <?php endif; ?>
          </div>
        <?php endif; 
      }

      echo ($count > 1) ? '</div><div class="swiper-pagination"></div></div>' : '';

      $hero_message_link = get_field('hero_message_link', 'option');
      $hero_message_image = get_field('hero_message_image', 'option');
      $hero_message_title = get_field('hero_message_title' , 'option');
      $hero_message_subtitle = get_field('hero_message_subtitle', 'option');
      
      if($hero_message_link || $hero_message_title || $hero_message_subtitle){

        if($hero_message_link){
          echo '<a href="' . esc_url($hero_message_link['url']) . '" id="hero-message">';
        }
        else{
          echo '<div id="hero-message">';
        }
        
        if($hero_message_image){
          echo '<img src="' . esc_url($hero_message_image['url']) . '" class="img-fluid" alt="' . esc_attr($hero_message_image['alt']) . '" />';
        }

        echo '<div class="the-message">';
        if($hero_message_title){
          echo '<h3>' . $hero_message_title . '</h3>';
        }

        if($hero_message_subtitle){
          echo '<p>' . $hero_message_subtitle . '</p>';
        }
        echo '</div>';

        echo $hero_message_link ? '</a>' : '</div>';
      }

      echo '</section>';
    }