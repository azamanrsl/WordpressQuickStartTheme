<?php

 /* Adding Latest jQuery from Wordpress */
function ppm_quickstart_theme_latest_jquery()
{
    wp_enqueue_script('jquery');
}
add_action('init', 'ppm_quickstart_theme_latest_jquery');

add_action('init', 'wpj_register_menu');
function wpj_register_menu()
{
    register_nav_menu('main-menu', __('Main Menu', 'bilanti'));
}

add_theme_support('post-thumbnails');
add_image_size('post-image', 600, 200, true);

 /* Register sidebars and widgetized areas ********************************************/

add_filter('ot_show_pages', '__return_false');
add_filter('ot_show_new_layout', '__return_false');
add_filter('ot_theme_mode', '__return_true');
include_once 'option-tree/ot-loader.php';
include_once 'inc/widgets.php';
include_once 'inc/shortcodes.php';
include_once 'inc/custom-posts.php';
include_once 'inc/meta-boxes.php';
include_once 'inc/theme-options.php';

add_filter('widget_text', 'do_shortcode');
