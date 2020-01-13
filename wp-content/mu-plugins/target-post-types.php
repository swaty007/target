<?php

function target_post_types() {

    // Lot UA Post type
//    register_post_type('lotua', array(
//      'supports' => array('title', 'thumbnail'),
//      'rewrite' => array('slug' => 'lotsua'),
//      'has_archive' => true,
//      'show_in_rest' => true,
//      'public' => true,
//      'labels' => array(
//        'name' => 'Lots UA',
//        'add_new_item' => 'Add New UA Lot',
//        'edit_item' => 'Edit UA Lot',
//        'all_items' => 'All UA Lots',
//        'singular_name' => 'Lot UA'
//      ),
//      'menu_icon' => 'dashicons-awards'
//    ));

  // FAQ Post type
  register_post_type('faq', array(
    'supports' => array('title', 'editor'),
    'public' => true,
    'labels' => array(
      'name' => 'FAQ',
      'add_new_item' => 'Add New Question/Answer',
      'edit_item' => 'Edit Question/Answer',
      'all_items' => 'All Questions/Answers',
      'singular_name' => 'FAQ'
    ),
    'menu_icon' => 'dashicons-list-view'
  ));

    register_post_type('services', array(
      'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
      'public' => true,
      'labels' => array(
        'name' => 'Services',
        'add_new_item' => 'Add New Service',
        'edit_item' => 'Edit Service',
        'all_items' => 'All Services',
        'singular_name' => 'Service'
      ),
      'menu_icon' => 'dashicons-thumbs-up'
    ));

    register_post_type('doctor', array(
    'supports' => array('title', 'editor', 'thumbnail', 'comments', 'excerpt'),
    'public' => true,
    'labels' => array(
      'name' => 'Doctors',
      'add_new_item' => 'Add New Doctor',
      'edit_item' => 'Edit Doctor',
      'all_items' => 'All Doctors',
      'singular_name' => 'Doctor'
    ),
    'menu_icon' => 'dashicons-list-view'
  ));

}

add_action('init', 'target_post_types');
