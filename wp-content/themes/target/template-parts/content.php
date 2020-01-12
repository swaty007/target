<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gns-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php
		if ( is_singular() ) :?>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?php gns_theme_post_thumbnail(); ?>
            </div>
        </div>
		<?php else :
            gns_theme_post_thumbnail();
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
	</header><!-- .entry-header -->

    <?php if ( is_singular() ) : ?>
    <!--        ROW START-->
    <div class="row blog__social--sticky">
        <div class="col-md-10 col-md-push-1">

            <?php

            the_title( '<h1 class="entry-title">', '</h1>' );
            endif;?>
            <?php if ( 'post' === get_post_type() ) :?>
            <div class="entry-meta">
                <?php
                gns_theme_posted_by();
                gns_theme_posted_on();
                ?>
            </div><!-- .entry-meta -->
            <?php endif; ?>
	<div class="entry-content">
		<?php
        if ( is_singular() ) {
            the_content( sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'gns-theme' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ) );
        } else {
            the_excerpt();
        }

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gns-theme' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer hidden">
		<?php gns_theme_entry_footer(); ?>
	</footer><!-- .entry-footer -->

            <?php if ( is_singular() ) : ?>
        </div>
        <div class="col-md-1 col-md-pull-10">

            <ul id="blog__social" class="blog__social">
                <li>
                    <a href="https://www.facebook.com/ITGNS"
                       data-count="facebook"
                       target="_blank"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="https://twitter.com/GNS_IT"
                       data-count="twitter"
                       target="_blank">
                        <i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="https://twitter.com/GNS_IT"
                       data-count="telegram"
                       target="_blank">
                        <i class="fa fa-telegram"></i></a>
                </li>
            </ul>

        </div>
    </div>
    <!--        ROW END-->
    <?php endif;?>

    <?php if (!is_singular()):?>
    <a href="<?= get_permalink(); ?>" class="entry-btn">
        read more
    </a>
    <?php endif;?>
</article><!-- #post-<?php the_ID(); ?> -->
