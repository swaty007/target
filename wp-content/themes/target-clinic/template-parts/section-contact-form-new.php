<section class="services_new__form">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h4 class="services_new--sub-title mb-2">
                    <?php pll_e('Позвоните нам или оставьте заявку');?>
                </h4>
                <p class="mb-5">
                    <?php pll_e('Наши менеджеры Вам перезвонят в кратчайшие сроки');?>
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
                       class="services_new__form--phone">
                        <?php the_title(); ?>
                    </a>
                <?php endwhile; wp_reset_query(); ?>
            </div>
            <div class="col-lg-5 offset-lg-2">
                <form action="">
                    <label class="services_new__form--label mb-4" for="question_name">
                        <?php pll_e('ФИО');?>
                        <input id="question_name" type="text" name="name"
                               placeholder="Андрей Андреевич Андреев">
                    </label>
                    <label class="services_new__form--label mb-4" for="question_phone">
                        <?php pll_e('Телефон');?>
                        <input class="modal_phone" id="question_phone" type="text" name="tel" placeholder="+380"
                               data-required="required" data-mask="+38 (000) 000 00 00">
                    </label>
                    <button id="question_form" type="button" class="services_new__form--btn">
                        <?php pll_e('Оставить заявку');?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>