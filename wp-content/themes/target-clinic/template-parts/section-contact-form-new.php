<div class="appointment appointment-faq flex-block hide-on-mob">
    <img src="<?php bloginfo('template_url'); ?>/img/tablet.png" class="image" alt="">
    <div class="appointment__text">
        <p class="title--small">
            <?php pll_e('Задайте вопрос онлайн');?>
        </p>
        <div class="appointment-faq__form">
            <form action="">
                <label for="question_name">
                    <input id="question_name" type="text" name="name"
                           placeholder="<?php pll_e('Имя');?>">
                </label>
                <label for="question_email">
                    <input id="question_email" type="email" name="Email"
                           placeholder="<?php pll_e('E-mail');?>">
                </label>
                <textarea name="comment" id="question_comment" cols="30" rows="6"
                          placeholder="<?php pll_e('');?>Напишите ваш вопрос..."></textarea>
                <button id="question_form" type="button" class="button button--primary">
                    <?php pll_e('Отправить');?>
                </button>
            </form>
        </div>
    </div>
</div>

<section class="services_new__form">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 class="">
                    Позвоните нам
                    или оставьте заявку
                </h4>
                <p class="">
                    Наши менеджеры Вам перезвонят
                    в кратчайшие сроки
                </p>
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
                    <a href="tel:+<?= preg_replace( '/[^0-9]/', '', get_the_title() )?>"
                       class="">
                        <?php the_title(); ?>
                    </a>
                <?php endwhile; wp_reset_query(); ?>
            </div>
            <div class="col-md-6">
                <form action="">
                    <label for="question_name">
                        <input id="question_name" type="text" name="name"
                               placeholder="<?php pll_e('Имя');?>">
                    </label>
                    <label for="question_email">
                        <input id="question_email" type="email" name="Email"
                               placeholder="<?php pll_e('E-mail');?>">
                    </label>
                    <input class="modal_phone" type="text" name="tel" placeholder="<?php pll_e('Телефон');?>"
                           data-required="required" data-mask="+38 (000) 000 00 00">
                    <textarea name="comment" id="question_comment" cols="30" rows="6"
                              placeholder="<?php pll_e('');?>Напишите ваш вопрос..."></textarea>
                    <button id="question_form" type="button" class="button button--primary">
                        <?php pll_e('Отправить');?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>