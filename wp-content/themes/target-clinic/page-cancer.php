<?php
/* Template Name: Treatment cancer  */

get_header();
the_post();
?>


    <main class="content">
        <section class="section title-block default-title default-title-small bg-img-treatment"
                 style="background-image: url(<?php the_post_thumbnail_url() ?>);">
            <div class="wrapper">
                <div class="section__content">
                    <h3 class="text--18 breadcrumb__alex">
                    <?php the_breadcrumb() ?>
                    </h3>
                    <h1 class="text--48 default-title__text">
                        <?php the_title(); ?>
                    </h1>
                    <div class="text--18 default-title__subtext">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section--default">
            <div class="wrapper">
                <div class="wrapper-920-left">
                    <section class="section--large-text section-treatment">
                        <?php the_content(); ?>

                        <div class="cancel-types">
                            <?php $loop = new WP_Query( array( 'post_type' => 'cancer', 'posts_per_page' => -1 ) ); ?>
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <a class="cancel-types__item" href="<?php the_permalink(); ?>" target="_blank">
                                    <img src="<?= get_url_from_img_id(get_post_meta( $post->ID, 'icon', true )) ;?>" />
                                    <p class="cancel-type__name"> <?php the_title(); ?></p>
                                </a>
                            <?php endwhile; wp_reset_query(); ?>
                        </div>

                        <?=get_post_meta( $post->ID, 'content', true )?>

                        <div class="info-box info-box--text info-box-w260 flex-block">
                            <?php $loop = new WP_Query(array('post_type' => 'advantages', 'posts_per_page' => -1)); ?>
                            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                <div class="info-box__item">
                                    <div class="left-img-text">
                                        <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail();
                                        } ?>
                                        <p>
                                            <?php the_title(); ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_query(); ?>
                        </div>
                        <?php get_template_part('template-parts/sections', 'contact-form-callback'); ?>
                    </section>
                    <?php get_template_part('template-parts/sections', 'dropdown-seo'); ?>
                </div>
            </div>
        </section>
    </main>



<?php
get_footer();
