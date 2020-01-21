<footer>
    <div class="wrapper">
        <img src="<?= get_template_directory_uri(); ?>/img/bg/bg-type-img.svg" class="bg-img" alt="">
        <div class="footer-content flex-block">
            <img src="<?= get_template_directory_uri(); ?>/img/bg/bg-footer.svg" class="bg-img-footer" alt="">
            <div class="footer-content__item item--contacts">
                <img src="<?= get_template_directory_uri(); ?>/img/logo.svg" alt="">
                <a href="tel:+380443392221">+38 (044) 339 2221</a>
                <a href="tel:+380506967311">+38 (050) 696 7311</a>
                <a href="tel:+380982334019">+38 (098) 233 4019</a>
            </div>
            <div class="footer-content__item item--info">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quam id urna, in sit consequat.
                </p>
                <div class="item__address">
                    <img src="<?= get_template_directory_uri(); ?>/img/fa-regular_clock-wh.svg" alt="location">
                    Киев, п-р Воздухофлотский 71/3
                </div>
                <div class="item__address">
                    <img src="<?= get_template_directory_uri(); ?>/img/fa-solid_map-marker-alt.svg" alt="location">
                    Пн-Пт с 08:00 до 17:00
                </div>
                <a href="" target="_blank" class="link">
                    Как добраться
                </a>
                <button type="button" class="button button--secondary button--white">
                    Записаться на прием
                </button>
            </div>
            <div class="footer-content__item">
                <p class="list-title text--18">
                    Навигация
                </p>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-2',
                    'menu_id'        => '',
                    'container'      => 'ul',
                    'menu_class'     => 'footer__menu'
                ) );
                ?>
            </div>
            <div class="footer-content__item">
                <p class="list-title text--18">Лечение рака</p>
                <ul>
                    <?php $loop = new WP_Query(array('post_type' => 'services', 'posts_per_page' => -1)); ?>
                    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" target="_blank" class="link green">
                                <?php the_title(); ?>
                            </a>
                        </li>
                    <?php endwhile;
                    wp_reset_query(); ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
		<?php wp_footer(); ?>
</body>
</html>
