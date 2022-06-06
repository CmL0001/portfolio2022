<?php get_header(); ?>

<div class="blog-section" <?php post_class(); ?>>

	<h1 class="about-me text-center animated fadeInLeft"><?php _e( 'Blog', 'portfolio' ); ?></h1>

  <?php if ( is_active_sidebar( 'num_comments' ) ) : ?>

    <div class="message-area animated fadeInRight">
      <?php dynamic_sidebar( 'num_comments' ); ?>
    </div>

  <?php endif; ?>

	<?php 

	if (have_posts()) :

	while (have_posts()) : the_post(); ?>

    
    <div class="row d-flex justify-content-center animated fadeInLeftBig">
      <?php the_post_thumbnail('thumbnail'); ?>
      <div class="col-md-5">
      	<a href="<?php the_permalink(); ?>"><h2 class="blog-post-title"><?php the_title(); ?></h2></a>
      	<span class="date"><strong><?php _e( 'Posted on: ', 'portfolio' ); ?></strong><?php the_time('F j, Y'); ?></span>
      	<span class="author"><strong><?php _e( 'By: ', 'portfolio' ); ?></strong><?php the_author(); ?></span>
        <span class="categories"><strong><?php _e( 'Category: ', 'portfolio' ); ?></strong><?php the_category(', '); ?></span>
        <hr>
        <p class="blog-post-content"><?php the_content(); ?></p>
      </div>
    </div>

    <hr>

	<?php endwhile; ?>

	<?php else: ?>

		<div class="no-posts"><?php _e( 'Sorry, there are no posts to display!', 'portfolio' ); ?></div>

	<?php endif; ?>

</div> 




<?php get_footer(); ?>