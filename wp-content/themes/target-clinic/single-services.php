<?php

get_header();
the_post(); ?>

    <main class="content">
        <section class="section content--bg-img title-block default-title default-title-small bg-img-chemotherapy"
        style="background-image: url(<?php the_post_thumbnail_url() ?>)">
            <div class="wrapper">
                <div class="section__content">
                    <h3 class="text--18 breadcrumb__alex">
                    <?php the_breadcrumb() ?>
                    </h3>
                    <h1 class="text--48 default-title__text">
                        <?php the_title() ?>
                    </h1>
                    <h4 class="text--18 default-title__subtext">
                        <?php the_excerpt() ?>
                    </h4>
                </div>
            </div>
        </section>
        <section class="section section--default">
            <div class="wrapper">
                <div class="wrapper-920-left">
                    <div class="section--large-text">
                        <?php the_content(); ?>

                        <div class="simple-gallery">
                            <?php $count = 0; foreach ( lot_album_url_array(explode(',', get_post_meta( $post->ID, 'gallery', true ))) as $img): $count++ ;?>
                                <img class="simple-gallery__item <?= $count%3 === 0 ? 'big-image' : '';?>" src="<?= $img;?>" alt="">
                            <?php endforeach; ?>
                        </div>
                        <?php get_template_part('template-parts/sections', 'contact-form-callback'); ?>
                    </div>
                </div>
            </div>

        </section>
    </main>
<?php
get_footer();

?>
