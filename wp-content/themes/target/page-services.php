<?php
/* Template Name: Services */

get_header();
the_post();
?>

<main class="content">
    <section class="section title-block default-title default-title-small bg-img-services"
             style="background: linear-gradient(103.53deg, #EEEEEE 24.58%, rgba(227, 227, 227, 0) 88.57%), url(<?php the_post_thumbnail_url() ?>);">
        <div class="wrapper">
            <div class="section__content">
                <h3 class="text--18">
                    Главная / <span class="cell-for-text">Услуги</span>
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
    <section class="section--about section--about--services section--default">
        <div class="wrapper">
            <div class="title-box title-box--line flex-block">
                <div class="line w-205 line-green"></div>
                <div class="title-text title--sub">
                    Услуги
                </div>
                <div class="title-subtext text">
                    Tempus, a gravida vitae aliquet at laoreet penatibus pharetra. Ac elementum ipsum posuere tortor.
                    Fringilla dictumst quam cras vel nec diam...
                </div>
            </div>

            <div class="info-box info-box--text flex-block">
                <?php $loop = new WP_Query(array('post_type' => 'services', 'posts_per_page' => -1)); ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="info-box__item">
                        <div class="left-img-text">
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail();
                            } ?>
                            <p class="title-img">
                                <?php the_title(); ?>
                            </p>
                        </div>
                        <p class="info-text">
                            <?php the_excerpt(); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" target="_blank" class="link green">
                            Узнать детальнее
                        </a>
                    </div>
                <?php endwhile;
                wp_reset_query(); ?>
            </div>

            <div class="large-text-img">
                <div class="flex-block">
                    <div class="large__txt">
                        <h3 class="title--small">
                            Какие препараты мы используем
                        </h3>
                        <p class="text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit vestibulum leo sem mauris, non
                            nec porttitor sit. Porta sit tellus nisl, elit, ut lectus. Non risus tincidunt metus,
                            pellentesque facilisis metus laoreet quam at. Diam id augue cursus id magnis at urna hac
                            nunc. Purus ut facilisis ultrices in vitae. Tincidunt hendrerit vitae nisl sed in mauris
                            consequat velit id. Id sapien consectetur lacinia nibh at viverra. Aliquam facilisis
                            sagittis, quam massa justo, ipsum nisi venenatis. Eu sit sed in tristique. Congue est purus,
                            nulla ultrices. Tincidunt morbi phasellus sed vehicula vestibulum cursus auctor tincidunt.
                            Maecenas pharetra arcu varius egestas mauris.
                        </p>
                        <p class="text">
                            Eu sit sed in tristique. Congue est purus, nulla ultrices. Tincidunt morbi phasellus sed
                            vehicula vestibulum cursus auctor tincidunt. Maecenas pharetra arcu varius egestas mauris.
                        </p>
                    </div>
                    <div class="large__img">
                        <img src="../assets/images/preparation.png" alt="">
                    </div>
                </div>
            </div>
            <div class="wrapper-920-left">
                <div class="section--large-text">
                    <p class="text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Adipiscing quam enim at odio
                        quisque amet,
                        cursus purus. Quis sit nulla amet amet rhoncus aliquam luctus laoreet dignissim.
                        Adipiscing
                        convallis ut arcu nibh magna molestie consectetur scelerisque. Suspendisse sit arcu, et
                        tellus arcu
                        eu, pharetra congue quam. Magna quis mi nisl sed purus dolor ultricies sed pharetra.
                    </p>
                    <p class="text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Adipiscing quam enim at odio
                        quisque amet,
                        cursus purus. Quis sit nulla amet amet rhoncus aliquam luctus laoreet dignissim.
                        Adipiscing
                        convallis ut arcu nibh magna molestie consectetur scelerisque. Suspendisse sit arcu, et
                        tellus arcu
                        eu, pharetra congue quam. Magna quis mi nisl sed purus dolor ultricies sed pharetra.
                    </p>
                </div>
                <?php get_template_part('template-parts/sections', 'contact-form-callback'); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer();
?>