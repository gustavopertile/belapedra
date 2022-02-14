<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>

    <link rel="stylesheet" href="/wp-content/themes/belapedra/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>


<body <?php body_class(); ?>>


    <header class="main">

        <div class="container">

            <?php
            wp_nav_menu(array(
                'menu' => 'Menu Esquerda',
                'menu_class' => 'top-bar'
            ));
            ?>

            <div class="logo-header">
                <?php the_custom_logo() ?>
                <h3>jewelry manufacturer</h3>
                <h3>private label collection</h3>
            </div>

            <?php
            wp_nav_menu(array(
                'menu' => 'Menu Direita',
                'menu_class' => 'top-bar'
            ));
            ?>
            <div class="bandeiras">
                <img src="/wp-content/themes/belapedra/assets/images/bandeira_br.png" alt="PTBR">
                <img src="/wp-content/themes/belapedra/assets/images/bandeira_usa.png" alt="US">
            </div>
        </div>
    </header>