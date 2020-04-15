<?php
/* Template Name: Services */

get_header();
the_post();
?>
<?php get_template_part('template-parts/sections', 'color'); ?>
<main class="content">
    <section class="section title-block default-title default-title-small bg-img-services"
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
                    <?php the_excerpt(); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section--about section--about--services section--default">
        <div class="wrapper">
            <div class="title-box title-box--line flex-block">
                <div class="line w-205 line-green"></div>
                <div class="title-text title--sub">
                    <?= get_post_meta($post->ID,'service_title', true) ?>
                </div>
                <div class="title-subtext text">
                    <?= get_post_meta($post->ID,'service_text', true) ?>
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
                        <a href="<?php the_permalink(); ?>" target="_blank" class="link green">
                            Узнать детальнее
                        </a>
                    </div>
                <?php endwhile;
                wp_reset_query(); ?>
            </div>

<!--            <div class="large-text-img">-->
<!--                <div class="flex-block">-->
<!--                    <div class="large__txt">-->
<!--                        <h3 class="title--small">-->
<!--                            Какие препараты мы используем-->
<!--                        </h3>-->
<!--                        <p class="text">-->
<!--                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit vestibulum leo sem mauris, non-->
<!--                            nec porttitor sit. Porta sit tellus nisl, elit, ut lectus. Non risus tincidunt metus,-->
<!--                            pellentesque facilisis metus laoreet quam at. Diam id augue cursus id magnis at urna hac-->
<!--                            nunc. Purus ut facilisis ultrices in vitae. Tincidunt hendrerit vitae nisl sed in mauris-->
<!--                            consequat velit id. Id sapien consectetur lacinia nibh at viverra. Aliquam facilisis-->
<!--                            sagittis, quam massa justo, ipsum nisi venenatis. Eu sit sed in tristique. Congue est purus,-->
<!--                            nulla ultrices. Tincidunt morbi phasellus sed vehicula vestibulum cursus auctor tincidunt.-->
<!--                            Maecenas pharetra arcu varius egestas mauris.-->
<!--                        </p>-->
<!--                        <p class="text">-->
<!--                            Eu sit sed in tristique. Congue est purus, nulla ultrices. Tincidunt morbi phasellus sed-->
<!--                            vehicula vestibulum cursus auctor tincidunt. Maecenas pharetra arcu varius egestas mauris.-->
<!--                        </p>-->
<!--                    </div>-->
<!--                    <div class="large__img">-->
<!--                        <img src="../assets/images/preparation.png" alt="">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <div class="wrapper-920-left">
                <div class="section--large-text">
                    <?php the_content(); ?>
                </div>
                <?php get_template_part('template-parts/sections', 'contact-form-callback'); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer();
?>