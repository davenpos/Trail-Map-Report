<?php
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('scss', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('snowburst_font', '//fonts.googleapis.com/css2?family=Snowburst+One&display=swap');
});

add_action('after_setup_theme', function () {
  add_theme_support('title-tag');
});