<footer>
    <div class="wrapper">
        <img src="<?= get_template_directory_uri(); ?>/img/bg/bg-type-img.svg" class="bg-img" alt="">
        <div class="footer-content flex-block">
            <img src="<?= get_template_directory_uri(); ?>/img/bg/bg-footer.svg" class="bg-img-footer" alt="">
            <div class="footer-content__item item--contacts">
                <img src="<?= get_url_from_img_id(get_theme_mod( 'custom_logo' ));?>" alt="">
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
                <button type="button" class="button button--secondary button--white" data-toggle="modal" data-target="#modalContactForm">
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
<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="modalContactForm"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Записаться на прием</h5>
                <input id="modal_page" type="hidden" name="page">
                <input id="modal_name" type="text" name="name" placeholder="Имя">
                <input id="modal_phone" type="number" name="tel" placeholder="Телефон">
                <button id="modal_contact_form" type="button" class="button--primary" data-dismiss="modal">Отправить</button>
            </div>
        </div>
    </div>
</div>
<a href="#" id="toTop">

</a>
		<?php wp_footer(); ?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
