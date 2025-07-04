<?php
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('scss', get_theme_file_uri('/build/style-index.css'));
});