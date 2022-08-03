<?php 
/**
* Template Name: About Page
*
* 
*/
?>

<?php get_header(); ?>

  <?php $backgroundImg2 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'about_page_background' ); ?>

  <div class="about" style="background: url('<?php echo $backgroundImg2[0]; ?>') no-repeat; background-size:cover;background-position:center;">

    <h1 class="about-me text-center animated tada"><?php the_title(); ?></h1>
    <div class="row d-flex justify-content-center">
      <img src="<?php the_field('my_image'); ?>" class="float-left about-image animated fadeInLeft img-fluid">
      <div class="col-md-5">
        <p class="lead about-text animated fadeInRight"><?php the_field('about_intro_text'); ?></p>
      </div>
    </div>
    <div class="image-banner d-flex justify-content-center animated rubberBand">
      <?php 
        $image = get_field('banner_image');
        $size = 'about_page_banner_img'; // (thumbnail, medium, large, full or custom size - i use custom size)
        if( $image ) {
            echo wp_get_attachment_image( $image, $size, "", array('class' => 'img-fluid') );
        }
      ?>
    </div>
  </div>

  <div class="skills">
    <h2 class="skills-list-title text-center"><?php the_field('top_skills_title'); ?></h2>
    <div class="row d-flex justify-content-center">
      <div class="col-sm-5 col-md-6 col-lg-5 tech text-center js--wp-2">
        <h3 class="skills-list-subtitle"><?php the_field('skills_title'); ?></h3>
        <i class="<?php the_field('skills_icon'); ?>"></i>
            <?php 
                $rows = get_field('skills_list');
                if( $rows ) {
                    echo '<ul class="list-unstyled">';
                    foreach( $rows as $row ) {
                        $list_item = $row['list_text'];
                        echo '<li>';
                            echo $list_item;
                        echo '</li>';
                    }
                    echo '</ul>';
                }
            ?>
      </div>
      <div class="col-sm-4 col-md-6 col-lg-5 updates js--wp-3">
        <h3 class="skills-list-subtitle text-center"><?php the_field('updated_title'); ?></h3>
        <div class="text-center"><i class="<?php the_field('updated_icon'); ?>"></i></div>
        <p class="updated-text"><?php the_field('updated_text'); ?> </p>
      </div>
    </div>
  </div>

<?php get_footer(); ?>
