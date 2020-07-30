<footer>
    <div class="wrapper">
        <img src="<?= get_template_directory_uri(); ?>/img/bg/bg-type-img.svg" class="bg-img" alt="">
        <div class="footer-content flex-block">
            <img src="<?= get_template_directory_uri(); ?>/img/bg/bg-footer.svg" class="bg-img-footer" alt="">
            <div class="footer-content__item item--contacts">
                <?php if(get_field('footer_social', 'options')): ?>
                  <div class="social-footer">
                	<?php while(has_sub_field('footer_social', 'options')): ?>
                    <h3 class="social-title"><?php the_sub_field('title'); ?></h3>
                    <?php if(get_sub_field('social-items', 'options')): ?>
                      <div class="social-items">
                      <?php while(has_sub_field('social-items', 'options')): ?>
                        <a class="social-item" href="<?php the_sub_field('link'); ?>"><i class="<?php the_sub_field('icon'); ?>"></i></a>
                      <?php endwhile; ?>
                      </div>
                    <?php endif; ?>
                	<?php endwhile; ?>
                  </div>
                <?php endif; ?>
                <a class="binct-phone-number-3" href="tel:+380443392221">+38 (044) 339 2221</a>
                <a class="binct-phone-number-2" href="tel:+380506967311">+38 (050) 696 7311</a>
                <a class="binct-phone-number-1" href="tel:+380982334019">+38 (098) 233 4019</a>
            </div>
            <div class="footer-content__item item--info">
                <p>
                    Адрес:
                </p>
                <div class="item__address">
                    <img src="<?= get_template_directory_uri(); ?>/img/fa-regular_clock-wh.svg" alt="location">
                    Киев, п-р Воздухофлотский 71/3
                </div>
                <div class="item__address">
                    <img src="<?= get_template_directory_uri(); ?>/img/fa-solid_map-marker-alt.svg" alt="location">
                    Пн-Пт с 08:00 до 17:00
                </div>
                <a href="/kontakty/" class="link">
                    Как добраться
                </a>
                <button type="button" class="button button--secondary button--white" data-toggle="modal" data-target="#modalOrderForm">
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
                    'menu_class'     => 'footer__menu',
                    'exclude'        => '{40}'
                ) );
                ?>
            </div>
            <div class="footer-content__item">
                <p class="list-title text--18">Лечение рака</p>
                <ul>
                    <?php $loop = new WP_Query(array('post_type' => 'services', 'posts_per_page' => -1)); ?>
                    <?php while ($loop->have_posts()) : $loop->the_post();
	                    if($post->ID != 174){
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
                <input id="modal_phone" type="text" name="tel" placeholder="Телефон" data-required="required" data-mask="+38 (000) 000 00 00">
                <!-- <button id="modal_contact_form" type="button" class="button--primary" data-dismiss="modal">Отправить</button> -->
                <button id="modal_contact_form" type="button" class="button--primary">Отправить</button>
                <div id="modal_contact_form_thank">Спасибо, Ваша заявка отправлена.</div>
            </div>
        </div>
    </div>


</div>


<div class="modal fade" id="modalCallbackFormCustom" tabindex="-1" role="dialog" aria-labelledby="modalCallbackFormCustom"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title my-modal-h">Оставьте заявку и мы свяжемся в течении дня</h5>
                <input class="modal_page" type="hidden" name="page">
                <input class="modal_height" type="text" name="height" placeholder="Рост">
                <input class="modal_weight" type="text" name="weight" placeholder="Вес">
                <input class="modal_pils" type="text" name="pils" placeholder="Схема лечения">
<!--
                <label for="upload_file" class="upload_file_button">Загрузить файл</label>
                <input type="file" id="upload_file">
-->
                <input class="modal_phone" type="text" name="tel" placeholder="Телефон" data-required="required" data-mask="+38 (000) 000 00 00">
                <button type="button" class="button--primary send-button modal_contact_form" id="form_chemical">Отправить</button>
                <div class="modal_contact_form_thank">Спасибо, Ваша заявка отправлена.</div>
                <p class="my-modal-p">Не знаете схему лечения? Оставьте заявку и мы подберем для Вас индивидуальный курс лечения.</p>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalHimioForm" tabindex="-1" role="dialog" aria-labelledby="modalHimioForm"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title my-modal-h">Напишите ваш вопрос химиотерапевту</h5>
                <input class="modal_page" type="hidden" name="page">
                <input class="modal_name" type="text" name="name" placeholder="Имя">
                <input class="modal_email" type="text" name="email" placeholder="E-mail">
                <input class="modal_phone" type="text" name="tel" placeholder="Телефон" data-required="required" data-mask="+38 (000) 000 00 00">
                <textarea class="modal_message"  name="message" placeholder="Ваш вопрос"></textarea>
                <button  type="button" class="button--primary send-button modal_contact_form">Отправить</button>
                <div class="modal_contact_form_thank">Спасибо, Ваша заявка отправлена.</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalOrderForm" tabindex="-1" role="dialog" aria-labelledby="modalOrderForm"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title my-modal-h">Запись на прием</h5>
                <input class="modal_page" type="hidden" name="page">
                <input class="modal_name" type="text" name="name" placeholder="ФИО">
                <input class="modal_phone" type="text" name="tel" placeholder="Телефон" data-required="required" data-mask="+38 (000) 000 00 00">
                <input class="modal_date" type="text" name="date" placeholder="Желаемая дата приема">
                <textarea class="modal_message" name="message" placeholder="Комментарий"></textarea>
                <button type="button" class="button--primary send-button modal_contact_form">Отправить</button>
                <div class="modal_contact_form_thank">Спасибо, Ваша заявка отправлена.</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCommentForm" tabindex="-1" role="dialog" aria-labelledby="modalCommentForm"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title my-modal-h">Оставить комментарий</h5>

            </div>
        </div>
    </div>
</div>

<!-- <a href="#" id="toTop">

</a> -->
		<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

<script src="<?php echo get_template_directory_uri().'/js/jquery.mask.js' ?>"></script>
<script type="text/javascript">
  (function(d, w, s) {
	var widgetHash = 'f4b6nzasi236aoyb7pky', gcw = d.createElement(s); gcw.type = 'text/javascript'; gcw.async = true;
	gcw.src = '//widgets.binotel.com/getcall/widgets/'+ widgetHash +'.js';
	var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(gcw, sn);
  })(document, window, 'script');
</script>
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
</body>
</html>
