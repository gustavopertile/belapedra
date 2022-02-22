<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title><?php bloginfo('name'); ?></title>

   <?php wp_head(); ?>

   <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
</head>


<body <?php body_class(); ?>>

   <header class="main">

      <div class="container">

         <?php
         wp_nav_menu(array(
            'menu' => 'Blog Menu Esquerda',
            'menu_class' => 'blog-top-bar'
         ));
         ?>

         <div class="blog-logo-header">
            <?php the_custom_logo() ?>
            <h3>Blog</h3>
         </div>

         <?php
         wp_nav_menu(array(
            'menu' => 'Blog Menu Direita',
            'menu_class' => 'blog-top-bar'
         ));
         ?>
      </div>
      <div class="bandeiras">
         <img src="/wp-content/themes/belapedra/assets/images/bandeira_br.png" alt="PTBR">
         <img src="/wp-content/themes/belapedra/assets/images/bandeira_usa.png" alt="US" id="bandeira-us">
      </div>
   </header>

   <?php
   $titulo = get_field('titulo');
   $descricao = get_field('descricao_titulo');
   ?>


   <?php if (have_posts()) :
      echo '<main id="page-blog">';

      while (have_posts()) : the_post();
         echo '<div class="titulo-contato">';
         echo '<h1>' . $titulo . '</h1>';
         echo '<p>' . $descricao . '</p>';
         echo '</div>';


      endwhile;
      echo '</main>';
   endif;

   get_footer(); ?>