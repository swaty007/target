<?php
get_header();
?>

<?php get_template_part('template-parts/sections', 'main-screen'); ?>

<section id="reviews" class="reviews">
    <div class="container">
        <div class="reviews__wrap">

            <?php $loop = new WP_Query( array( 'post_type' => 'reviews', 'posts_per_page' => -1 ) ); ?>
            <?php if ($loop->have_posts()):?>
            <table class="reviews__table">
                <thead>
                <tr>
                    <th>
                        Tour operator's website
                    </th>
                    <th>
                        About
                    </th>
                    <th>
                        Rating
                    </th>
                    <th>
                        Our score
                    </th>
                    <th>
                        Visit site
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <tr class="">
                        <td>
                            <?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>
<!--                            --><?php //the_permalink(); ?>
<!--                            --><?php //echo get_the_title(); ?>
                        </td>
                        <td class="text-left">
                            <?= get_post_meta( $post->ID, 'about', true ) ;?>
                        </td>
                        <td>
                            <div>
                            <?php
                            $stars = get_post_meta( $post->ID, 'stars', true );
                            for ($i = 1; $i <= 5; $i++):
                                if ($stars >= 1): ?>
                                    <img src="<?= get_template_directory_uri(); ?>/img/icon_star_full.svg" />
                                <?php elseif($stars <= 0):?>
                                    <img src="<?= get_template_directory_uri(); ?>/img/icon_star_empty.svg" />
                                <?php elseif($stars == 0.5):?>
                                    <img src="<?= get_template_directory_uri(); ?>/img/icon_star_half.svg" />
                                <?php elseif($stars > 0.5):?>
                                    <img src="<?= get_template_directory_uri(); ?>/img/icon_star_high.svg" />
                                <?php elseif($stars < 0.5):?>
                                    <img src="<?= get_template_directory_uri(); ?>/img/icon_star_low.svg" />
                            <?php endif;?>
                            <?php
                                $stars--;
                            endfor;?>
                            </div>
                            <p class="reviews__star--text">
                                <?= get_post_meta( $post->ID, 'stars', true ) ;?>/5 stars
                            </p>
                        </td>
                        <td>
                           <p class="reviews__score">
                               <?= get_post_meta( $post->ID, 'our_score', true ) ;?>
                           </p>
                        </td>
                        <td>
                            <a href="<?= get_post_meta( $post->ID, 'link', true ) ;?>" class="reviews__btn">
                                Visit site
                            </a>
                        </td>
                    </tr>
                <?php endwhile; wp_reset_query(); ?>
                </tbody>
            </table>
            <?php endif;?>
        </div>
    </div>
</section>
<section class="success-story">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="second-title second-title--left">
                    Success Stories from Around the Web
                </h2>
            </div>
        </div>
        <?php $loop = new WP_Query( array( 'post_type' => 'stories', 'posts_per_page' => -1 ) );$count = 0; ?>
        <?php if ($loop->have_posts()):?>
        <?php while ( $loop->have_posts() ) : $loop->the_post();$count++; ?>
            <?php if($count&1):?>
                    <div class="row">
            <?php endif?>
                <div class="col-md-6">
                    <div class="success-story__item">
                        <div class="success-story__item--header">
                            <div class="success-story__item--img">
                                <?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>
                            </div>
                            <div class="success-story__item--content">
                                <h3 class="success-story__item--title">
                                    <?php echo get_the_title(); ?>
                                </h3>
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="success-story__item--footer">
                            <img src="<?= get_url_from_img_id(get_post_meta( $post->ID, 'logo', true ))  ;?>" alt="">
                        </div>

                    </div>
                </div>
            <?php if($count&1):?>
                    </div>
                <?php endif?>

        <?php endwhile; wp_reset_query(); ?>
        <?php endif;?>
    </div>
</section>
<section class="facts">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="second-title second-title--left">
                    Facts
                </h2>
            </div>
        </div>
        <div class="facts__wrap">
            <?php $loop = new WP_Query( array( 'post_type' => 'facts', 'posts_per_page' => -1 ) ); ?>
            <?php if ($loop->have_posts()):?>
                <?php while ( $loop->have_posts() ) : $loop->the_post();?>

                    <!--                --><?php //the_permalink(); ?>
                    <!--                --><?php //echo get_the_title(); ?>
                    <div class="facts__item">
                        <div class="facts__item--img">
                            <?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>
                        </div>
                        <div class="facts__item--content">
                            <?php the_content(); ?>
                        </div>
                    </div>

                <?php endwhile; wp_reset_query(); ?>
            <?php endif;?>
        </div>
    </div>
</section>
<?php get_footer();
?>
