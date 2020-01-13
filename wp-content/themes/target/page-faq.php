<?php
  /* Template Name: FAQ */

  get_header();
?>
<?php
  while(have_posts()) {
  the_post(); ?>
  <h2><?php the_title(); ?></h2>
<?php the_excerpt(); ?>

<?php }
?>

<?php $loop = new WP_Query( array( 'post_type' => 'faq', 'posts_per_page' => -1 ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
  <?php the_title(); ?>
  <?php the_content(); ?>
<?php endwhile; wp_reset_query(); ?>

<?php
  get_footer();
