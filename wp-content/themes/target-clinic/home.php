<?php


get_header();
//the_post();
?>


    <main class="content">
        <section class="section section--blog--list">
            <div class="wrapper">
                <div class="text--18 breadcrumb__alex">
                    <?php the_breadcrumb() ?>
                </div>
                <div class="wrapper-920-left">
                    <h1>
                        <?php single_post_title();?>
                    </h1>
                    <div class="blog-list">
                        <?php
                        while(have_posts()): the_post();?>
                            <div class="content-image-box">
                                <div class="image-box">
                                    <a class="link-box__image" href="<?php the_permalink();?>"
                                       style="background-image:
                                               url('<?php the_post_thumbnail_url();?>')"></a>
                                </div>
                                <div class="content-box">
                                    <h5 class="link-box-date">
                                        <?php the_modified_time('F jS, Y'); ?>
                                    </h5>
                                    <a href="<?php the_permalink();?>" class="no-decoration">
                                        <h2 class="text--20 h2">
                                            <?php the_title(); ?>
                                        </h2>
                                    </a>
                                    <p class="text--16">
                                        <?php the_excerpt(); ?>
                                    </p>
                                    <a class="button" href="<?php the_permalink();?>">
                                        <?php pll_e('Читать статью');?>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; the_posts_pagination([
//                                'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
//                            'next_text'          => '<i class="fa fa-angle-double-right"></i>'
                        ]); ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();
