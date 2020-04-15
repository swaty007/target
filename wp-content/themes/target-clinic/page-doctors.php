<?php
/* Template Name: Doctors */

get_header();
the_post();
?>
<?php get_template_part('template-parts/sections', 'color'); ?>
    <main class="content">
        <section class="section content--bg-img title-block title--about"
                 style="background: linear-gradient(180deg, rgba(16, 37, 85, 0.7) 20%, rgba(0, 35, 118, 0.6) 99.31%), url(<?php the_post_thumbnail_url() ?>);">
            <div class="wrapper">
                <div class="section__content">
                    <h3 class="text--18 breadcrumb__alex">
                    <?php the_breadcrumb() ?>
                    </h3>
                    <h1 class="text--48">
                        <?php the_title(); ?>
                    </h1>
                    <div class="text--18">
                        <?php the_excerpt();?>
                    </div>
                </div>
            </div>
        </section>
        <section class="section about-doctors section--default">
            <div class="wrapper">
                <?php $loop = new WP_Query( array( 'post_type' => 'doctor', 'posts_per_page' => -1 ) ); ?>
                <?php $count = 0; while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <a href="<?php the_permalink();?>" class="doc-presents <?= $count&1 ? 'doc-left-img' : '';?>">
                        <div class="doc-text">
                            <p class="doc-name title--small"><?php the_title();?></p>
                            <p class="doc-position text--14"><?= get_post_meta( $post->ID, 'position', true ) ;?></p>
                            <div class="doc-about text">
                                <?php the_excerpt() ;?>
                            </div>
                        </div>
                        <img src="<?php the_post_thumbnail_url()?>" class="doc-img" alt="">
                    </a>
                <?php $count++; endwhile; wp_reset_query(); ?>
            </div>
            <div class="section about-clinic section--large-text">
                <div class="wrapper w-920px">
                    <?php the_content(); ?>
                    <?php get_template_part('template-parts/sections', 'dropdown-seo'); ?>
                    <?php get_template_part('template-parts/sections', 'contact-form-callback'); ?>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();
