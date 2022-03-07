<?php
get_header();

$title = get_field('page_title');
$description = get_field('description_test');
$other_description = get_field('other_description');
$thumbnail = get_field('banners');
shuffle($thumbnail);
$thumbnail = $thumbnail[0];
$thumbnail = $thumbnail['url'];

$tecnologiaDescricao = get_field('tecnologia_descricao');
$tecnologiaImagem = get_field('tecnologia_imagem');
$tecnologiaImagem = $tecnologiaImagem['url'];

$imagensBlog = get_field('imagens_blog');
$descricaoBlog = get_field('descricao_blog');

$informacoesBackground = get_field('background_informacoes');
$informacoesBackground = $informacoesBackground['url'];
$informacoesDescricao = get_field('informacoes_descricao');
?>


<?php if (have_posts()) :
   echo '<main id="page-home">';
   while (have_posts()) : the_post();
?>
      <div class="thumbnail-principal" style="background-image: url(<?= $thumbnail ?>);">
         <h1> <?= $title ?> </h1>
      </div>

      <div class="container-tecnologia">
         <div class="tecnologia-interno" data-aos="zoom-in">
            <div class="tecnologia-texto" data-aos="zoom-in" data-aos-duration="1500">
               <?= $tecnologiaDescricao ?>
            </div>
            <div class="tecnologia-imagem" data-aos="zoom-in" data-aos-duration="1500">
               <img src="<?= $tecnologiaImagem ?> ">
            </div>
         </div>
      </div>

      <div class="container-blog">

         <div class="cima">
            <a href="/blog">


               <div class="home-blog-belapedra">
                  <img src="/wp-content/themes/belapedra/assets/images/pencil.png">
                  <h3>Blog da BELAPEDRA</h3>
               </div>

               <div class="img-blog-1">
                  <img src="<?= $imagensBlog[3]['url'] ?>">
               </div>

               <div class="img-blog-0" style="background-image: url(<?= $imagensBlog[4]['url'] ?>)">
                  <?= $descricaoBlog ?>
               </div>

            </a>
         </div>

         <div class="baixo">
            <a href="/blog">

               <div class="img-blog-2">
                  <img src="<?= $imagensBlog[2]['url'] ?>">
               </div>
               <div class="img-blog-3">
                  <img src="<?= $imagensBlog[1]['url'] ?>">
               </div>
               <div class="img-blog-4">
                  <img src="<?= $imagensBlog[0]['url'] ?>">
               </div>
         </div>

         </a>
      </div>

      <div class="container-informacoes" style="background-image: url(<?= $informacoesBackground ?>)">
         <h1><?= $informacoesDescricao ?></h1>

         <ul>
            <?php
            while (have_rows('informacoes')) : the_row();
               $id = get_sub_field('id');
               $titulo = get_sub_field('informacoes_titulo');
               $imagem = get_sub_field('informacoes_imagem');
               $imagem = $imagem['url'];
               $hover = get_sub_field('informacoes_hover');
            ?>

               <li>
                  <img src='<?= $imagem ?>'>
                  <h3><?= $titulo ?></h3>
                  <p><?= $hover ?></p>
               </li>

      <?php
            endwhile;
            echo '</ul>';
            echo '</div>';

         endwhile;
         echo '</main>';
      endif;


      get_footer(); ?>