<header>
    <div class="header__content">
        <div class="wrapper flex-block">
            <div class="header__item header--address">
                <div class="item__address">
                    <img src="<?= get_template_directory_uri(); ?>/img/uil-clock.svg" alt="">
                    <?php pll_e('Киев, п-р Воздухофлотский 71/3');?>
                </div>
                <div class="item__address">
                    <img src="<?= get_template_directory_uri(); ?>/img/uil-map-marker.svg" alt="">
                    <?php pll_e('Пн-Пт с 08:00 до 17:00');?>
                    <a href="<?= get_permalink(pll_get_post(27));?>" class="link">
                        <?php pll_e('Как добраться');?>
                    </a>
                </div>

            </div>
            <div class="header__item header--phones flex-block">
                <?php $count = 0; $loop = new WP_Query(array('post_type' => 'phones', 'posts_per_page' => -1)); ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <a class="binct-phone-number-<?php echo $count+1?>" href="tel:+<?= preg_replace( '/[^0-9]/', '', get_the_title() )?>"><?php the_title();?></a>
                <?php $count++; endwhile; ?>
            </div>
            <button type="button" class="button button--secondary button--green text--14" data-toggle="modal" data-target="#modalOrderForm">
                <?php pll_e('Записаться на прием');?>
            </button>
        </div>
    </div>
</header>

<?php
//var_dump(get_page_template_slug());
?>
<nav id="nav" class="nav <?=is_front_page() || is_page_template('page-doctors.php' )|| is_page_template('page-about.php' )?'nav--transparent':'';?>">
    <div class="wrapper flex-block">
        <a href="<?= pll_home_url();?>">
            <?php switch (pll_current_language()) {
                case 'ru':
                    echo '<img class="logo logo-default" src="'.get_url_from_img_id(get_theme_mod( 'custom_logo' )).'" />';
                    echo '<img class="logo logo-color" src="'.get_theme_mod( 'your_theme_color_logo' ).'" />';
                    break;
                case 'uk':
                    echo '<img class="logo logo-default" src="'.get_theme_mod( 'your_theme_logo_ua' ).'" />';
                    echo '<img class="logo logo-color" src="'.get_theme_mod( 'your_theme_color_logo_ua' ).'" />';
                    break;
            }; ?>
            <img class="logo logo-scroll" src="<?= get_theme_mod( 'your_theme_scroll_logo' );?>" />
        </a>
        <div id="profile-menu-mob" class="container-for-move">
            <div id="nav-menu-mob">

                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-1',
                    'menu_id' => 'primary-menu',
                    'container' => 'ul',
                    'menu_class' => 'nav__list flex-block',
                ));
                ?>

            </div>
        </div>
        <div class="nav--mobile">
            <div class="nav--mobile__phones">
                <?php $count = 0; $loop = new WP_Query(array('post_type' => 'phones', 'posts_per_page' => -1)); ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <a class="binct-phone-number-<?php echo $count+1?>" href="tel:+<?= preg_replace( '/[^0-9]/', '', get_the_title() )?>"><?php the_title();?></a>
                <?php if ($count === 0):?>
                        <img src="<?= get_template_directory_uri(); ?>/img/fe-arrow-down.svg" class="open-mob" alt="">
                <div class="mobile__phones">
                <?php endif;?>
                <?php $count++; endwhile; ?>
                </div>
            </div>
            <div class="button-open-menu">
                <div class="line lines1"></div>
                <div class="line lines2"></div>
                <div class="line lines3"></div>
            </div>
        </div>
    </div>
    <div class="container-for-mob-menu">
        <div id="move_nav-menu-mob"></div>
    </div>
</nav>
