<?php if(have_rows('forms')): ?>
  <div class="form-list-box">
    <h3><?php the_field('box_title'); ?></h3>
    <div class="form-list">
      <ul>
        <?php while(have_rows('forms')): the_row(); ?>

            <?php 
              if(get_sub_field('form_type') == 'Document'){
                $form = get_sub_field('form'); 
              }
              else{
                $form = get_sub_field('form_link');
              }
            ?>
            <li><a href="<?php echo esc_url($form['url']); ?>"><?php echo $form['title']; ?></a></li>

        <?php endwhile; ?>
      </ul>
    </div>
  </div>
<?php endif;