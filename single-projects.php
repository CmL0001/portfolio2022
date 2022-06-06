<?php get_header(); ?>

  <div class="album-single">

      <h1 class="about-me text-center project-title animated rubberBand"><?php the_title(); ?></h1>
      <div class="row d-flex justify-content-center animated zoomIn">
        <?php the_post_thumbnail('medium_large', ['class' => 'img-fluid portfolio-single-img']); ?>

        <div class="col-md-5 project-details">
          <p class="category-list">Category(ies): <?php the_category(', '); ?></p>
          <p class="portfolio-single-text"><?php the_field('long_desc'); ?></p>
          <div class="text-center">
            <?php if(get_field('github_link') ): ?>
                    <a href="<?php the_field('github_link'); ?>"><button class="btn btn-primary btn-md btn-demo">Github</button></a>
            <?php endif; ?>
            <?php if(get_field('demo_link') ): ?>
                    <a href="<?php the_field('demo_link'); ?>"><button class="btn btn-primary btn-md btn-demo">View Demo</button></a>
            <?php endif; ?>
          </div>
        </div>
        
      </div>

  </div>
  
<?php get_footer(); ?> 