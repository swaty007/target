<?php
/* Template Name: Doctors */

get_header();
?>


<?php $loop = new WP_Query( array( 'post_type' => 'doctor', 'posts_per_page' => -1 ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<?php endwhile; wp_reset_query(); ?>

<?php
get_footer();
