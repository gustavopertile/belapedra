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

   $query = new WP_Query(array(
      'post_type' => 'blog',
      'orderby' => 'title',
      'order' => 'ASC'
   ));

   $invertido = false;

   if ($query->have_posts()) :
      echo '<main id="page-blog">';

      while ($query->have_posts()) {
         $query->the_post();

         $id = $query->get_the_ID();
         $descricao = get_field('descricao', $id);
         $imagem = get_field('imagem', $id);
         $imagem = $imagem['url'];


         echo '<div class="container-blog">';

         if (!$invertido) {
            echo '<div class="imagem-blog">';
            echo '<img src=' . $imagem . '>';
            echo '</div>';

            echo '<div class="descricao-blog">';
            echo $descricao;

            echo '<div class="leia-mais-blog">';
            echo '<a href=""> LEIA MAIS </a>';
            echo '</div>';

            echo '</div>';

            $invertido = true;
         } else {
            echo '<div class="descricao-blog">';
            echo $descricao;

            echo '<div class="leia-mais-blog">';
            echo '<a href=""> LEIA MAIS </a>';
            echo '</div>';

            echo '</div>';

            echo '<div class="imagem-blog">';
            echo '<img src=' . $imagem . '>';
            echo '</div>';



            $invertido = false;
         }

         echo '</div>';
      }

      echo '</main>';
   endif;

   get_footer(); ?>