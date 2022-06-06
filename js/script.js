/* Animations on scroll */

/* Intro text */
$('.js--wp-1').waypoint(function(direction) {
	$('.js--wp-1').addClass('animated fadeIn');
}, {
	offset: '50%'
});

/* Skills Column */
$('.js--wp-2').waypoint(function(direction) {
	$('.js--wp-2').addClass('animated fadeInLeft');
}, {
	offset: '50%'
});

/* Staying Updated Column */
$('.js--wp-3').waypoint(function(direction) {
	$('.js--wp-3').addClass('animated fadeInRight');
}, {
	offset: '50%'
});

/* Portfolio Page */
$('.js--wp-4').waypoint(function(direction) {
	$('.js--wp-4').addClass('animated fadeInDown');
}, {
	offset: '30%'
});

