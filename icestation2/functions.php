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
// Code that adds JQuery to site
function mytheme_enqueue_scripts(){ 
  if (!is_admin()): 
    wp_enqueue_script('theme-custom'); //custom.js 
  endif; //!is_admin 
} 
add_action('wp_print_scripts', 'mytheme_enqueue_scripts');
?>
<?php
if(!function_exists('get_post_top_ancestor_id')){
/*
 *
 This code below will generate a nice sidebar link list on a PAGE only, good for links that are "active."
 Generates Parent link then children below on either Parent or Child pages. Needs to be in a <ul> as it 
 will generate a <li>.

 <?php wp_list_pages( array('title_li'=>'','include'=>get_post_top_ancestor_id()) ); ?>
 <?php wp_list_pages( array('title_li'=>'','depth'=>1,'child_of'=>get_post_top_ancestor_id()) ); ?>
 */
function get_post_top_ancestor_id(){
    global $post;
    
    if($post->post_parent){
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }
    
    return $post->ID;
}}
?>
<?php
// Allow Pagination on Custom Post Types will save you hours of Googling
$option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'my_modify_posts_per_page', 0);
function my_modify_posts_per_page() {
    add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
}
function my_option_posts_per_page( $value ) {
    global $option_posts_per_page;
    if ( is_tax( 'topics') ||  is_tax( 'presenters') ) { //Enter multiple Taxonomies here
        return 2;
    } else {
        return $option_posts_per_page;
    }
}
?>
<?php
/* Handy code to create custom single-yourtemplate.php files! */
/**
* Define a constant path to our single template folder
*/
define(SINGLE_PATH, TEMPLATEPATH . '/single');

/**
* Filter the single_template with our custom function
*/
add_filter('single_template', 'my_single_template');

/**
* Single template function which will choose our template
*/
function my_single_template($single) {
    global $wp_query, $post;
    /**
    * Checks for single template by ID
    */
    if(file_exists(SINGLE_PATH . '/single-' . $post->ID . '.php'))
        return SINGLE_PATH . '/single-' . $post->ID . '.php';
    return $single;

}
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