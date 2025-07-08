<?php
add_action("wp_enqueue_scripts", function () {
  wp_enqueue_style("main-css", get_theme_file_uri("/build/style-index.css"), [], filemtime(get_theme_file_path("/build/style-index.css")));
  wp_enqueue_script("main-js", get_theme_file_uri("/build/index.js"), array("jquery"), false, true);
  wp_localize_script("main-js", "siteData", array(
    "trailData" => get_option("latest_report_data")
  ));
  if (is_page(8)) {
    wp_enqueue_style("form-css", get_theme_file_uri("/build/css/form.css"), [], filemtime(get_theme_file_path("/build/css/form.css")));
    wp_enqueue_style("mountains-css", get_theme_file_uri("/build/css/mountains.css"), [], filemtime(get_theme_file_path("/build/css/mountains.css")));
    wp_enqueue_style("cloud-css", get_theme_file_uri("/build/css/cloud.css"), [], filemtime(get_theme_file_path("/build/css/cloud.css")));
  }
  if (is_page(18)) {
    wp_enqueue_style("image-map-css", get_theme_file_uri("/build/css/imagemap.css"), [], filemtime(get_theme_file_path("/build/css/imagemap.css")));
  }
});

add_action("after_setup_theme", function () {
  add_theme_support("title-tag");
});

add_action("wpcf7_mail_sent", function ($form) {
  $submission = WPCF7_Submission::get_instance();

  if ($submission) {
    $data = $submission->get_posted_data();
    update_option("latest_report_data", $data);
  }
});

add_filter("ai1wm_exclude_themes_from_export", function ($exclude) {
  $exclude[] = "trailmapreport/node_modules";
  $exclude[] = "trailmapreport/.git";
  $exclude[] = "trailmapreport/.gitignore";
  return $exclude;
});

add_filter("wpcf7_skip_mail", "__return_true");