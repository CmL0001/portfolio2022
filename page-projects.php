<?php 
/**
* Template Name: Projects Page
*
* 
*/
?>

<?php get_header(); ?>

  <div class="portfolio-heading">
    <h1 class="about-me text-center animated flash"><?php the_title(); ?></h1>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <p class="lead portfolio-intro animated fadeInUpBig"><strong id="greeting"></strong><?php the_field('intro_text'); ?></p>  
      </div>
    </div>
    <div class="row justify-content-center github-profile-link">
      <p class="lead github-intro animated jello">Check out my Github here!</p>
      <a href="<?php the_field('github_link'); ?>"><i class="fab fa-github-square animated wobble"></i></a>
    </div>
  </div>      

  <div class="album">        

      <div class="container portfolio"> 
            <?php  
              $args = array( 'post_type' => 'projects' );
              $the_query = new WP_Query( $args );
            ?>

            <div class=" row js--wp-4">

              <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>  

              <div class="col-sm-12 col-md-4 col-lg-4">                            
                <div class="card">          
                  <?php the_post_thumbnail('medium_large', ['class' => 'img-fluid project-img']); ?>

                  <div class="overlay">
                    <h2 class="card-title text-center"><?php the_title(); ?></h2>
                    <p class="card-info"><?php the_field('short_desc'); ?></p>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="<?php the_permalink(); ?>"><button type="button" class="btn btn-md btn-outline-secondary">View Project</button></a>
                    </div>
                  </div>
                </div>                  
              </div> 
            
               <?php endwhile;
                wp_reset_query(); ?> 

            </div>         
        </div> 
       </div>
     </div>

<?php get_footer(); ?>