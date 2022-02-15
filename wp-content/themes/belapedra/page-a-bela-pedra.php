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

            while (have_rows('gestao_itens')) : the_row();
                $id = get_sub_field('id');
                $titulo = get_sub_field('gestao_titulo');
                $imagem = get_sub_field('gestao_imagem');
                $imagem = $imagem['url'];
                // var_dump($imagem);   
?>

                <div id='open-<?= $id; ?>'>
                    <li>
                        <img src='<?= $imagem ?>'>
                        <p><?= $titulo ?></p>

                        <div class="popup" id="popup-<?= $id; ?>">
                            <div id="close">
                                <img src="<?= $imagem ?>">
                                <p><?= $titulo ?></p>
                                <div>
                                    <p><?= $textpopup ?></p>
                                </div>
                            </div>
                        </div>

        <?php
                echo '</li>';
                echo '</div>';
            endwhile;

            echo '<ul>';
            echo '</div>';
        }
        echo '</div>';

    //     <div class="abelapedra-gestao-imagens">
    //      <ul>    
    //         <li>
    //             <img src="/wp-content/themes/belapedra/assets/images/gestao-eco.png" alt="">
    //             <p>consciência ecológica</p>
    //         </li>
    //         <li>
    //             <img src="/wp-content/themes/belapedra/assets/images/gestao-helmet.png" alt="">
    //             <p style="margin-top: 30px;">segurança no trabalho</p>
    //         </li>
    //         <li>
    //             <img src="/wp-content/themes/belapedra/assets/images/gestao-teenager.png" alt="">
    //             <p>programa menor aprendiz</p>
    //         </li>
    //         <li>
    //             <img src="/wp-content/themes/belapedra/assets/images/gestao-presentation.png" alt="">
    //             <p margin-top: 23px;>treinamento dale carnegie</p>
    //         </li> 
    //     </ul>
    // </div>


    endwhile;
    echo '</main>';
endif; ?>
        <!-- <script src="/wp-includes/js/jquery/jquery.min.js"> </script> -->
        <script>
            console.log('teste');

            $(document).ready(function() {
                const open1 = $("#open-1");
                const open2 = $("#open-2");
                const open3 = $("#open-3");
                const open4 = $("#open-4");
                const popup1 = $('#popup-1');
                const popup2 = $('#popup-2');
                const popup3 = $('#popup-3');
                const popup4 = $('#popup-4');
                const close = document.getElementById('close');

                open1.addEventListener('click', () => {
                    popup1.classList.toggle('show');
                    console.log('abrindo...');
                });

                open2.addEventListener('click', () => {
                    popup2.classList.toggle('show');
                    console.log('abrindo...');
                });

                open4.addEventListener('click', () => {
                    popup4.classList.toggle('show');
                    console.lo4('abrindo...');
                });

                open4.addEventListener('click', () => {
                    popup4.classList.toggle('show');
                    console.log('abrindo...');
                });
            });
        </script>

        <?php
        get_footer(); ?>