<?php
/* Template Name: Main Page */
get_header();
the_post();
?>

<?php //get_template_part('template-parts/sections', 'main-screen'); ?>

<?php get_template_part('template-parts/sections', 'color'); ?>
<main class="content">

    <section class="section content--bg-img title-block" style="background-image:url(<?php the_post_thumbnail_url()?>)">
        <div class="wrapper">
            <div class="section__content">
                <h3 class="text--18">
                    <?php //=get_post_meta($post->ID,'clinic_title', true);?>
                </h3>
                <h1 class="text--48">
                    <?php the_title();?>
                </h1>
                <h4 class="text--18">
                    <?php the_excerpt();?>
                </h4>
            </div>

            <div class=""><!--flex-block-->
                <button type="button" class="button button--secondary button--white" data-toggle="modal" data-target="#modalHimioForm">
                    <?php pll_e('Задать вопрос онкологу');?>
                </button>
                <div class="address-block text--14"><!--flex-block-->
                    <div class="item__address">
                        <img src="<?php bloginfo('template_url'); ?>/img/uil-clock.svg" alt="location">
                        <?php pll_e('Киев, п-р Воздухофлотский 71/3');?>
                    </div>
                    <div class="item__address">
                        <img src="<?php bloginfo('template_url'); ?>/img/uil-map-marker.svg" alt="location">
                        <?php pll_e('Пн-Пт с 08:00 до 17:00');?>
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
                    <?= get_post_meta($post->ID,'about_title', true) ?>
                </div>
                <div class="title-subtext text">
                    <?= get_post_meta($post->ID,'about_text', true) ?>
                </div>
            </div>
            <div class="slider">
                <div class="slick-vertical">
                    <?php while (have_rows('gallery')): the_row();?>
                        <div class="slick-item">
                            <img data-no-lazy="1" src="<?= get_url_from_img_id(get_sub_field('img')) ;?>" class="" alt="">
                        </div>
                    <?php endwhile;?>
                </div>
                <p class="text">
                    <?= get_post_meta($post->ID,'slider_text', true) ?>
                </p>
            </div>
        </div>
    </section>

    <section class="section--about section--about--services">
        <div class="wrapper">

            <div class="title-box title-box--line flex-block">
                <div class="line w-205 line-green"></div>
                <div class="title-text title--sub">
                    <?= get_post_meta($post->ID,'services_title', true) ?>
                </div>
                <div class="title-subtext text">
                    <?= get_post_meta($post->ID,'services_text', true) ?>
                </div>
            </div>

            <div class="info-box info-box--text flex-block">
                <?php $loop = new WP_Query(array('post_type' => 'services', 'posts_per_page' => -1)); ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="info-box__item">
                        <div class="left-img-text">
                            <img src="<?= get_url_from_img_id(get_post_meta( $post->ID, 'icon', true )) ;?>" />
                            <p class="title-img">
                                <?php the_title(); ?>
                            </p>
                        </div>
                        <div class="info-text">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="link green">
                            <?php pll_e('Узнать детальнее');?>
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
                    <?= get_post_meta($post->ID,'advantages_title', true) ?>
                </div>
                <div class="title-subtext text">
                    <?= get_post_meta($post->ID,'advantages_text', true) ?>
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
                    <?= get_post_meta($post->ID,'blog_title', true) ?>
                </div>
                <div class="title-subtext text">
                    <?= get_post_meta($post->ID,'blog_text', true) ?>
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
                        <div class="link-box__content">
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
                            </div>
                        </div>
                    </a>
                <?php endwhile; wp_reset_query();?>
            </div>
            <a href="<?= get_permalink( get_option( 'page_for_posts' ) ); ?>" class="button button--secondary button--green">
                <?php pll_e('Смотреть все статьи');?>
            </a>
            <?php get_template_part('template-parts/sections', 'dropdown-seo'); ?>
        </div>
    </section>

</main>





<?php get_footer();
?>
