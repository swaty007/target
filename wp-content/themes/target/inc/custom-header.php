<?php
// свой класс построения меню:
function add_menu_link_class($atts, $item, $args)
{
    $atts['class'] = 'nav__link';
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);
function atg_menu_classes($classes, $item, $args) {
//    if($args->theme_location == 'secondary') {
    $classes[] = 'nav__item';
//    }
    return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);


function my_nav_menu_submenu_css_class( $classes ) {
    $classes[] = 'link__menu';
    return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'my_nav_menu_submenu_css_class' );