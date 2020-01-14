<?php

get_header();

while(have_posts()) {
    the_post(); ?>1
    <h2><?php the_title(); ?></h2>2
    <?php the_content(); ?>3
    <?= get_post_meta( $post->ID, 'position', true ) ;?>4
    <?= get_post_meta( $post->ID, 'experience', true ) ;?>5
    <?= get_post_meta( $post->ID, 'certificates', true ) ;?>6
    <?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>7
    <?php the_excerpt()?>8

<?php }

get_footer();

?>
