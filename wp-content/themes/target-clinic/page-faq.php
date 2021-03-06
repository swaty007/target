<?php
  /* Template Name: FAQ */

  get_header();
the_post();
?>

<?php get_template_part('template-parts/sections', 'color'); ?>
    <main class="content">
        <section class="section title-block default-title default-title-small bg-img-faq"
                 style="background-image: url(<?php the_post_thumbnail_url() ?>);">
            <div class="wrapper">
                <div class="section__content">
                    <div class="text--18 breadcrumb__alex">
                    <?php the_breadcrumb() ?>
                    </div>
                    <h1 class="text--48 default-title__text">
                        <?php the_title(); ?>
                    </h1>
                    <div class="text--18 default-title__subtext">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section--default">
            <div class="wrapper">
                <div class="wrapper-920-left">
                    <div class="content-toggle">
                        <?php $loop = new WP_Query( array( 'post_type' => 'faq', 'posts_per_page' => -1 ) ); ?>
                        <?php $count = 0; while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <div class="content-toggle__item">
                                <div class="toggle-item__header <?= ($count === 0) ? 'active' : '';?>">
                                    <h2 class="text">
                                        <?php the_title(); ?>
                                    </h2>
                                </div>

                                <div class="toggle-item__body" <?= ($count === 0) ? 'style="display: block"' : '';?>>
                                    <div class="section--large-text">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php $count++; endwhile; wp_reset_query(); ?>
                    </div>
                    <?php get_template_part('template-parts/sections', 'contact-form'); ?>
                </div>
            </div>
        </section>
    </main>

<?php
  get_footer();
