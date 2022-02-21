<?php get_header();

$title = get_field('page_title');
$description = get_field('description_test');
$other_description = get_field('other_description');

$banners = get_field('banners');
?>


<?php if (have_posts()) :
   echo '<main id="page-abelapedra">';
   while (have_posts()) : the_post();
      the_post_thumbnail('post-thumbnail', array('class' => 'home-thumbnail'));


   endwhile;
   echo '</main>';
endif; ?>


<?php get_footer(); ?>