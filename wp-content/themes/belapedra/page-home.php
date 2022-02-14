<?php get_header();

$title = get_field('page_title');
$description = get_field('description_test');
$other_description = get_field('other_description');

$banners = get_field('banners');
?>


<section class="page">
   <div class="container">

      <!-- LOOP DO WORDPRESS -->
      <?php if (have_posts()) :
         while (have_posts()) : the_post();
            the_post_thumbnail(); ?>
            <h1><?php the_title(); ?></h1>
      <?php the_content();
         endwhile;
      else : endif; ?>

      <?php if ($title) : ?>
         <h1><?php echo $title ?></h1>
      <?php endif; ?>

      <?php if ($other_description) : ?>
         <?php echo $other_description ?>
      <?php endif; ?>

      <!-- <?php if ($banners) : ?>

         <?php foreach ($banners as $banner) : ?>

            <img src="<?= $banner['sizes']['banners'] ?>" alt="" class="img-fluid">

         <?php endforeach ?>

      <?php endif; ?> -->


   </div>
</section>

<?php get_footer(); ?>