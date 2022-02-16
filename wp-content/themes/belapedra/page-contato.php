<?php get_header();
$titulo = get_field('titulo');
$descricao = get_field('descricao_titulo');
?>


<?php if (have_posts()) :
   echo '<main id="page-contato">';

   while (have_posts()) : the_post();
      echo '<div class="titulo-contato">';
      echo '<h1>' . $titulo . '</h1>';
      echo '<p>' . $descricao . '</p>';
      echo '</div>'; ?>


      <div class="formulario">
         <form action="">
            <input type="text" id="contato-nome" placeholder="NOME">
            <input type="text" id="contato-telefone" placeholder="TELEFONE">
            <input type="email" id="contato-email" placeholder="E-MAIL">
            <input type="text" id="contato-pais" placeholder="PAÍS">
            <input type="text" id="contato-estado" placeholder="ESTADO">
            <input type="text" id="contato-cidade" placeholder="CIDADE">
            <textarea type="text" id="contato-mensagem" placeholder="MENSAGEM"></textarea>
            <button type="submit" id="contato-submit">ENVIAR</button>
         </form>
      </div>

<?php endwhile;
   echo '</main>';
endif; ?>

<?php get_footer(); ?>