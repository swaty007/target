<?php
/* Template Name: About */

get_header();
the_post();
?>




    <main class="content">
        <section class="section content--bg-img title-block title--about"
                 style="background-image: linear-gradient(180deg, rgba(16, 37, 85, 0.7) 20%, rgba(0, 35, 118, 0.6) 99.31%), url(<?php the_post_thumbnail_url() ?>)">
            <div class="wrapper">
                <div class="section__content">
                    <h3 class="text--18 breadcrumb__alex">
                    <?php the_breadcrumb() ?>
                    </h3>
                    <h1 class="text--48">
                        <?php the_title() ?>
                    </h1>
                    <h4 class="text--18">
                        <?php the_excerpt() ?>
                    </h4>
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
                    География наших пациентов
                </h3>
                <div class="map-group">
                    <img src="<?php bloginfo('template_url'); ?>/img/map_ukraine.svg" class="map_ukraine" alt="">
                    <div class="map-group__clients">
                        <h5 class="text map--title">
                            А также лечим пациентов из таких стран:
                        </h5>
                        <p>
                            <img src="<?php bloginfo('template_url'); ?>/img/flag-italy.svg" alt="">
                            Италия - 5 пациентов
                        </p>
                        <p>
                            <img src="<?php bloginfo('template_url'); ?>/img/flag-greece.svg" alt="">
                            Греция - 10 пациентов
                        </p>
                        <p>
                            <img src="<?php bloginfo('template_url'); ?>/img/flag-russia.svg" alt="">
                            Россия - 15 пациентов
                        </p>
                    </div>
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
                <div class="gallery">
                    <h3 class="title--small">
                        Галлерея
                    </h3>
                    <div class="gallery__nav">
                        <div data-click="#gallery-1" class="gallery__nav-item text active">Оборудование</div>
                        <div data-click="#gallery-2" class="gallery__nav-item text">Лечебный процесс</div>
                        <div data-click="#gallery-3" class="gallery__nav-item text">Интерьер</div>
                        <div data-click="#gallery-4" class="gallery__nav-item text">Врачи</div>
                    </div>
                    <div id="gallery-1" class="gallery-content show-gallery">
                        <div class="slider">
                            <div class="slick-horizontal">
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal1.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal2.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal3.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal4.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal5.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal6.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal7.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal8.png" class="gallery-content__item" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="gallery-2" class="gallery-content">
                        <div class="slider">
                            <div class="slick-horizontal">
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal1.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal2.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal3.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal4.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal5.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal6.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal7.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal8.png" class="gallery-content__item" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="gallery-3" class="gallery-content">
                        <div class="slider">
                            <div class="slick-horizontal">
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal1.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal2.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal3.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal4.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal5.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal6.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal7.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal8.png" class="gallery-content__item" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="gallery-4" class="gallery-content">
                        <div class="slider">
                            <div class="slick-horizontal">
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal1.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal2.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal3.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal4.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal5.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal6.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal7.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal8.png" class="gallery-content__item" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif; ?>
            </div>
        </section>
    </main>


    <img src="<?php bloginfo('template_url'); ?>/img/uil-clock.svg" alt="location">
<?= get_post_meta($post->ID,'address', true) ?>


<?php
get_footer();
