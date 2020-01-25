<?php


get_header();
//the_post();
?>


    <main class="content">
        <section class="section section--blog--list">
            <div class="wrapper">
                <h3 class="text--18">
                    Главная / Блог /
                    <span class="cell-for-text"> Таргетная терапия — прицельный удар по болезни</span>
                </h3>
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
                                    <h2 class="text--20">
                                        <?php the_title(); ?>
                                    </h2>
                                    <p class="text--16">
                                        <?php the_excerpt(); ?>
                                    </p>
                                    <a class="button" href="<?php the_permalink();?>">
                                        Читать статью
                                        <img src="../assets/images/arrow-right.svg" alt="">
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php $loop = new WP_Query( array( 'post_type' => 'contact', 'posts_per_page' => -1 ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<?php endwhile; wp_reset_query(); ?>

<?php
get_footer();
