<?php

function load_css()
{

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
}
add_action('wp_enqueue_scripts', 'load_css');

function load_js()
{
    wp_enqueue_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', false, null, true);
    wp_enqueue_script('bootstrap',  get_template_directory_uri() . '/js/bootstrap.min.js', false, null, true);
    wp_enqueue_script('scripts',  get_template_directory_uri() . '/js/scripts.js', false, null, true);
}
add_action('wp_enqueue_scripts', 'load_js');


// Menus
register_nav_menus(array(
    'top-menu' => __('Top Menu', 'theme'),
    'footer-menu' => __('Footer Menu', 'theme'),
));

// Theme Support
add_theme_support('menus');
add_theme_support('custom-logo');
add_theme_support('post-thumbnails');

// Image Sizes
add_image_size('local_bela_pedra', 1800, 780, false);
add_image_size('banners', 1800, 780, false);


if (!function_exists('create_post_type')) {
    function create_post_type()
    {
        register_post_type(
            'Curriculos',
            array(
                'labels' => array(
                    'name' => __('Currículos'),
                    'singular_name' => __('Currículos'),
                ),
                'public' => true,
                'supports' => array('title', 'custom-fields'),
                'has_archive' => 'curriculos',
                'hierarchical' => true,
                'show_in_rest' => false,
                'menu_icon' => "dashicons-id-alt",
                'rewrite' => array('slug' => 'curriculos')
            )
        );
    }
    add_action('init', 'create_post_type');
}
