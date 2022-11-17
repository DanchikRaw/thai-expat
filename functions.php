<?php
/**
 * Thai Expat functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Thai_Expat
 */

add_action( 'wp_enqueue_scripts', 'theme_add_scripts' );
function theme_add_scripts() {
    wp_enqueue_style( 'style-name', get_template_directory_uri() . '/dist/styles/main.css', [], null);

    wp_enqueue_script( 'script-name', get_template_directory_uri() . '/dist/scripts/main.js', [], false, true);
}

add_action( 'after_setup_theme', 'theme_register_nav_menu' );

function theme_register_nav_menu() {
    register_nav_menu( 'header', 'Header menu' );
    register_nav_menu( 'header-mob', 'Header menu mobile' );
}

// News
require_once get_theme_file_path() . '/inc/news.php';

// Thumbmail
require_once get_theme_file_path() . '/inc/thumbmail.php';

// Category
require_once get_theme_file_path() . '/inc/category.php';

// Forum
require_once get_theme_file_path() . '/inc/forumIntegration.php';

// Custom Fields
require_once get_theme_file_path() . '/inc/custom-fields.php';

// Custom Fields
require_once get_theme_file_path() . '/inc/weather.php';

// Custom Fields
require_once get_theme_file_path() . '/inc/comments.php';

// Custom Fields
require_once get_theme_file_path() . '/inc/courses.php';

add_theme_support( 'title-tag' );



