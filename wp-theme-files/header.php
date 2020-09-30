<!doctype html>
<html lang="en">

<head>
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M5VSKSH');</script>
<!-- End Google Tag Manager -->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="cache-control" content="public">
  <meta http-equiv="cache-control" content="private">

  <title><?php echo esc_html(bloginfo('name')); ?></title>

  <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M5VSKSH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

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

      $hero_slide_speed = get_field('hero_slide_speed', 'option');

      while(have_rows('hero_slides', $page_id)){
        the_row();

        $hero_image = get_sub_field('hero_image');
        if($hero_image): ?>
          <?php
            $hero_image_x_pos = get_sub_field('hero_image_horizontal_position');
            $hero_image_y_pos = get_sub_field('hero_image_vertical_position');
            $hero_image_background_position = 'background-position:' . esc_html($hero_image_x_pos) . ' ' . esc_html($hero_image_y_pos) . ';';
            $hero_image_css = get_sub_field('hero_image_css');
          ?>
          <div class="swiper-slide" data-swiper-autoplay="<?php echo esc_html($hero_slide_speed); ?>" style="background-image: url(<?php echo esc_url($hero_image['url']); ?>);<?php echo $hero_image_background_position . esc_html($hero_image_css); ?>">
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