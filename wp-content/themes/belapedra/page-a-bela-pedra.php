<?php get_header();

/* Template Name: A Bela Pedra página */

$text = get_field('text');
$sustentabilidade = get_field('sustentabilidade');
$gestao = get_field('gestao_pessoas');
$rows = get_field('gestao_itens');
$textpopup = get_field('popups');
?>


<?php if (have_posts()) :
    echo '<main id="page-abelapedra">';
    while (have_posts()) : the_post();
        the_post_thumbnail('post-thumbnail', array('class' => 'local_bela_pedra'));

        echo '<div class="abelapedra-conteudo">';
        echo $text;
        echo '</div>';

        echo '<div class="abelapedra-sustentabilidade">';
        echo $sustentabilidade;
        echo '</div>';

        echo '<div class="abelapedra-gestao">';
        echo '<div class="abelapedra-gestao-texto">';
        echo $gestao;
        echo '</div>';

        if (have_rows('gestao_itens')) {
            echo '<div class="abelapedra-gestao-imagens">';
            echo '<ul>';
            echo '<div class="close">';
            echo '<img src="/wp-content/themes/belapedra/assets/images/delete.png" class="popup-delete">';
            echo '</div>';
            while (have_rows('gestao_itens')) : the_row();
                $id = get_sub_field('id');
                $titulo = get_sub_field('gestao_titulo');
                $imagem = get_sub_field('gestao_imagem');
                $imagem = $imagem['url'];
                // var_dump($imagem);
?>
                <div class="item">
                    <li>
                        <img src='<?= $imagem ?>'>
                        <p><?= $titulo ?></p>
                    </li>

                    <div class="popup" id="popup-<?= $id; ?>">
                        <div>
                            <img src="<?= $imagem ?>">
                            <p><?= $titulo ?></p>
                            <div>
                                <p><?= $textpopup ?></p>
                            </div>
                        </div>
                    </div>
                </div>

<?php
            endwhile;
            echo '</ul>';
            echo '</div>';
        }
        echo '</div>';

    endwhile;
    echo '</main>';
endif; ?>


<?php
get_footer(); ?>