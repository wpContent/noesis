<?php
/**
 * Noesis functions and definitions
 *
 * This file will be referenced every time a template/page loads on your
 * Wordpress site. This is the place to define custom functions and
 * special code.
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Noesis
 * @since Noesis 1.0
 */

/* ========================================
 * OVERALL FUNCTIONS
 * ======================================== */

/**
 * Make Noesis available for translation.
 *
 * Translations can be added to the /languages/ directory.
 */
load_theme_textdomain( 'noesis', get_template_directory() . '/languages' );


/* ========================================
 * HEADER FUNCTIONS
 * ======================================== */

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 * 
 * @package Wordpress
 * @subpackage Noesis
 * @since Noesis 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function noesis_wp_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() ) {
    return $title;
  }

  // Add the site name.
  $title .= get_bloginfo( 'name', 'display' );

  // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) ) {
    $title = "$title $sep $site_description";
  }

  // Add a page number if necessary.
  if ( $paged >= 2 || $page >= 2 ) {
    $title = "$title $sep " . sprintf( __( 'Page %s', 'noesis' ), max( $paged, $page ) );
  }

  return $title;
}
add_filter( 'wp_title', 'noesis_wp_title', 10, 2 );

/**
 * Register the menus used by Noesis
 *
 * @link http://codex.wordpress.org/Navigation_Menus
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus
 *
 * @package Wordpress
 * @subpackage Noesis
 * @since Noesis 1.0
 */
function noesis_register_nav_menus() {
  /**
   * Register Nav Menu
   *
   * Registers a single custom navigation menu in the new custom menu editor
   * of WordPress 3.0. This allows for creation of custom menus in the dashboard
   * for use in your theme. 
   * 
   * @link codex.wordpress.org/Function_Reference/register_nav_menu
   *
   * @param  $location (string) (required) Menu location identifier, like a slug.
   * @param   $description (string) (required) Menu description - for identifying the menu in the dashboard.
   */
  register_nav_menu( 'header-menu', __( 'Header Menu' ) ); // Register menu location in admin and localise name
}

add_action( 'init', 'noesis_register_nav_menus' );


/* ========================================
 * SIDEBAR FUNCTIONS
 * ======================================== */

/**
 * Register and Widgetize Sidebars
 *
 * Calling register_sidebar() multiple times to register a number of sidebars
 * is preferable to using register_sidebars() to create a bunch in one go,
 * because it allows you to assign a unique name to each sidebar
 * (eg: “Right Sidebar”, “Left Sidebar”). Although these names only appear
 * in the admin interface it is a best practice to name each sidebar specifically,
 * giving the administrative user some idea as to the context for which
 * each sidebar will be used.
 *
 * @package Wordpress
 * @subpackage Noesis
 * @since Noesis 1.0
 */
function noesis_widgets_init() {
  /**
   * Right Sidebar
   *
   * @link http://codex.wordpress.org/Function_Reference/register_sidebar
   */
  register_sidebar( array(
    'name'          => __( 'Right Sidebar', 'noesis' ), // Sidebar name (default is localized 'Sidebar' and numeric ID).
    'id'            => 'noesis-right-sidebar', // Sidebar id - Must be all in lowercase, with no spaces (default is a numeric auto-incremented ID).
    'description'   => __('Right-hand Sidebar of the Noesis Theme'), // Text description of what/where the sidebar is. Shown on widget management screen. (default: empty)
    'class'         => '', // CSS class anem to assign to widget HTML (Default: empty)
    'before_widget' => '<li id="%1$s">', // HTML to be placed before every widget (default: <li id="%1$n">) Uses sprintf for variable substitution
    'after_widget'  => '</li>', // HTML to be placed after every widget
    'before_title'  => '<h3>', // HTML to be placed before every title
    'after_title'   => '</h3>' // HTML to be placed after every title
  ) );
}

add_action( 'widgets_init', 'noesis_widgets_init' );