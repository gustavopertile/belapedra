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


// Custom post type
if (!function_exists('create_post_type')) {
    function create_post_type()
    {
        register_post_type(
            'Contatos',
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

function add_post($nome, $telefone, $email, $pais, $estado, $cidade, $mensagem)
{
    $content = 'Telefone: ' . $telefone .
        '<br> Email: ' . $email .
        '<br> Pais: ' . $pais .
        '<br> Estado: ' . $estado .
        '<br> Cidade: ' . $cidade .
        '<br> Mensagem: ' . $mensagem;

    $title = 'Contato de' . $nome;


    $my_post = array(
        'post_type' => 'Contatos',
        'post_title'    => $title,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_category' => array(8, 39)
    );

    // Insert the post into the database.
    wp_insert_post($my_post);
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
