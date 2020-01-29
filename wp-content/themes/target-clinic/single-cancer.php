<?php

get_header();
the_post();
?>

<main class="content">
    <section class="section title-block default-title default-title-small bg-img-cancer-treatment"
             style="background-image: url(<?php the_post_thumbnail_url() ?>);">
        <div class="wrapper">
            <div class="section__content">
                <h3 class="text--18">
                    <?php the_breadcrumb() ?>
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
