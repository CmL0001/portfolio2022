<?php get_header(); ?>

<div class="blog-section">

	<h1 class="category-title text-center">Category: <?php single_cat_title(); ?></h1>
	
	<?php 

	if (have_posts()) :

	while (have_posts()) : the_post(); ?>

    <div class="row d-flex justify-content-center">
      <?php the_post_thumbnail('medium'); ?>
      <div class="col-md-5">
      	<p class="post-type-title"><?php printf( __( 'Post Type: %s', 'portfolio' ), ucfirst(get_post_type( get_the_ID() )) ); ?></p>
      	<a href="<?php the_permalink(); ?>"><h2 class="blog-post-title"><?php the_title(); ?></h2></a>
      	<span class="date"><strong><?php _e( 'Posted on: ', 'portfolio' ); ?></strong><?php the_time('F j, Y'); ?></span>
      	<span class="author"><strong><?php _e( 'By: ', 'portfolio' ); ?></strong><?php the_author(); ?></span>
      </div>
    </div>

    <hr>

	<?php endwhile; ?>

	<?php else: ?>


	<?php endif; ?>

</div>

<?php get_footer(); ?>