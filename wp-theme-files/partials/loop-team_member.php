<li>
  <div class="team-member">
    <?php $member_image = get_field('team_member_image'); ?>
    <img src="<?php echo esc_url($member_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($member_image['alt']); ?>" />
    <?php if(is_front_page()): ?>
      <a href="<?php echo esc_url(home_url('staff')); ?>">
        <h4><?php the_title(); ?><small><?php the_field('team_member_title'); ?></small></h4>
      </a>
    <?php else: ?>
      <?php
        //$modal_img = $member_image['sizes']['team-circle'];
        $modal_img = wp_get_attachment_image($member_image['ID'], 'team-circle', false, array('class' => 'img-fluid d-block mx-auto rounded-circle'));
        $member_name = get_the_title();
        $member_title = get_field('team_member_title');
        $member_bio = get_the_content();
      ?>
      <a href="#team-modal" data-target="#team-modal" data-toggle="modal" data-modal_img="<?php echo esc_attr($modal_img); ?>" data-member_name="<?php echo esc_attr($member_name); ?>" data-member_title="<?php echo esc_attr($member_title); ?>" data-member_bio="<?php echo apply_filters('the_content', $member_bio); ?>">
        <h4><?php echo esc_html($member_name); ?><small><?php echo esc_html($member_title); ?></small></h4>
      </a>
    <?php endif; ?>
  </div>
</li>