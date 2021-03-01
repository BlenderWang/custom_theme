<?php
/**
 * Functions and definitions
 *
 * @subpackage Elling_theme
 * @since 2021
 */

add_theme_support('post-thumbnails');


function wp_get_menu_array($current_menu) {
    $array_menu = wp_get_nav_menu_items($current_menu);
    $menu = array();
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID']          =   $m->ID;
            $menu[$m->ID]['title']       =   $m->title;
            $menu[$m->ID]['url']         =   $m->url;
            $menu[$m->ID]['children']    =   array();
        }
    }
    $submenu = array();
    foreach ($array_menu as $m) {
        if ($m->menu_item_parent) {
            $submenu[$m->ID] = array();
            $submenu[$m->ID]['ID']       =   $m->ID;
            $submenu[$m->ID]['title']    =   $m->title;
            $submenu[$m->ID]['url']      =   $m->url;
            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
        }
    }
    return $menu;
}

/* function wpb_custom_new_menu() {
    register_nav_menu('custom-nav-menu',__( 'Nav Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' ); */

/**
 * Register Custom Navigation Walker
 */
/* function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' ); */

/* Add custom class to link in menu */
/* function wp_modify_menuclass($ulclass) {
    return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}

add_filter('wp_nav_menu', 'wp_modify_menuclass'); */

/* Add custom classes to list item "li" */
/* function _namespace_menu_item_class( $classes, $item ) {       
    $classes[] = "nav-item"; 
    return $classes;
} 

add_filter( 'nav_menu_css_class' , '_namespace_menu_item_class' , 10, 2 ); */