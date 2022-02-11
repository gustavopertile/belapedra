<?php get_header();?>


<section class="page">
    <div class="container">



                <h1><?php echo get_the_archive_title();?></h1>
            
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php the_content(); ?>

                <?php endwhile; else: endif; ?>



    </div>
</section>

<?php get_footer();?>