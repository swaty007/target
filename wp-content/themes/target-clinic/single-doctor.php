<?php

get_header();
the_post();
?>
<?php get_template_part('template-parts/sections', 'color'); ?>
<main class="content">
    <section class="section title-block default-title"
             style="background:radial-gradient(59.52% 53.91% at 47.76% 56.2%, #FFFFFF 0%, #E3E3E3 100%)">
        <div class="wrapper">
            <div class="section__content">
                <h3 class="text--18 breadcrumb__alex">
                    <?php the_breadcrumb() ?>
                </h3>
            </div>
            <div class="doc-presents doc-presents--main">
                <div class="doc-text">
                    <h1 class="doc-name title--small"><?php the_title(); ?></h1>
                    <p class="doc-position text--14"><?= get_post_meta( $post->ID, 'position', true ) ;?></p>
                    <p class="doc-experience text">Стаж: <span class="doc-ex-year"><?= get_post_meta( $post->ID, 'experience', true ) ;?> лет</span></p>
                    <div class="doc-about text">
                        <?php the_excerpt()?>
                    </div>
                    <button type="button" class="button button--secondary button--green text--14" data-toggle="modal" data-target="#modalContactForm">
                        Записаться на прием
                    </button>
                    <button data-toggle="modal" data-target="#modalCommentForm" type="button" class="button button--secondary button--green__all btn-single-do text--14">
                        Оставить отзыв
                    </button>
                    <p><?php $post_obj = get_page_by_title( 'Привет, мир!', OBJECT, 'post' );
print_r( $post_obj ); ?></p>
                </div>
                <img src="<?php the_post_thumbnail_url()?>" class="doc-img" alt="">
            </div>
        </div>
    </section>
    <section class="section section--default doctor-more-details">
        <div class="wrapper">
            <div class="wrapper-920-left">

                <div class="section--large-text">
                    <?php the_content(); ?>
                    <h3 class="title--small">
                        Сертификаты
                    </h3>
                    <div class="certificates">
<!--                        <div class="flex-block">-->
<!--                            --><?php //foreach ( lot_album_url_array(explode(',', get_post_meta( $post->ID, 'certificates', true ))) as $img): ;?>
<!--                            <div class="flex-item">-->
<!--                                <img src="--><?//= $img;?><!--" alt="">-->
<!--                            </div>-->
<!--                            --><?php //endforeach; ?>
<!--                        </div>-->
                            <div class="slick-certificates">
                                <?php foreach ( lot_album_url_array(explode(',', get_post_meta( $post->ID, 'certificates', true ))) as $img): ;?>
                                    <div class="slick-item">
                                        <a href="<?= $img;?>" data-fancybox="gallery<?=$count;?>" rel="gallery">
                                            <img src="<?= $img;?>" />
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                    </div>

                    <div class="change-order-mob comment-single-page">
                      <div class="title-box title-box-servies flex-block mb-0"><h3 class="mb-0">Отзыв о Враче</h3></div>
                        <?php // get_template_part('template-parts/sections', 'contact-form-callback'); ?>
                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif; ?>
                        <div class="change-comments d-flex justify-content-center">
                          <!-- <button data-toggle="modal" data-target="#modalCommentForm" type="button" class="button button--secondary button--green__all btn-single-do text--14">Оставить отзыв</button> -->
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
