<?php

get_header();
the_post();
?>

<main class="content">
    <section class="section title-block default-title default-title-small bg-img-cancer-treatment"
             style="background: linear-gradient(277.29deg, rgba(255, 255, 255, 0) 4.89%, #E3E3E3 28.3%), url(<?php the_post_thumbnail_url() ?>);">
        <div class="wrapper">
            <div class="section__content">
                <h3 class="text--18">
                    Главная / <span class="cell-for-text">Услуги / </span>
                    <span class="cell-for-text">Лечение рака Легких</span>
                </h3>
                <h1 class="text--48 default-title__text">
                    <?php the_title(); ?>
                </h1>
                <h4 class="text--18 default-title__subtext">
                    <?php the_excerpt();?>
                </h4>
            </div>
        </div>
    </section>
    <section class="section section--default">
        <div class="wrapper">
            <div class="wrapper-920-left">
                <section class="section--large-text">
                    <?php the_content(); ?>
                    <?php get_template_part('template-parts/sections', 'contact-form-callback'); ?>
                </section>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>
