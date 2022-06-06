<?php get_header(); ?>

    <main role="main">

      <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'jumbotron' ); ?>

      <section class="jumbotron" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat;background-size:cover;background-position:center;">
        <div class="container">
          <h1 class="jumbotron-heading animated bounceInLeft text-center"><?php bloginfo('description'); ?></h1>
          <p class="lead jumbotron-intro animated bounceInRight"><?php the_field('jumbotron_text'); ?></p>
        </div>
      </section>

      <section class="intro-section">
       <div class="text-center js--wp-1">
          <i class="<?php the_field('wordpress_logo'); ?> intro-logo"></i>
        </div>
        <div class="container">
          <div class="row justify-content-center js--wp-1">
            <div class="col-md-8">
              <p class="lead intro"><?php the_field('intro_paragraph'); ?></p>
            </div>
          </div>
        </div>
      </section>
      
    </main>

<?php get_footer(); ?>    