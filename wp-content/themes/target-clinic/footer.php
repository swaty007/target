<footer>
    <div class="wrapper">
        <img src="<?= get_template_directory_uri(); ?>/img/bg/bg-type-img.svg" class="bg-img" alt="">
        <div class="footer-content flex-block">
            <div class="footer-content__item item--contacts">
                <?php if(get_field('footer_social', 'options')): ?>
                  <div class="social-footer">
                	<?php while(has_sub_field('footer_social', 'options')): ?>
                    <h3 class="social-title"><?php pll_e(' ');?></h3>
                    <?php if(get_sub_field('social-items', 'options')): ?>
                      <div class="social-items">
                      <?php while(has_sub_field('social-items', 'options')): ?>
                        <a class="social-item" rel="nofollow" target="_blank" href="<?php the_sub_field('link'); ?>"><i class="<?php the_sub_field('icon'); ?>"></i></a>
                      <?php endwhile; ?>
                      </div>
                    <?php endif; ?>
                	<?php endwhile; ?>
                  </div>
                <?php endif; ?>
                <a class="binct-phone-number-3" href="tel:+380443392221">+38 (044) 339 2221</a>
                <a class="binct-phone-number-2" href="tel:+380506967311">+38 (050) 696 7311</a>
                <a class="binct-phone-number-1" href="tel:+380982334019">+38 (098) 233 4019</a>
				<a  href="mailto:info@clinic-target.com">info@clinic-target.com</a>
				<div class="social-ico-footer">
                      <a class="social-item" href="viber://chat?number=%2B380992060701" target="_blank">
					  <i class="fab fa-viber"></i></a>
					  <a class="social-item" href="tg://resolve?domain=clinictarget" target="_blank">
					  <i class="fab fa-telegram-plane"></i></a>
					  <a class="social-item" href="https://wa.me/380992060701" target="_blank">
					  <i class="fab fa-whatsapp"></i></i></a>
                </div>
            </div>
            <div class="footer-content__item item--info">
                <div class="item__address">
                    <img src="<?= get_template_directory_uri(); ?>/img/fa-regular_clock-wh.svg" alt="location">
                    <?php pll_e('Киев, п-р Воздухофлотский 71/3');?>
                </div>
                <div class="item__address">
                    <img src="<?= get_template_directory_uri(); ?>/img/fa-solid_map-marker-alt.svg" alt="location">
                    <?php pll_e('Пн-Пт с 08:00 до 17:00');?>
                </div>
                <div class="item__address">
                    <ul class="mt-3">
                        <?php pll_e('<li>Троллейбус: №9, №22</li>
                      <li>Автобус: 78, 302, 368, 805</li>
                      <li>Маршрутное такси: 496, 499, 565.</li>
                      <li>Остановка Аэропорт «Киев»</li>');?>
                    </ul>
                </div>
            </div>
            <div class="footer-content__item">
<!--                <p class="list-title text--18">-->
<!--                    Навигация-->
<!--                </p>-->
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-2',
                    'menu_id'        => '',
                    'container'      => 'ul',
                    'menu_class'     => 'footer__menu',
                    'exclude'        => '{40,916}'
                ) );
                ?>
            </div>
            <div class="footer-content__item">
<!--                <p class="list-title text--18">--><?php //pll_e('Лечение рака');?><!--</p>-->
                <ul>
                    <?php $loop = new WP_Query(array('post_type' => 'services', 'posts_per_page' => -1)); ?>
                    <?php while ($loop->have_posts()) : $loop->the_post();
	                    if($post->ID != 174 || $post->ID != 934){
                    ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" class="link green">
                                <?php the_title(); ?>
                            </a>
                        </li>
                    <?php
                    	}

                    endwhile;
                    wp_reset_query(); ?>
                </ul>
            </div>
            <img src="<?= get_template_directory_uri(); ?>/img/bg/bg-footer.svg" class="bg-img-footer" alt="">
        </div>
    </div>
</footer>
<?php get_template_part('template-parts/sections', 'modals'); ?>

<!-- <a href="#" id="toTop">

</a> -->

<ul class="lang__block">
    <?php pll_the_languages([
//                    'echo' => 0,
//    'dropdown' => 1,
    'show_flags' => 1,
    'hide_current' => 1,
    ]);?>
</ul>


		<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

<script src="<?php echo get_template_directory_uri().'/js/jquery.mask.js' ?>"></script>
<?php
include("./wp-content/themes/target-clinic/SxGeo.php");
$SxGeo = new SxGeo('./wp-content/themes/target-clinic/SxGeo.dat');
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED'];
} elseif (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_FORWARDED_FOR'];
} elseif (!empty($_SERVER['HTTP_FORWARDED'])) {
    $ip = $_SERVER['HTTP_FORWARDED'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$country_code = $SxGeo->getCountry($ip);
//$SxGeo->get($ip);
$forbidden = ['UA', 'RU'];
//$allowed = ['US', 'GB', 'IE', 'IS', 'CN', 'JP', 'DE', 'CA', 'PL'];
$allowed = ['UA'];
if (!empty($country_code) && in_array($country_code, $allowed)):?>
    <script type="text/javascript">
      (function(d, w, s) {
        var widgetHash = 'f4b6nzasi236aoyb7pky', gcw = d.createElement(s); gcw.type = 'text/javascript'; gcw.async = true;
        gcw.src = '//widgets.binotel.com/getcall/widgets/'+ widgetHash +'.js';
        var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(gcw, sn);
      })(document, window, 'script');
    </script>
<?php endif; ?>

<style type="text/css">
 #bingc-phone-button svg.bingc-phone-button-circle
circle.bingc-phone-button-circle-inside {
 fill: #4BA56A !important;
 }
 #bingc-phone-button:hover svg.bingc-phone-button-circle
circle.bingc-phone-button-circle-inside {
 fill: #4BA56A !important;
 }
 #bingc-phone-button div.bingc-phone-button-tooltip {
 background: #4BA56A !important;
 }
 #bingc-phone-button div.bingc-phone-button-tooltip svg.bingc-phone-button-arrow
polyline {
 fill: #4BA56A !important;
 }
</style>
<style type="text/css">
 #bingc-passive > div.bingc-passive-overlay {
 background: #4BA56A !important;
 }
</style>
<style type="text/css">
 #bingc-active {
 background: #4BA56A !important;
 }
</style>
<script type="text/javascript">
(function(d, w, s) {
var widgetHash = 'f5vu84aaks94q630u2tj', ctw = d.createElement(s); ctw.type = 'text/javascript'; ctw.async = true;
ctw.src = '//widgets.binotel.com/calltracking/widgets/'+ widgetHash +'.js';
var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(ctw, sn);
})(document, window, 'script');
</script>



<script type="text/javascript" src="//api.venyoo.ru/wnew.js?wc=venyoo/default/science&widget_id=6755342139789080"></script> 

</body>
</html>
