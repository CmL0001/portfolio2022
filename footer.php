
<footer class="main-footer">
      <div class="row align-items-end">
        <div class="col-md-3 footer-left text-center">
          <a href="<?php the_field('linked_in_link', 'option'); ?>" class="linked-in"><i class="<?php the_field('linked_in_logo', 'option'); ?>"></i></a><p class="visit"><?php the_field('linked_in_text', 'option'); ?></p>
        </div>

        <div class="col-sm-12 col-md-6 form-area text-center">
          <h3 class="contact-title text-center">Contact Me</h3>
          <i class="fas fa-envelope envelope"></i>
          <?php if(is_active_sidebar('contact_shortcode') ) : ?>
            <?php dynamic_sidebar('contact_shortcode'); ?>  
          <?php endif; ?>
        </div>

        <div class="col-md-3">
          <blockquote class="blockquote">
            <p class="mb-0 quote"><?php the_field('quote_text', 'option'); ?></p>
            <footer class="blockquote-footer"><cite><?php the_field('quote_author', 'option'); ?></cite></footer>
          </blockquote>
        </div>

      </div>
      <?php $year = date("Y"); ?>
      <p class="text-center copyright"><?php echo $year; ?> <?php the_field('copyright_text', 'option'); ?></p>
    </footer>


  <?php wp_footer(); ?>  


</body>
</html>
