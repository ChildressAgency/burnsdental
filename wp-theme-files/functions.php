<?php
add_action('wp_footer', 'show_template');
function show_template() {
	global $template;
	print_r($template);
}

add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn(){
  if(!is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'burnsdental_scripts');
function burnsdental_scripts(){
  wp_register_script(
    'bootstrap-popper',
    'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js',
    array('jquery'),
    '',
    true
  );

  wp_register_script(
    'bootstrap-scripts',
    'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',
    array('jquery', 'bootstrap-popper'),
    '',
    true
  );

  wp_register_script(
    'burnsdental-scripts',
    get_stylesheet_directory_uri() . '/js/custom-scripts.min.js',
    array('jquery', 'bootstrap-scripts'),
    '',
    true
  );

  wp_enqueue_script('bootstrap-popper');
  wp_enqueue_script('bootstrap-scripts');
  wp_enqueue_script('burnsdental-scripts');
}

add_filter('script_loader_tag', 'burnsdental_add_script_meta', 10, 2);
function burnsdental_add_script_meta($tag, $handle){
  switch($handle){
    case 'jquery':
      $tag = str_replace('></script>', ' integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>', $tag);
      break;

    case 'bootstrap-popper':
      $tag = str_replace('></script>', ' integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>', $tag);
      break;

    case 'bootstrap-scripts':
      $tag = str_replace('></script>', ' integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>', $tag);
      break;
  }

  return $tag;
}

add_action('wp_enqueue_scripts', 'burnsdental_styles');
function burnsdental_styles(){
  wp_register_style(
    'google-fonts',
    'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700,900,900i&display=swap'
  );

  wp_register_style(
    'burnsdental-css',
    get_stylesheet_directory_uri() . '/style.css'
  );

  wp_enqueue_style('google-fonts');
  wp_enqueue_style('burnsdental-css');
}

add_action('after_setup_theme', 'burnsdental_setup');
function burnsdental_setup(){
  add_theme_support('post-thumbnails');
  //set_post_thumbnail_size(320, 320);
  add_image_size('team-circle', 200, 200, array('center', 'top'));

  add_theme_support('editor-styles');
  add_editor_style('style-editor.css');

  add_theme_support('wp-block-styles');
  add_theme_support('responsive-embeds');
  
  register_nav_menus(array(
    'header-nav' => 'Header Navigation',
  ));

  load_theme_textdomain('burnsdental', get_stylesheet_directory_uri() . '/languages');
}

require_once dirname(__FILE__) . '/includes/class-wp-bootstrap-navwalker.php';

function burnsdental_header_fallback_menu(){ ?>
  <div id="main-menu" class="collapse navbar-collapse navmenu">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item<?php if(is_front_page()){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url()); ?>" class="nav-link" title="Home">Home</a>
      </li>
      <li class="nav-item<?php if(is_page('about-us')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('about-us')); ?>" class="nav-link" title="About Us">About Us</a>
      </li>
      <li class="nav-item<?php if(is_page('services')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('services')); ?>" class="nav-link" title="Services">Services</a>
      </li>
      <li class="nav-item<?php if(is_page('new-patients')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('new-patients')); ?>" class="nav-link" title="New Patients">New Patients</a>
      </li>
      <li class="nav-item<?php if(is_home() || is_single()){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('news-blog')); ?>" class="nav-link" title="News/Blogs">News/Blogs</a>
      </li>
      <li class="nav-item<?php if(is_page('staff')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('staff')); ?>" class="nav-link" title="Staff">Staff</a>
      </li>
      <li class="nav-item<?php if(is_page('contact')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('contact')); ?>" class="nav-link" title="Contact Us">Contact Us</a>
      </li>
    </ul>
  </div>
<?php }

add_action('widgets_init', 'burnsdental_register_sidebars');
function burnsdental_register_sidebars(){
  register_sidebar(array(
    'name' => 'Blog sidebar',
    'id' => 'sidebar-blog',
    'description' => 'Add widgets here to appear in your sidebar on blog posts and archive pages.',
    'before_widget' => '<div class="sidebar-section">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
}

add_filter('block_categories', 'burnsdental_custom_block_category', 10, 2);
function burnsdental_custom_block_category($categories, $post){
  return array_merge(
    $categories,
    array(
      array(
        'slug' => 'custom-blocks',
        'title' => esc_html__('Custom Blocks', 'burnsdental'),
        'icon' => 'wordpress'
      )
    )
  );
}

add_action('acf/init', 'burnsdental_register_blocks');
function burnsdental_register_blocks(){
  if(function_exists('acf_register_block_type')){
    acf_register_block_type(array(
      'name' => 'prestyled_button',
      'title' => 'Pre-Styled Button',
      'description' => 'Add a pre-styled button',
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'align' => 'full',
      'render_template' => get_stylesheet_directory() . '/partials/blocks/prestyled_button.php',
      'enqueue_style' => get_stylesheet_directory_uri() . '/partials/blocks/prestyled_button.css'
    ));

    acf_register_block_type(array(
      'name' => 'text_on_text_title',
      'title' => 'Text on Text Title',
      'description' => 'Add a text on text title',
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'align' => 'full',
      'render_template' => get_stylesheet_directory() . '/partials/blocks/text_on_text_title.php',
      'enqueue_style' => get_stylesheet_directory_uri() . '/partials/blocks/text_on_text_title.css'
    ));

    acf_register_block_type(array(
      'name' => 'forms-list',
      'title' => 'Forms List Box',
      'description' => 'Add a section with a list of form links',
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'align' => 'full',
      'render_template' => get_stylesheet_directory() . '/partials/blocks/forms_list.php',
      'enqueue_style' => get_stylesheet_directory_uri() . '/partials/blocks/forms_list.css'
    ));
  }
}