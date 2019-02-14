<?php

add_theme_support('post-thumbnails');

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');
function wpb_theme_setup(){
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'Final Demo' ),
		'secondary' => __( 'Secondary Menu', 'Final Demo' )
	) );
}

add_action('after_setup_theme','wpb_theme_setup')
	
?>

<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
function wpb_init_widgets($id) {

	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar',
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

}
add_action( 'widgets_init', 'wpb_init_widgets' );

function wpsites_before_post_widget( $content ) {
	if ( is_singular( array( 'post', 'page' ) ) && is_active_sidebar( 'before-post' ) && is_main_query() ) {
		dynamic_sidebar('before-post');
	}
	return $content;
}
add_filter( 'the_content', 'wpsites_before_post_widget' );

?>
