<?php
/* Template Name: Contact */

get_header();
the_post();
?>
<?php get_template_part('template-parts/sections', 'color'); ?>
    <main class="content">
        <section class="section title-block default-title default-title-small bg-img-contacts"
                 style="background-image: url(<?php the_post_thumbnail_url() ?>);">
            <div class="wrapper">
                <div class="section__content">
                    <h3 class="text--18 breadcrumb__alex">
                    <?php the_breadcrumb() ?>
                    </h3>
                    <h1 class="text--48 default-title__text">
                        <?php the_title() ?>
                    </h1>
                    <div class="text--18 default-title__subtext">
                        <?php the_excerpt() ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section--default">
            <div class="wrapper">
                <div class="wrapper-920-left">
                    <div class="contact-info">
                        <div class="address-block flex-block text">
                            <div class="item__address">
                                <img src="<?php bloginfo('template_url'); ?>/img/uil-clock.svg" alt="location">
                                <?= get_post_meta($post->ID,'address', true) ?>
                            </div>
                            <div class="item__address">
                                <img src="<?php bloginfo('template_url'); ?>/img/uil-map-marker.svg" alt="location">
                                <?= get_post_meta($post->ID,'working_time', true) ?>
                            </div>
                        </div>
                        <div class="phones flex-block">
                        <?php
                        while (have_rows('phone')): the_row();?>
                            <a href="tel:+<?= preg_replace( '/[^0-9]/', '', the_sub_field('phone') )?>"><?=the_sub_field('phone')?></a>
                        <?php endwhile;?>
                        </div>
                    </div>
                    <section class="section--large-text">
                        <?= $meta_data = get_post_meta($post->ID, 'map', true);?>
                        <?php the_content(); ?>
                    </section>
                    <?php get_template_part('template-parts/sections', 'contact-form-callback'); ?>
                </div>
            </div>
        </section>
    </main>
<?php $loop = new WP_Query( array( 'post_type' => 'contact', 'posts_per_page' => -1 ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<?php endwhile; wp_reset_query(); ?>

<?php
get_footer();
