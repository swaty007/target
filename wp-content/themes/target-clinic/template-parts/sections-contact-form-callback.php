<div class="appointment flex-block">
    <img src="<?php bloginfo('template_url'); ?>/img/tablet.png" class="image"/>
    <div class="appointment__text">
        <p class="title--small">
            <?php pll_e('Запись на консультацию в клинику 24/7');?>
        </p>
        <button class="button button--primary" data-toggle="modal" data-target="#modalOrderForm">
            <?php pll_e('Записаться на прием');?>
        </button>
        <p class="telephone">
            <img src="<?php bloginfo('template_url'); ?>/img/phone.svg"/>
            <?php $loop = new WP_Query( array(
                    'post_type' => 'phones',
                    'posts_per_page' => 1,
                    'meta_query' => [
                        'AND',
                        [
                            'key' => 'contact_form',
                            'value'	  	=>  true,
                            'compare' 	=> '=',
                        ]
                    ],
                )
            ); ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <a href="tel:+<?= preg_replace( '/[^0-9]/', '', get_the_title() )?>" class="link title--small binct-phone-number-2">
                <?php the_title(); ?>
            </a>
            <?php endwhile; wp_reset_query(); ?>
        </p>
    </div>
</div>