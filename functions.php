<?php
// Menu superior


if (function_exists('register_nav_menus')) {
  register_nav_menus (array(
    'superior' => 'Menu arriba'
  ));
}


add_filter('nav_menu_link_attributes', 'class_menu_superior', 10, 3);

function class_menu_superior ($atts, $item, $args) {
  $class = 'nav-link';
  $atts['class'] = $class;
  return $atts;
}



?>
