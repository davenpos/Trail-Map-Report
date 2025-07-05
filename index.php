<?php get_header();
while (have_posts()):
  the_post(); ?>
  <h1><?php the_title(); ?></h1>
  <?php the_content();
  if (get_the_ID() === 18): ?>
    <div id="imageContainer">
      <img src="<?php echo wp_get_attachment_image_src(6, 'medium_large')[0]; ?>" />
    </div>
  <?php endif;
endwhile;
get_footer();