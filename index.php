<?php get_header();
while (have_posts()):
  the_post(); ?>
  <h1><?php the_title(); ?></h1>
  <?php the_content();
  if (is_page(18)): ?>
    <div id="imageContainer">
      <img src="<?php echo wp_get_attachment_image_src(6, 'medium_large')[0]; ?>"
        alt="<?php echo get_post_meta(6, '_wp_attachment_image_alt', true); ?>" usemap="#trail-map" />
      <map name="trail-map">
        <area alt="Rock Island Run"
          coords="240,444,213,453,182,411,135,367,121,342,123,326,148,285,153,277,208,255,211,271,183,293,167,311,155,332,151,350,162,363,193,385,203,395"
          shape="poly">
        <area alt="Beginner's Luck" coords="351,793,358,771,388,765,436,741,468,756,481,764,498,770,465,777,430,777,399,784"
          shape="poly">
        <area alt="Lower Omigosh"
          coords="241,445,216,454,213,484,223,493,235,509,235,523,229,540,225,554,238,569,251,593,274,611,299,636,307,644,327,649,340,608,333,598,314,584,300,573,288,554,283,538,285,519,279,501,262,473,253,457"
          shape="poly">
        <area alt="Alley Cat" coords="253,370,224,391,241,265,263,271,256,285,252,301" shape="poly">
        <area alt="Wolf Creek Hollow"
          coords="191,625,175,740,208,730,253,689,251,675,273,660,265,651,253,648,244,644,235,633,221,630,213,629,204,624"
          shape="poly">
      </map>
    </div>
  <?php endif;
endwhile;
get_footer();