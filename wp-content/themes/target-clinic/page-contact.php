<?php
/* Template Name: Contact */

get_header();
the_post();
?>
<?php get_template_part('template-parts/sections', 'color'); ?>
    <main class="content">
        <section class="section title-block default-title default-title-small bg-img-contacts"
                 style="background-image: url(<?php the_post_thumbnail_url() ?>);">
            <div class="wrapper">
                <div class="section__content">
                    <div class="text--18 breadcrumb__alex">
                    <?php the_breadcrumb() ?>
                    </div>
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
                    <div class="contact-info">
                        <div class="address-block flex-block text">
                            <div class="item__address">
                                <img src="<?php bloginfo('template_url'); ?>/img/uil-clock.svg" alt="location">
                                <?= get_post_meta($post->ID,'address', true) ?>
                            </div>
                            <div class="item__address">
                                <img src="<?php bloginfo('template_url'); ?>/img/uil-map-marker.svg" alt="location">
                                <?= get_post_meta($post->ID,'working_time', true) ?>
                            </div>
							<div class="item__address">
                                <img src="<?php bloginfo('template_url'); ?>/img/mail.svg" alt="location">
                                <a href="mailto:info@clinic-target.com" target="_blank">info@clinic-target.com</a>
                            </div>
                        </div>
                        <div class="phones flex-block">
                        <?php $count = 0; 
                        while (have_rows('phone')): the_row(); ?>
                            <a class="binct-phone-number-<?php echo $count+1 ?>" href="tel:+<?php echo preg_replace( '/[^0-9]/', '', get_sub_field('phone') ) ?>"><?php echo the_sub_field('phone') ?></a>
                        <?php $count++;  endwhile;?>
                        </div>

						<div class="social-ico-block">
                    <a href="viber://chat?number=%2B380992060701" target="_blank">
						<img src="<?= get_template_directory_uri(); ?>/img/viber.svg" alt=""></a>
					<a href="tg://resolve?domain=clinictarget" target="_blank">
						<img src="<?= get_template_directory_uri(); ?>/img/telegram.svg" alt=""></a>
					<a href="https://wa.me/380992060701" target="_blank">
						<img src="<?= get_template_directory_uri(); ?>/img/whatsapp.svg" alt=""></a>
                </div>

                    </div>
                    <section class="section--large-text">
                        <?= $meta_data = get_post_meta($post->ID, 'map', true);?>
                        <?php the_content(); ?>
                    </section>
                    <?php get_template_part('template-parts/sections', 'contact-form-callback'); ?>
                </div>
            </div>
        </section>
    </main>
<?php $loop = new WP_Query( array( 'post_type' => 'contact', 'posts_per_page' => -1 ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<?php endwhile; wp_reset_query(); ?>

<?php
get_footer();
