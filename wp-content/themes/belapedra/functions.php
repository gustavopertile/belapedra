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


// Custom post type Contatos
if (!function_exists('create_post_type')) {
    function create_post_type()
    {
        register_post_type(
            'contatos',
            array(
                'labels' => array(
                    'name' => __('Contatos'),
                    'singular_name' => __('Contato'),
                    'localidade' => ('Contatos')
                ),
                'public' => true,
                'supports' => array('title', 'custom-fields'),
                'has_archive' => 'contatos',
                'hierarchical' => true,
                'show_in_rest' => false,
                'menu_icon' => "dashicons-id-alt",
                'rewrite' => array('slug' => 'contatos')
            )
        );
    }
    add_action('init', 'create_post_type');
}

function add_post($post)
{

    $title = 'Contato de ' . $post['contato-nome'];

    $my_post = array(
        'post_type' => 'contatos',
        'post_title'    => $title,
        'post_content'  => '',
        'post_status'   => 'private',
        'post_author'   => 1,
        'post_category' => array(8, 39)
    );

    // Insert the post into the database.
    $post_id = wp_insert_post($my_post);

    foreach ($post as $key => $value) {
        add_post_meta($post_id, $key, wp_strip_all_tags($value));
    }

    contact_form_meta_box($post);
}

function contact_form_meta_box($post)
{
    echo 'Nome: ' . get_post_meta($post->ID, 'contato-nome', true) . '<br><br>';
    echo 'Telefone: ' . get_post_meta($post->ID, 'contato-telefone', true) . '<br><br>';
    echo 'Email: ' . get_post_meta($post->ID, 'contato-email', true) . '<br><br>';
    echo 'Mensagem: ' . get_post_meta($post->ID, 'contato-mensagem', true) . '<br><br>';
    echo get_post_meta($post->ID, 'contato-cidade', true) . ', ' .
        get_post_meta($post->ID, 'contato-estado', true) . ', ' .
        get_post_meta($post->ID, 'contato-pais', true);
}


add_action('add_meta_boxes', 'add_contact_form_meta_box');
function add_contact_form_meta_box()
{
    add_meta_box('contact-form-meta-box-id', 'Informações', 'contact_form_meta_box', 'contatos', 'normal', 'high');
}




ini_set("allow_url_fopen", 1);

// get json

function get_JSON($url)
{
    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_HTTPHEADER => array('Accept: application/json')
    ));
    $resp = curl_exec($ch);
    $resp = json_decode($resp);
    curl_close($ch);
    return $resp;
}

// enviar email contato

function sendEmail($email)
{
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $content = file_get_contents('/Users/gustavofollador/Sites/belapedra/wp-content/themes/belapedra/emails/contato.html');
    // '<html><h1>teste</h1></html>';

    wp_mail(
        $email,
        'Obrigado pelo contato! - A Bela Pedra',
        $content,
        $headers
    );
}


// Custom post type Blog

if (!function_exists('create_post_type_blog')) {
    function create_post_type_blog()
    {
        register_post_type(
            'Blog',
            array(
                'labels' => array(
                    'name' => __('Blog'),
                    'singular_name' => __('Blog'),
                    'localidade' => ('Blog')
                ),
                'public' => true,
                'supports' => array('title', 'custom-fields'),
                'has_archive' => 'blog',
                'hierarchical' => true,
                'show_in_rest' => false,
                'menu_icon' => "dashicons-id-alt",
                'rewrite' => array('slug' => 'blog')
            )
        );
    }
    add_action('init', 'create_post_type_blog');
}
