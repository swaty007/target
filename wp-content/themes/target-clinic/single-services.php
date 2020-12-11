<?php

get_header();
the_post();
if (get_post_meta($post->ID, 'new_template', true)) {
    require_once get_theme_file_path('/template-parts/page-single-services.php');
    die();
}
 ?>
<?php get_template_part('template-parts/sections', 'color'); ?>
<main class="content">
    <section class="section content--bg-img title-block default-title default-title-small bg-img-chemotherapy"
             style="background-image: url(<?php the_post_thumbnail_url() ?>)">
        <div class="wrapper">
            <div class="section__content">
                <div class="text--18 breadcrumb__alex">
                    <?php the_breadcrumb() ?>
                </div>
                <h1 class="text--48 default-title__text">
                    <?php the_title() ?>
                </h1>
                <div class="text--18 default-title__subtext">
                    <?php if (has_excerpt()) {the_excerpt();} ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section section--default">
        <div class="wrapper">
            <div class="wrapper-920-left">
                <div class="section--large-text">
                    <?php the_content(); ?>

                    <?php if (have_rows('service_meta_info')): ?>
                        <?php while (have_rows('service_meta_info')): the_row(); ?>
                            <div class="meta-page">
                                <span class="author-meta"><?php pll_e("Автор статьи:"); ?><?php the_sub_field('author'); ?></span>
                                <a href="<?php the_sub_field('link'); ?>"
                                   class="link-meta"><?php the_sub_field('link'); ?></a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>




                    <?php get_template_part('template-parts/sections', 'dropdown-seo'); ?>

                    <?php
                    $doctors = get_post_meta( $post->ID, 'service_doctors', true );
                    if(!empty($doctors)): ?>
                        <div class="service-doctors">
                            <div class="title-box title-box-servies"><p class="mt-4 h3"><?php pll_e('Наши врачи');?></p></div>
                            <div class="service-doctors-items">

                                <?php foreach($doctors as $doctor):?>
                                    <div class="doctor-item">
                                        <div class="doctor-item__header">
                                            <div class="doctor-item__header--first">
                                                <p class="doctor-item--name"><?= get_the_title($doctor); ?></p>
                                                <p class="doctor-item--position"><?= get_post_meta( $doctor, 'position', true ); ?></p>
                                            </div>
                                            <div class="doctor-item__header--second">
                                                <a class="button button-doctor-service" href="<?= get_permalink($doctor); ?>"><?php pll_e('О враче');?></a>
                                            </div>
                                        </div>
                                        <div class="doctor-item__footer">
                                            <img src="<?= get_the_post_thumbnail_url($doctor)?>" />
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (have_rows('faq')): ?>
                        <div class="accordion accordion-faq" id="accordionFaq">
                            <div class="title-box flex-block"><h2 class="mt-4"><?php pll_e('FAQ'); ?></h2></div>

                            <?php $elem_faq = 0;
                            while (have_rows('faq')):the_row(); $elem_faq = $elem_faq + 1; ?>


                                <div class="card">
                                    <div class="card-header" id="heading<?php echo $elem_faq; ?>">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapse<?php echo $elem_faq; ?>"
                                                    aria-expanded="false"
                                                    aria-controls="collapse<?php echo $elem_faq; ?>">
                                                <?php the_sub_field('faq-title'); ?>
                                            </button>
                                            <i class="accordion-icon fas fa-chevron-down"></i>
                                        </h2>
                                    </div>

                                    <div id="collapse<?php echo $elem_faq; ?>" class="collapse"
                                         aria-labelledby="heading<?php echo $elem_faq; ?>" data-parent="#accordionFaq">
                                        <div class="card-body">
                                            <?php the_sub_field('faq-content'); ?>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>

                        </div>
                    <?php endif; ?>
                    <?php get_template_part('template-parts/sections', 'contact-form-callback'); ?>
                    <div class="change-order-mob comment-single-page mt-5">
                        <div class="title-box title-box-servies flex-block mb-0"><h3
                                    class="mb-0"><?php pll_e('Отзыв о услуге'); ?></h3></div>
                        <?php // get_template_part('template-parts/sections', 'contact-form-callback'); ?>
                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif; ?>
                        <div class="change-comments d-flex justify-content-center">
                            <button data-toggle="modal" data-target="#modalCommentForm" type="button"
                                    class="button button--secondary button--green__all btn-single-do text--14"><?php pll_e('Оставить отзыв'); ?></button>
                            <!-- <button onclick="window.location.href='/comments'" class="button button--secondary button--white__all btn-single-do text--14">Все отзывы</button> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

</main>
<?php
get_footer();

?>
