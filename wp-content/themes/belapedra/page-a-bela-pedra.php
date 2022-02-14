<?php get_header();

/* Template Name: A Bela Pedra página */
?>


<?php if (have_posts()) : ?>
    <main id="page-abelapedra">
        <?php
        while (have_posts()) : the_post();
            the_post_thumbnail('post-thumbnail', array('class' => 'local_bela_pedra'));

            echo '<div class="abelapedra-conteudo">';
            the_title('<h2>', '</h2>');
            the_title('<h2>', '</h2>');
            the_title('<h2>', '</h2>');
            the_title('<h2>', '</h2>');
            the_title('<h2>', '</h2>');
            the_title('<h2>', '</h2>');
            the_title('<h2>', '</h2>');
            the_title('<h2>', '</h2>');
            the_title('<h2>', '</h2>');
            the_content();
            echo '</div>';
        endwhile; ?>
    </main>
<?php
endif;

get_footer(); ?>