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


// imageaffinematrixget

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    // set_post_thumbnail_size( 150, 150, true ); // default Featured Image dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    // add_image_size( 'category-thumb', 300, 9999 ); // 300 pixels wide (and unlimited height)
 }

add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="ieo-btn --orange mx-1"';
}
function posts_link_attributes_2() {
    return 'class="ieo-btn --orange mx-1"';
}

// function generate_btn_pages($current, $max, $options =  array()) {
//   if(!empty($options)) {
//     $classBtn = $option['classBtn'];
//     $show = $option['show'];
//   } else {
//     $classBtn = 'btn';
//     $show = 2;
//   }
//
//   $current = $current;
//   $max = $max;
//   $showMin = 1;
//   $showMax = $max;
//
//   if ($current > 1 && $current < $max) {
//     if($current > $show && $current+$show < $max) {
//       $showMin = $current - $show;
//       $showMax = $current + $show;
//     } else {
//       $showMin = $current - $show;
//       $showMax = $current + $show;
//     }
//
//   } elseif ($current > $show ) {
//     $showMin = $current - $show*2;
//   } else {
//     $showMax = $current + $show * 2;
//   }
//
//
//
//
//   foreach (range($showMin, $showMax) as $número) {
//     echo $número;
//   }
//   // while($minShow <= $maxShow and ) {
//   //   if($minShow == $current) {
//   //       echo ' - |'. $minShow . '| - ';
//   //   } else {
//   //       echo ' - '. $minShow . ' - ';
//   //   }
//   //
//   //   $minShow++;
//   //
//   // }
//
//
//
//
// }


// *How to add numeric pagination in your WordPress theme*/

function wordpress_numeric_post_nav() {
    if( is_singular() )
        return;
    global $wp_query;
    /* Stop the code if there is only a single page page */
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    /*Add current page into the array */
    if ( $paged >= 1 )
        $links[] = $paged;
    /*Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div class="row justify-content-center">' . "\n";
    /*Display Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '%s' . "\n", get_previous_posts_link( '<i class="zmdi zmdi-chevron-left"></i> Mas recientes' ) );
    /*Display Link to first page*/
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? 'active' : '';
        printf( '<a class="%s ieo-btn --orange mx-1" href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
        if ( ! in_array( 2, $links ) )
            echo '<a>…</a>';
    }
    /* Link to current page */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? 'active' : '';
        printf( '<a class="%s ieo-btn --orange mx-1" href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    /* Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<a>…</a>' . "\n";
        $class = $paged == $max ? 'active' : '';
        printf( '<a class="%s ieo-btn --orange mx-1" href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '%s' . "\n", get_next_posts_link('Ver mas publiaciones <i class="zmdi zmdi-chevron-right"></i>') );
    echo '</div>' . "\n";
}


add_filter('show_admin_bar', '__return_false');



// sidebar

add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
   /* Register the 'primary' sidebar. */
   register_sidebar(
       array(
           'id'            => 'primary',
           'name'          => __( 'Primary Sidebar' ),
           'description'   => __( 'A short description of the sidebar.' ),
           'before_widget' => '<div id="%1$s" class="widget %2$s my-3">',
           'after_widget'  => '</div>',
           'before_title'  => '<h3 class="widget-title">',
           'after_title'   => '</h3>',
       )
   );
   /* Repeat register_sidebar() code for additional sidebars. */
}

?>
