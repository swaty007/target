<?php
get_header();
?>

<?php //get_template_part('template-parts/sections', 'main-screen'); ?>


<main class="content">

    <section class="section content--bg-img title-block" style="background-image:url(<?php the_post_thumbnail_url()?>">
        <div class="wrapper">
            <div class="section__content">
                <h3 class="text--18">
                    Онкологическая клиника
                </h3>
                <h1 class="text--48">
                    Инновационные методы лечения рака
                </h1>
                <h4 class="text--18">
                    Помогаем в самых сложных консультациях
                </h4>
            </div>

            <div class="flex-block">
                <button type="button" class="button button--secondary button--white">
                    Записаться на прием
                </button>
                <div class="address-block flex-block text--14">
                    <div class="item__address">
                        <img src="<?php bloginfo('template_url'); ?>/img/uil-clock.svg" alt="location">
                        Киев, п-р Воздухофлотский 71/3
                    </div>
                    <div class="item__address">
                        <img src="<?php bloginfo('template_url'); ?>/img/uil-map-marker.svg" alt="location">
                        Пн-Пт с 08:00 до 17:00
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section--about section--about--clinic section-bg--green">
        <div class="wrapper">
            <img src="<?php bloginfo('template_url'); ?>/img/bg/bg-type-img.svg" class="bg-img" alt="">
            <div class="title-box title-box--line title-box--white flex-block">
                <div class="line w-155"></div>
                <div class="title-text title--sub">
                    О клинике
                </div>
                <div class="title-subtext text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit pharetra, tortor aliquet fusce. Lorem
                    duis nisi, tortor auctor orci, facilisis sed pulvinar. Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit. Sit pharetra, tortor aliquet fusce. Lorem duis nisi, tortor auctor orci, facilisis
                    sed pulvinar.
                </div>
            </div>
            <div class="slider">
                <div class="slick-vertical">
                    <div class="slick-item">
                        <img src="<?php bloginfo('template_url'); ?>/html/assets/images/DSC_9463.png" alt="">
                    </div>
                    <div class="slick-item">
                        <img src="<?php bloginfo('template_url'); ?>/html/assets/images/DSC_9463.png" alt="">
                    </div>
                    <div class="slick-item">
                        <img src="<?php bloginfo('template_url'); ?>/html/assets/images/DSC_9463.png" alt="">
                    </div>
                    <div class="slick-item">
                        <img src="<?php bloginfo('template_url'); ?>/html/assets/images/DSC_9463.png" alt="">
                    </div>
                </div>
                <p class="text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit pharetra, tortor aliquet fusce.
                    Lorem duis nisi, tortor auctor orci, facilisis sed pulvinar.
                </p>
            </div>
        </div>
    </section>

    <section class="section--about section--about--services">
        <div class="wrapper">

            <div class="title-box title-box--line flex-block">
                <div class="line w-205 line-green"></div>
                <div class="title-text title--sub">
                    Услуги
                </div>
                <div class="title-subtext text">
                    Tempus, a gravida vitae aliquet at laoreet penatibus pharetra. Ac elementum ipsum posuere tortor.
                    Fringilla dictumst quam cras vel nec diam...
                </div>
            </div>

            <div class="info-box info-box--text flex-block">
                <?php $loop = new WP_Query(array('post_type' => 'services', 'posts_per_page' => -1)); ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="info-box__item">
                        <div class="left-img-text">
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail();
                            } ?>
                            <p class="title-img">
                                <?php the_title(); ?>
                            </p>
                        </div>
                        <p class="info-text">
                            <?php the_excerpt(); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" target="_blank" class="link green">
                            Узнать детальнее
                        </a>
                    </div>
                <?php endwhile;
                wp_reset_query(); ?>
            </div>

        </div>
    </section>

    <section class="section--about section--about--advantages section-bg--blue">
        <div class="wrapper">
            <div class="title-box title-box--line flex-block">
                <div class="line w-75"></div>
                <div class="title-text title--sub">
                    Преимущества
                </div>
                <div class="title-subtext text">
                    Tempus, a gravida vitae aliquet at laoreet penatibus pharetra. Ac elementum ipsum posuere tortor.
                    Fringilla dictumst quam cras vel nec diam...
                </div>
            </div>
            <div class="content-image-box">
                <div class="content-block image-box">
                    <img src="<?php bloginfo('template_url'); ?>/img/large-microsc.svg" alt="">
                </div>
                <div class="content-block info-box info-box--text flex-block">
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
            </div>
        </div>
    </section>

    <section class="section--about section--blog">
        <div class="wrapper">
            <div class="title-box title-box--line flex-block">
                <div class="line w-255 line-green"></div>
                <div class="title-text title--sub">
                    Блог
                </div>
                <div class="title-subtext text">
                    Tempus, a gravida vitae aliquet at laoreet penatibus pharetra. Ac elementum ipsum posuere tortor.
                    Fringilla dictumst quam cras vel nec diam...
                </div>
            </div>

            <div class="content-image-box content-link-box">

                <?php $loop = new WP_Query(array('post_type' => 'post', 'posts_per_page' => -1)); ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="link-box">
                        <div class="link-box__image">
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail();
                            } ?>
                        </div>
                        <div class="link-box__text">
                            <h2 class="text--20">
                                <?php  the_title(); ?>
                            </h2>
                            <p class="text--16">
                                <?php the_excerpt() ?>
                            </p>
                        </div>
                        <div class="link-box__footer">
                            <p class="link-box-date">
                                <?php the_date(); ?>
                            </p>
                            <img src="assets/images/arrow-right.svg" alt="">
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
            <a href="<?= get_permalink( get_option( 'page_for_posts' ) ); ?>" class="button button--secondary button--green">
                Смотреть все статьи
            </a>
        </div>
    </section>

</main>





<?php get_footer();
?>
