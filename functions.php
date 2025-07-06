<?php
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('scss', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('snowburst-font', '//fonts.googleapis.com/css2?family=Snowburst+One&display=swap');
  wp_enqueue_script('main-js', get_theme_file_uri('/build/index.js'), array('jquery'), false, true);

  wp_localize_script('main-js', 'siteData', array(
    'trailData' => get_option('latest_report_data')
  ));
});

add_action('after_setup_theme', function () {
  add_theme_support('title-tag');
});

add_action('wpcf7_mail_sent', function ($form) {
  $submission = WPCF7_Submission::get_instance();

  if ($submission) {
    $data = $submission->get_posted_data();
    update_option('latest_report_data', $data);
  }
});