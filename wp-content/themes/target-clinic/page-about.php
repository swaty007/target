<?php
/* Template Name: About */

get_header();
the_post();
?>



<?php get_template_part('template-parts/sections', 'color'); ?>
    <main class="content">
        <section class="section content--bg-img title-block title--about"
                 style="background-image: linear-gradient(180deg, rgba(16, 37, 85, 0.7) 20%, rgba(0, 35, 118, 0.6) 99.31%), url(<?php the_post_thumbnail_url() ?>)">
            <div class="wrapper">
                <div class="section__content">
                    <div class="text--18 breadcrumb__alex">
                    <?php the_breadcrumb() ?>
                    </div>
                    <h1 class="text--48">
                        <?php the_title() ?>
                    </h1>
                    <div class="text--18">
                        <?php the_excerpt() ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="section about-clinic section--large-text">
            <div class="wrapper w-920px">
                <?php the_content(); ?>



                <div class="title-box flex-block">
                    <div class="title-text title--small">
                        <?= get_post_meta($post->ID,'task_title', true) ?>
                    </div>
                </div>
                <div class="info-box info-box--text flex-block">
                    <?php while (have_rows('task')): the_row();?>
                        <div class="info-box__item">
                            <div class="left-img-text">
                                <img src="<?= get_url_from_img_id(get_sub_field('img')) ;?>" alt="">
                                <p class="title-img font-normal">
                                    <?php the_sub_field('title')?>
                                </p>
                            </div>
                        </div>
                    <?php endwhile;?>
                </div>
            </div>
        </section>
        <section class="section about-clinic section--map">
            <div class="wrapper">
                <h3 class="title--small">
                    <?php pll_e('География наших пациентов');?>
                </h3>
                <div class="map-group">
                    <?php get_template_part('template-parts/sections', 'maps'); ?>

                </div>
            </div>
        </section>
        <section class="section about-clinic work-principles">
            <div class="wrapper">
                <h3 class="title--small">
                    <?= get_post_meta($post->ID,'principles_title', true) ?>
                </h3>
                <div class="info-box info-box--text flex-block">
                    <?php while (have_rows('principles')): the_row();?>
                        <div class="info-box__item">
                            <div class="top-img-text">
                                <img src="<?= get_url_from_img_id(get_sub_field('img')) ;?>" alt="">
                                <p class="title-img font-normal">
                                    <?php the_sub_field('title')?>
                                </p>
                            </div>
                        </div>
                    <?php endwhile;?>
                </div>
                <?php if( have_rows('gallery') ):?>
                <div class="gallery">
                    <h3 class="title--small">
                        <?= get_post_meta($post->ID,'gallery_title', true) ?>
                    </h3>
                    <div class="gallery__nav">
                        <?php $count=0; while (have_rows('gallery')): the_row();?>
                            <div data-click="#gallery-<?=$count?>" class="gallery__nav-item text <?php if($count === 0) echo 'active'?>"><?php the_sub_field('title')?></div>
                        <?php $count++;endwhile;?>
                    </div>
                    <?php $count=0; while (have_rows('gallery')): the_row();?>
                        <div id="gallery-<?=$count?>" class="gallery-content <?php if($count === 0) echo 'show-gallery'?>">
                            <div class="slider">
                                <div class="slick-horizontal">
                                    <?php foreach (get_sub_field('images') as $img):?>
                                        <div class="slick-item">
                                            <a href="<?= get_url_from_img_id($img['img']) ;?>" data-fancybox="gallery<?=$count;?>" rel="gallery">
                                                <img src="<?= get_url_from_img_id($img['img']) ;?>" class="gallery-content__item" alt="">
                                            </a>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                        <?php $count++;endwhile;?>
                </div>
                <?php endif?>
                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
//                    if (comments_open() || get_comments_number()) :
//                        comments_template();
//                    endif; ?>
            </div>
        </section>
    </main>
    <img src="<?php bloginfo('template_url'); ?>/img/uil-clock.svg" alt="location">
<?= get_post_meta($post->ID,'address', true) ?>


<?php
get_footer();
?>
