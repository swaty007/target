<?php

function target_post_types() {
  // Lot Post type
  // register_post_type('lotusa', array(
  //   'supports' => array('title', 'thumbnail'),
  //   'rewrite' => array('slug' => 'lotsusa'),
  //   'has_archive' => true,
  //   'show_in_rest' => true,
  //   'public' => true,
  //   'labels' => array(
  //     'name' => 'Lots USA',
  //     'add_new_item' => 'Add New USA Lot',
  //     'edit_item' => 'Edit USA Lot',
  //     'all_items' => 'All Lots',
  //     'singular_name' => 'Lot USA'
  //   ),
  //   'menu_icon' => 'dashicons-awards'
  // ));

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

    // Reviews Post type
    register_post_type('reviews', array(
      'supports' => array('title', 'thumbnail'),
      'public' => true,
      'labels' => array(
        'name' => 'Reviews',
        'add_new_item' => 'Add New Review',
        'edit_item' => 'Edit Review',
        'all_items' => 'All Review',
        'singular_name' => 'Review'
      ),
      'menu_icon' => 'dashicons-thumbs-up'
    ));

    register_post_type('doctor', array(
    'supports' => array('title', 'editor', 'thumbnail', 'comments'),
    'public' => true,
    'labels' => array(
      'name' => 'Success Stories',
      'add_new_item' => 'Add New Doctor',
      'edit_item' => 'Edit Doctor',
      'all_items' => 'All Doctor',
      'singular_name' => 'Doctor'
    ),
    'menu_icon' => 'dashicons-list-view'
  ));

}

add_action('init', 'target_post_types');
