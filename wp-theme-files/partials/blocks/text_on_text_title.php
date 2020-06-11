<?php
  $bottom_text = get_field('bottom_title');
  $top_text = get_field('top_title');
?>
<h2 class="text-on-text styled-border"><?php echo esc_html($bottom_text); ?><small data-aos="fade-up" data-aos-delay="1000"><?php echo esc_html($top_text); ?></small></h2>