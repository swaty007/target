<?php

get_header();
the_post();
?>
<?php get_template_part('template-parts/sections', 'color'); ?>
<main class="content">
    <section class="section title-block default-title default-title-small bg-img-cancer-treatment"
             style="background-image: url(<?php the_post_thumbnail_url() ?>);">
        <div class="wrapper">
            <div class="section__content">
                <h3 class="text--18 breadcrumb__alex">
                    <?php the_breadcrumb() ?>
                </h3>
                <h1 class="text--48 default-title__text">
                    <?php the_title(); ?>
                </h1>
                <div class="text--18 default-title__subtext">
                    <?php the_excerpt();?>
                </div>
            </div>
        </div>
    </section>
    <section class="section section--default">
        <div class="wrapper">
            <div class="wrapper-920-left">
                <section class="section--large-text">
                    <?php the_content(); ?>
		                 <?php if( have_rows('service_meta_info') ): ?>
                       <?php while( have_rows('service_meta_info') ): the_row(); ?>
                         <div class="meta-page">
                           <span class="author-meta">Автор статьи: <?php the_sub_field('author'); ?></span>
                           <span class="link-meta"><?php the_sub_field('link'); ?></span>
                         </div>
                       <?php endwhile; ?>
                    <?php endif; ?>
                    <?php if(get_field('service_doctor')): ?>
                    <div class="service-doctors">
                      <div class="title-box title-box-servies"><h3 class="mt-4">Наши врачи</h3></div>
                      <div class="service-doctors-items">

                          <?php while(has_sub_field('service_doctor')): ?>

                            <div class="doctor-item">
                              <div class="doctor-item__header">
                                <div class="doctor-item__header--first">
                                  <h1 class="doctor-item--name"><?php the_sub_field('name'); ?></h1>
                                  <h2 class="doctor-item--position"><?php the_sub_field('position'); ?></h2>
                                </div>
                                <div class="doctor-item__header--second">
                                  <a class="button button-doctor-service" href="<?php the_sub_field('link'); ?>">О враче</a>
                                </div>
                              </div>
                              <div class="doctor-item__footer">
                                <img src="<?php the_sub_field('photo'); ?>" alt="Doctor">
                              </div>
                            </div>

                          <?php endwhile; ?>
                      </div>
                    </div>
                    <?php endif; ?>
                    <?php get_template_part('template-parts/sections', 'contact-form-callback'); ?>
                    <div class="change-order-mob comment-single-page mt-5">
                          <div class="title-box title-box-servies flex-block mb-0"><h3 class="mb-0">Отзыв о услуге</h3></div>
                            <?php // get_template_part('template-parts/sections', 'contact-form-callback'); ?>
                            <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif; ?>
                            <div class="change-comments d-flex justify-content-center">
                              <button data-toggle="modal" data-target="#modalCommentForm" type="button" class="button button--secondary button--green__all btn-single-do text--14">Оставить отзыв</button>
                              <!-- <button onclick="window.location.href='/comments'" class="button button--secondary button--white__all btn-single-do text--14">Все отзывы</button> -->
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>
