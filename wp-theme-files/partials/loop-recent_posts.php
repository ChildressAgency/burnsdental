<?php
  $bg_img_url = '';
  $bg_img_alt = '';

  if(has_post_thumbnail()){
    $blog_post_id = get_the_ID();
    $bg_img_url = get_the_post_thumbnail_url($blog_post_id, 'large');

    $bg_img_id = get_post_thumbnail_id($blog_post_id);
    $bg_img_alt = get_post_meta($bg_img_id, '_wp_attachment_image_alt', true);
  }
  else{
    $bg_img_url = get_field('post_default_featured_image', $blog_page_id);
  }
?>
<div class="post-summary card">
  <img src="<?php echo esc_url($bg_img_url); ?>" class="card-img-top" alt="<?php echo esc_attr($bg_img_alt); ?>" />
  <div class="card-body">
    <h3><?php the_title(); ?></h3>
    <?php the_excerpt(); ?>
    <div class="card-footer">
      <a href="<?php the_permalink(); ?>" class="btn-main btn-alt">Read More</a>
    </div>
  </div>
</div>
