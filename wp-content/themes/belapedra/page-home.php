<?php get_header();

$title = get_field('page_title');
$description = get_field('description_test');
$other_description = get_field('other_description');
$thumbnail = get_field('banners');
shuffle($thumbnail);
$thumbnail = $thumbnail[0];
$thumbnail = $thumbnail['url'];


?>


<?php if (have_posts()) :
   echo '<main id="page-abelapedra">';
   while (have_posts()) : the_post();
?>
      <div class="thumbnail-principal" style="background-image: url(<?= $thumbnail ?>);">
         <h1> <?= $title ?> </h1>
      </div>


<?php
   endwhile;
   echo '</main>';
endif;


get_footer(); ?>