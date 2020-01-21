<?php
/* Template Name: Treatment cancer  */

get_header();
the_post();
?>


    <main class="content">
        <section class="section title-block default-title default-title-small bg-img-treatment"
                 style="background: linear-gradient(276.84deg, rgba(255, 255, 255, 0) 4.89%, #E3E3E3 28.3%), url(<?php the_post_thumbnail_url() ?>);">
            <div class="wrapper">
                <div class="section__content">
                    <h3 class="text--18">
                        Главная / <span class="cell-for-text">Услуги / </span>
                        <span class="cell-for-text">Лечение рака</span>
                    </h3>
                    <h1 class="text--48 default-title__text">
                        <?php the_title(); ?>
                    </h1>
                    <h4 class="text--18 default-title__subtext">
                        <?php the_excerpt(); ?>
                    </h4>
                </div>
            </div>
        </section>
        <section class="section section--default">
            <div class="wrapper">
                <div class="wrapper-920-left">
                    <section class="section--large-text">
                        <?php the_content(); ?>



                        <h3 class="title--small">
                            Показания при химиотерапии
                        </h3>
                        <p class="text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Adipiscing quam enim at odio
                            quisque amet,
                            cursus purus. Quis sit nulla amet amet rhoncus aliquam luctus laoreet dignissim.
                            Adipiscing
                            convallis ut arcu nibh magna molestie consectetur scelerisque. Suspendisse sit arcu, et
                            tellus arcu
                            eu, pharetra congue quam. Magna quis mi nisl sed purus dolor ultricies sed pharetra.
                        </p>

                        <div class="cancel-types">
                            <?php $loop = new WP_Query( array( 'post_type' => 'cancer', 'posts_per_page' => -1 ) ); ?>
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <a class="cancel-types__item" href="<?php the_permalink(); ?>" target="_blank">
                                    <img src="<?= get_url_from_img_id(get_post_meta( $post->ID, 'icon', true )) ;?>" alt="">
                                    <p class="cancel-type__name"> <?php the_title(); ?></p>
                                </a>
                            <?php endwhile; wp_reset_query(); ?>
                        </div>

                        <?=get_post_meta( $post->ID, 'content', true )?>
                        <h3 class="title--small">
                            Эффективность
                        </h3>
                        <p class="text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Adipiscing quam enim at odio
                            quisque amet,
                            cursus purus. Quis sit nulla amet amet rhoncus aliquam luctus laoreet dignissim.
                            Adipiscing
                            convallis ut arcu nibh magna molestie consectetur scelerisque. Suspendisse sit arcu, et
                            tellus arcu
                            eu, pharetra congue quam. Magna quis mi nisl sed purus dolor ultricies sed pharetra.
                        </p>

                        <div class="info-box info-box--text info-box-w260 flex-block">
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
                        <?php get_template_part('template-parts/sections', 'contact-form-callback'); ?>
                    </section>
                </div>
            </div>
        </section>
    </main>



<?php
get_footer();
