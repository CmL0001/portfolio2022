<?php 

//Include stylesheets and script files
function load_scripts() {
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/bootstrap.min.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'animatecss',  'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css', array(), '3.7.2', 'all' );
	wp_enqueue_style( 'fontawesome',  'https://use.fontawesome.com/releases/v5.1.0/css/all.css', array(), '5.1', 'all' );
	wp_enqueue_style( 'googlefonts',  'https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans+JP&display=swap', false );
	wp_enqueue_script( 'scripts-jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap.bundle.min.js', array( 'jquery' ), '4.0.0', true );
	wp_enqueue_script( 'waypointsjs', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '', true );
	
}

add_action( 'wp_enqueue_scripts', 'load_scripts');

// Add Theme Support for features
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

// Image sizes
add_image_size( 'jumbotron', 1500, 550, true );
add_image_size( 'about_page_background', 1600, 1050, true );
add_image_size( 'about_page_banner_img', 950, 350, true );
add_image_size( 'blog-single', 350, 275, true );

// Register nav menu for home page 
function portfolio_menu() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' )
   	)
  );
 }

 add_action( 'init', 'portfolio_menu' );


 /* 
 * Customize Menu Item Classes
 * @author Bill Erickson
 * @link http://www.billerickson.net/customize-which-menu-item-is-marked-active/
 *
 * @param array $classes, current menu classes
 * @param object $item, current menu item
 * @param object $args, menu arguments
 * @return array $classes
 */

function be_menu_item_classes( $classes, $item, $args ) {

	if( ( is_singular( 'post' ) ) && 'Blog' == $item->title )
		$classes[] = 'current-menu-item';  // Blog page and single blog post
		
	if( is_singular( 'projects' ) && 'Projects' == $item->title )
		$classes[] = 'current-menu-item'; // Projects page and single post- project
		
	return array_unique( $classes );
}
add_filter( 'nav_menu_css_class', 'be_menu_item_classes', 10, 3 );


 // Add options page for custom fields in header and footer 

 if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

// Modify the read more link for blog posts
function modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '"><button class="btn btn-primary btn-sm">Read More</button></a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

// Get total comments count from all blog posts
function wpb_comment_count() { 
$comments_count = wp_count_comments();
$message =  'There are <strong>'.  $comments_count->approved . '</strong> total comments posted.';
 
return $message; 
} 
 
add_shortcode('wpb_total_comments','wpb_comment_count');

// Register message widget area for total blog posts count
function message_widgets_init() {

	register_sidebar( array(
		'name'          => 'comments count',
		'id'            => 'num_comments',
		'before_widget' => '<div class="total-comments-count text-center">',
		'after_widget'  => '</div>',
	) );

}
add_action( 'widgets_init', 'message_widgets_init' );

// Register contact form widget area for shortcode for contact form integration and display 
function form_widgets_init() {

	register_sidebar( array(
		'name'          => 'contact shortcode',
		'id'            => 'contact_shortcode',
		'before_widget' => '<form class="contact">',
		'after_widget'  => '</form>',
	) );

}
add_action( 'widgets_init', 'form_widgets_init' );

// Function for javascript tod greeting on projects page
/*function js_greeting() { 
    ?>
        <script type="text/javascript">
        	const greeting = document.getElementById("greeting");
            const hour = new Date().getHours();
			const welcomeTypes = ["Good morning! ", "Good afternoon! ", "Good evening! "];
			let welcomeText = "";

			if (hour < 12) welcomeText = welcomeTypes[0];
			else if (hour < 18) welcomeText = welcomeTypes[1];
			else welcomeText = welcomeTypes[2];

			greeting.document.createTextNode = welcomeText;
        </script>
    <?php
    
}
add_action('wp_footer', 'js_greeting'); */


/* Displays multiple post types on category page- posts, projects */

function changePostType() {
    if( is_archive() && !is_admin() ) {
      set_query_var( 'post_type', array( 'post', 'projects' ) );
    }
    return;
}
add_action( 'parse_query', 'changePostType' );

// Customize login screen

add_filter('login_headerurl', 'headerUrl');

function headerUrl() {
	return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', 'loginCSS');

function loginCSS() {
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/loginstyles.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'googlefonts',  'https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans+JP&display=swap', false );
}

function login_logo() { ?>
<style type="text/css">
#login h1 a, .login h1 a {
background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/coreylyons.png);
height:150px;
width:150px;
background-size: 150px 150px;
background-repeat: no-repeat;
padding-bottom: 30px;
}
</style>
<?php }
add_action('login_enqueue_scripts', 'login_logo'); 

?>