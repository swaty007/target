<?php

get_header();
the_post(); ?>
<?php get_template_part('template-parts/sections', 'color'); ?>
    <main class="content">
        <section class="section content--bg-img title-block default-title default-title-small bg-img-chemotherapy"
        style="background-image: url(<?php the_post_thumbnail_url() ?>)">
            <div class="wrapper">
                <div class="section__content">
                    <!--
<h3 class="text--18 breadcrumb__alex">
                    <?php the_breadcrumb() ?>
                    </h3>
-->
                    <h1 class="text--48 default-title__text">
                        <?php the_title() ?>
                    </h1>
                    <div class="text--18 default-title__subtext">
                        <?php the_excerpt() ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section--default">
            <div class="wrapper">
                <div class="wrapper-920-left">
                    <div class="section--large-text">
                        <?php the_content(); ?>

                        <div class="meta-page">
                          <span class="author-meta">Автор статьи: <?php the_author(); ?></span>
                          <span class="link-meta">https://clinic-target.com/</span>
                        </div>


                        <?php get_template_part('template-parts/sections', 'dropdown-seo');?>

                        <?php if(get_field('service_doctor')): ?>
                        <div class="service-doctors">
                          <div class="title-box title-box-servies flex-block"><span class="title-text title--small">Наши врачи</span></div>

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
                        <?php endif; ?>

                        <?php if(get_field('faq')): ?>
                        <div class="accordion accordion-faq" id="accordionFaq">
                          <div class="title-box title-box-servies flex-block"><span class="title-text title--small">Ответы на вопросы</span></div>

                        	<?php while(has_sub_field('faq')): $elem_faq = $elem_faq+1; ?>


                            <div class="card">
                              <div class="card-header" id="heading<?php echo $elem_faq; ?>">
                                <h5 class="mb-0">
                                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $elem_faq; ?>" aria-expanded="false" aria-controls="collapse<?php echo $elem_faq; ?>">
                                    <?php the_sub_field('faq-title'); ?>
                                  </button>
                                </h5>
                              </div>

                              <div id="collapse<?php echo $elem_faq; ?>" class="collapse" aria-labelledby="heading<?php echo $elem_faq; ?>" data-parent="#accordionFaq">
                                <div class="card-body">
                                  <?php the_sub_field('faq-content'); ?>
                                </div>
                              </div>
                            </div>

                        	<?php endwhile; ?>

                        </div>
                        <?php endif; ?>

                         <div class="change-order-mob">
                             <?php // get_template_part('template-parts/sections', 'contact-form-callback'); ?>
                             <?php
                             // If comments are open or we have at least one comment, load up the comment template.
                              if (comments_open() || get_comments_number()) :
                                  comments_template();
                              endif; ?>

                              <div class="change-comments d-flex justify-content-center">
                                <button class="button button--secondary button--green__all btn-single-do text--14">Оставить отзыв</button>
                                <button onclick="window.location.href='/comments'" class="button button--secondary button--white__all btn-single-do text--14">Все отзывы</button>
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
