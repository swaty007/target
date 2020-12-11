<?php ?>
<?php get_template_part('template-parts/sections', 'color'); ?>

<section class="services_new__main">
    <div class="container">
        <div class="col-lg-7">
            <h1 class="services_new--sub-title mb-4">
                <?php the_title();?>
            </h1>
            <div class="text--18 default-title__subtext mb-4">
                <?php the_excerpt();?>
             </div>
            <button class="button button--primary" data-toggle="modal" data-target="#modalOrderForm">
                <?php pll_e('Записаться на прием');?>
            </button>
        </div>
    </div>
</section>
<section class="services_new__block services_new__block--one">
   <div class="container-fluid">
       <div class="row align-items-center">
           <div class="col-lg-6 text-center-mobile text-center-mobile--img pl-0 hidden--mobile">
               <img src="<?php bloginfo('template_url'); ?>/img/UI_Doctor1.png"/>
           </div>
           <div class="col-lg-6">
               <div class="services_new__col services_new__col--right">
                   <h2 class="services_new--sub-title mb-4">
                       <?= get_post_meta($post->ID, 'block1_title', true);?>
                   </h2>
               </div>
                   <div class="row hidden--desctop mb-3">
                       <img src="<?php bloginfo('template_url'); ?>/img/UI_Doctor1.png"/>
                   </div>
               <div class="services_new__col services_new__col--right">
                   <div class="mb-4">
                       <?= get_post_meta($post->ID, 'block1_content', true);?>
                   </div>
                   <button class="button button--primary" data-toggle="modal" data-target="#modalOrderForm">
                       <?php pll_e('Бесплатная консультация');?>
                   </button>
               </div>
           </div>
       </div>
   </div>
</section>
<?php if (have_rows('items')): ?>
    <section class="services_new__items--wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="services_new--sub-title text-center">
                        <?php pll_e('Реальный шанс на выздоровление');?>
                    </h2>
                </div>
            </div>
            <div class="row">
                <?php while (have_rows('items')): the_row();?>
                    <div class="col-lg-4">
                        <div class="services_new__items">
                            <div class="services_new__items--img">
                                <img src="<?php the_sub_field('img'); ?>" />
                            </div>
                            <h4 class="services_new__items--title">
                                <?php the_sub_field('title'); ?>
                            </h4>
                            <div class="services_new__items--desc">
                                <?php the_sub_field('text'); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
    <section class="services_new__block services_new__block--two">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="services_new__col services_new__col--left">
                        <h2 class="services_new--sub-title mb-4">
                            <?= get_post_meta($post->ID, 'block2_title', true);?>
                        </h2>
                    </div>
                    <div class="row hidden--desctop mb-3">
                        <img src="<?php bloginfo('template_url'); ?>/img/UI_Doctor2.png"/>
                    </div>
                    <div class="services_new__col services_new__col--left">
                        <div class="mb-4">
                            <?= get_post_meta($post->ID, 'block2_content', true);?>
                        </div>
                        <button class="button button--primary" data-toggle="modal" data-target="#modalOrderForm">
                            <?php pll_e('Бесплатная консультация');?>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 text-center-mobile text-center-mobile--img pr-0 hidden--mobile">
                    <img src="<?php bloginfo('template_url'); ?>/img/UI_Doctor2.png"/>
                </div>
            </div>
        </div>
    </section>
<?php if (have_rows('faq')): ?>
<section id="services_new__faq" class="services_new__faq">
    <div class="container">
        <?php $elem_faq = 0;
        while (have_rows('faq')): the_row(); $elem_faq = $elem_faq + 1; ?>
            <div class="card">
                <div class="card-header" id="heading<?php echo $elem_faq; ?>">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                            data-target="#collapse<?php echo $elem_faq; ?>"
                            aria-expanded="false"
                            aria-controls="collapse<?php echo $elem_faq; ?>">
                        <?php the_sub_field('faq-title'); ?>
                    </button>
                </div>

                <div id="collapse<?php echo $elem_faq; ?>" class="collapse"
                     aria-labelledby="heading<?php echo $elem_faq; ?>" data-parent="#services_new__faq">
                    <div class="card-body">
                        <?php the_sub_field('faq-content'); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>
<?php endif; ?>
<?php if (have_rows('service_meta_info')): ?>
    <div class="container">
    <?php while (have_rows('service_meta_info')): the_row(); ?>
    <a href="<?php the_sub_field('link'); ?>" class="services_new__meta">
        <div class="services_new__meta--img">
            <img src="" />
        </div>
        <div>
            <p class="services_new__meta--title"><?php pll_e("Автор статьи:"); ?></p>
            <p class="services_new__meta--name"><?php the_sub_field('author'); ?></p>
        </div>
    </a>
    <?php endwhile; ?>
    </div>
<?php endif; ?>
<div class="container">
    <?php get_template_part('template-parts/sections', 'dropdown-seo'); ?>
</div>
<?php
$doctors = get_post_meta( $post->ID, 'service_doctors', true );
if(!empty($doctors)): ?>
    <section class="services_new__doctor--wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="services_new--sub-title text-center">
                        <?php pll_e("Наши специалисты");?>
                    </h2>
                </div>
            </div>
            <div class="row services_new__doctor--row">
    <?php foreach($doctors as $doctor):?>
        <div class="col-lg-4">
            <div class="services_new__doctor">
<!--                <div class="services_new__doctor--img">-->
<!--                    -->
<!--                </div>-->
                <img class="services_new__doctor--img" src="<?= get_the_post_thumbnail_url($doctor)?>" />
                <h4 class="services_new__doctor--title">
                    <?= get_the_title($doctor); ?>
                </h4>
                <p class="services_new__doctor--position services_new__doctor--text">
                    <?= get_post_meta( $doctor, 'position', true ); ?>
                </p>
                <p class="services_new__doctor--experience services_new__doctor--text">
                    <strong>
                        <?= get_post_meta( $doctor, 'experience', true ) ;?> <?php pll_e('лет опыта');?>
                    </strong>
                </p>
                <div class="services_new__doctor--stars">
                    <img src="<?php bloginfo('template_url'); ?>/img/star_full.svg"/>
                    <img src="<?php bloginfo('template_url'); ?>/img/star_full.svg"/>
                    <img src="<?php bloginfo('template_url'); ?>/img/star_full.svg"/>
                    <img src="<?php bloginfo('template_url'); ?>/img/star_full.svg"/>
                    <img src="<?php bloginfo('template_url'); ?>/img/star_full.svg"/>
                </div>
                <a href="<?= get_permalink($doctor); ?>" class="services_new__doctor--btn">
                    <?php pll_e('Записаться на прием');?>
                </a>
            </div>
        </div>
    <?php endforeach;?>
            </div>
            <div class="row clearfix mt-5">
                <div class="col-md-12 text-center">
                    <a href="<?=get_permalink(pll_get_post(get_page_id_by_template('page-doctors.php')));?>"
                       class="pull-right--lg services_new__btn">
                        <?php $loop = new WP_Query( array( 'post_type' => 'doctor', 'posts_per_page' => -1 ) ); ?>
                        <?php pll_e('Другие врачи');?> (<?=$loop->post_count;?>)
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
    <section class="services_new__cancer--wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="services_new--sub-title text-center">
                        <?php pll_e('Виды химиотерапии');?>
                    </h2>
                </div>
            </div>
            <div class="row">
                <?php $loop = new WP_Query( array( 'post_type' => 'cancer', 'posts_per_page' => -1 ) ); ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <div class="col-lg-4">
                        <a class="services_new__cancer" href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
        </div>
    </section>

<?php
get_footer();

?>