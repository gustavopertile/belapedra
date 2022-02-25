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



   if (have_posts()) :
      echo '<main id="simple-page-blog">';

      while (have_posts()) {
         the_post();

         $simple_page_descricao = get_field('simple_page_descricao');
         $simple_page_titulo = get_field('simple_page_titulo');
         $imagem = get_field('simple_page_imagem');
         $imagem = $imagem['url'];

         echo '<div class="container-simple-blog">';

         echo '<div class="titulo-simple-blog">';
         echo $simple_page_titulo;
         echo '</div>';

         echo '<div class="imagem-simple-blog">';
         echo '<img src=' . $imagem . '>';
         echo '</div>';


         echo '<div class="descricao-simple-blog">';
         echo $simple_page_descricao;
         echo '</div>';

         echo '<div class="imagem-simple-blog">';
         echo '<img src=' . $imagem . '>';
         echo '</div>';


         echo '<div class="descricao-simple-blog">';
         echo $simple_page_descricao;
         echo '</div>';


         comments_template('/comments.php', true);

         echo '</div>';
      }



      $query = new WP_Query(array(
         'posts_per_page' => 3,
         'post_type' => 'blog',
         'orderby' => 'title',
         'order' => 'ASC'
      ));

      if ($query->have_posts()) :
         echo '<div class="mais-lidos">';
         echo '<ul>';
         echo '<h2>MAIS LIDOS </h2>';
         while ($query->have_posts()) {
            $query->the_post();

            $descricao = get_field('descricao', $id);
            $imagem = get_field('imagem', $id);
            $imagem = $imagem['url'];
            $id = $query->post->ID;

            $url = 'http://belapedra.gustavo.com/blog/post-' . $id;

            echo '<a href="' . $url . '">';

            echo '<li>';
            echo '<img src=' . $imagem . '>';
            echo $descricao;
            echo '</li>';

            echo '</a>';
         }

         echo '</ul>';

         echo '</div>';
      endif;

      echo '</main>';

   endif;

   get_footer(); ?>