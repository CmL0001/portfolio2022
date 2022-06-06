<?php get_header(); ?>

<div class="blog-single-content">

	<h1 class="about-me text-center animated tada"><?php _e( 'Blog Post', 'portfolio' ); ?></h1>

	<?php if(have_posts() ) the_post(); ?>

	<div class="row d-flex justify-content-center animated fadeInLeft">
		
		<?php the_post_thumbnail('blog-single'); ?>

		<div class="col-md-6">
			<h2 class="blog-single-title"><?php the_title(); ?></h2>
			<span class="date"><strong><?php _e( 'Posted on: ', 'portfolio' ); ?></strong><?php the_time('F j, Y'); ?></span>
	      	<span class="author"><strong><?php _e( 'By: ', 'portfolio' ); ?></strong><?php the_author(); ?></span>
	      	<span class="categories"><strong><?php _e( 'Category: ', 'portfolio' ); ?></strong><?php the_category(', '); ?></span>
	      	<hr>
	        <p class="lead blog-content"><?php the_content(); ?></p>
		</div>


	</div>

	<div class="row d-flex justify-content-center">

		<div class="col-md-6">
			<?php 

			if(comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			?>
		</div>
		
	</div>

</div>


<?php get_footer(); ?>