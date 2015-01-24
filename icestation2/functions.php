<?php
if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
}
?>
<?php
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Main Sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
?>
<?php
/* Register Menus Here in Array Section */
add_theme_support( 'menus' );
?>
<?php
add_action( 'init', 'register_my_menus' );

function register_my_menus() {
	register_nav_menus(
		array(
			'nav' => __( 'Main Menu' ),
			'fixed' => __( 'Fixed' ),
		)
	);
}
?>
<?php
/* Changes Sidebar container from LI to a DIV */
register_sidebar( array (
    'name' => __( 'Sidebar', 'main-sidebar'),
    'id' => 'primary-widget-area', 
    'description' => __( 'The primary widget area', 'wpbp' ),
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
?>
<?php
// Sets up files to automatically add JQuery to site
function mytheme_register_scripts() { 
  //base.js – dependent on jQuery 
  wp_register_script( 
    'theme-base', //handle 
    '/wp-content/themes/my-theme/base.js', //source 
    array('jquery'), //dependencies 
    '1.0.0', //version 
    true //run in footer 
  ); 

  //custom.js – dependent on base.js 
  wp_register_script( 
    'theme-custom', 
    '/wp-content/themes/my-theme/custom.js', 
    array('theme-base'), 
    '1.0.0', 
    true 
  ); 
} 
add_action('init', 'mytheme_register_scripts');
?>
<?php
/* Removes all that junk on the Dashboard */
add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');
function wpc_dashboard_widgets() {
    global $wp_meta_boxes;
    //Today Widget
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    //Last Comments
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    //Incoming Links
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    //Plugins
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    //Quick Press
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    //Remove Wordpress Blog
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    //Remove Other WordPress News
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    //Remove Recent Drafts
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
}
?>