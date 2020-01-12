<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="<?= get_home_url();?>">
                    <img class="footer__logo" src="<?= get_template_directory_uri(); ?>/img/logo.svg" alt="logo">
                </a>
            </div>
            <div class="col-md-8">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-2',
                    'menu_id'        => '',
                    'container'      => 'ul',
                    'menu_class'     => 'footer__menu'
                ) );
                ?>
            </div>
        </div>
    </div>
</footer>
		<?php wp_footer(); ?>
</body>
</html>
