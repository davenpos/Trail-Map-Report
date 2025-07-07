<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <nav>
    <?php $pagesList = wp_list_pages(array(
      'title_li' => null,
      'echo' => false
    ));

    $pagesArray = explode("</li>", $pagesList);
    foreach ($pagesArray as $key => $page) {
      $output = $page . "</li>";
      if ($key === 0)
        $output .= " | ";
      echo $output;
    }
    ?>
  </nav>
  <main>