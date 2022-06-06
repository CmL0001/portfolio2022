<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
    <?php wp_head(); ?>
    
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark">
        <a class="animated zoomInLeft navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php the_field('logo', 'option'); ?>" class="align-center logo"><?php bloginfo('name'); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <?php wp_nav_menu( 
              array( 
                'theme_location' => 'header-menu',
                'container'      => '',
                'menu_class'     => 'animated zoomInRight navbar-nav ml-auto'
                )
              ); 
            ?>
        </div>
    </nav>