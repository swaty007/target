<?php
/* Template Name: About */

get_header();
the_post();
?>




    <main class="content">
        <section class="section content--bg-img title-block title--about"
                 style="background-image: linear-gradient(180deg, rgba(16, 37, 85, 0.7) 20%, rgba(0, 35, 118, 0.6) 99.31%), url(<?php the_post_thumbnail_url() ?>)">
            <div class="wrapper">
                <div class="section__content">
                    <h3 class="text--18">
                        <?php the_breadcrumb() ?>
                    </h3>
                    <h1 class="text--48">
                        <?php the_title() ?>
                    </h1>
                    <h4 class="text--18">
                        <?php the_excerpt() ?>
                    </h4>
                </div>
            </div>
        </section>
        <section class="section about-clinic section--large-text">
            <div class="wrapper w-920px">
                <?php the_content(); ?>
<!--                <div class="large-text-img">-->
<!--                    <h3 class="title--small">-->
<!--                        История клиники-->
<!--                    </h3>-->
<!--                    <div class="flex-block">-->
<!--                        <div class="large__txt">-->
<!--                            <p class="text">-->
<!--                                Основатель «Клиники TARGET» профессор Киркилевский С.И. всю свою жизнь посвятил клинической-->
<!--                                онкологии. В 1982 г. он начал работать хирургом-онкологом. За прошедшие годы выполнил тысячи-->
<!--                                сложных хирургических операций по поводу рака, наблюдал тысячи пациентов с этой тяжелой-->
<!--                                патологией. С накоплением опыта росла неудовлетворенность результатами работы. Хирургическое-->
<!--                                удаление опухоли не гарантирует от развития рецидива болезни. Операцию можно выполнить-->
<!--                                далеко не-->
<!--                                всем больным. Последние достижения науки убеждают, что ситуацию можно улучшить, прибегнув к-->
<!--                                персонализированной медицине, однако реалии онкологической больницы, существующей на-->
<!--                                бюджетные-->
<!--                                деньги, не позволяют провести лечение с использованием таргетных препаратов и иммунотерапии.-->
<!--                            </p>-->
<!--                            <p class="text">-->
<!--                                Выходом из существующего положения стало создание независимой «Клиники TARGET», которая-->
<!--                                начала-->
<!--                                свою работу в начале 2018 г.-->
<!--                            </p>-->
<!--                        </div>-->
<!--                        <div class="large__img">-->
<!--                            <img src="--><?php //bloginfo('template_url'); ?><!--/img/headmas.png" alt="">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

                <div class="title-box flex-block">
                    <div class="title-text title--small">
                        Наша клиника эффективно решает целый ряд задач:
                    </div>
                </div>
                <div class="info-box info-box--text flex-block">
                    <div class="info-box__item">
                        <div class="left-img-text">
                            <img src="<?php bloginfo('template_url'); ?>/img/highhelp.svg" alt="">
                            <p class="title-img font-normal">
                                Квалифицированная консультативная помощь онкологическим больным, в т.ч., предоставление
                                услуги «иное мнение».
                            </p>
                        </div>

                    </div>
                    <div class="info-box__item">
                        <div class="left-img-text">
                            <img src="<?php bloginfo('template_url'); ?>/img/tablet_icon.svg" alt="">
                            <p class="title-img font-normal">
                                На основе международных стандартов индивидуальный подбор наиболее современных схем и
                                протоколов персонифицированного лечения.
                            </p>
                        </div>
                    </div>
                    <div class="info-box__item">
                        <div class="left-img-text">
                            <img src="<?php bloginfo('template_url'); ?>/img/btldrug.svg" alt="">
                            <p class="title-img font-normal">
                                Проведение амбулаторного медикаментозного лечения, в частности, таргетной терапии,
                                иммунотерапии, химиотерапии, инфузионной терапии, терапии сопровождения и др.
                            </p>
                        </div>
                    </div>
                    <div class="info-box__item">
                        <div class="left-img-text">
                            <img src="<?php bloginfo('template_url'); ?>/img/grouphelp.svg" alt="">
                            <p class="title-img font-normal">
                                Диспансерное наблюдение за онкологическими пациентами, независимо от того, в каком
                                лечебном учреждении ранее проводилось их лечение.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section about-clinic section--map">
            <div class="wrapper">
                <h3 class="title--small">
                    География наших пациентов
                </h3>
                <div class="map-group">
                    <img src="<?php bloginfo('template_url'); ?>/img/map_ukraine.svg" class="map_ukraine" alt="">
                    <div class="map-group__clients">
                        <h5 class="text map--title">
                            А также лечим пациентов из таких стран:
                        </h5>
                        <p>
                            <img src="<?php bloginfo('template_url'); ?>/img/flag-italy.svg" alt="">
                            Италия - 5 пациентов
                        </p>
                        <p>
                            <img src="<?php bloginfo('template_url'); ?>/img/flag-greece.svg" alt="">
                            Греция - 10 пациентов
                        </p>
                        <p>
                            <img src="<?php bloginfo('template_url'); ?>/img/flag-russia.svg" alt="">
                            Россия - 15 пациентов
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section about-clinic work-principles">
            <div class="wrapper">
                <h3 class="title--small">
                    Основные принципы работы клиники
                </h3>
                <div class="info-box info-box--text flex-block">
                    <div class="info-box__item">
                        <div class="top-img-text">
                            <img src="<?php bloginfo('template_url'); ?>/img/help-heart.svg" alt="">
                            <p class="title-img font-normal">
                                Искреннее желание помочь каждому пациенту.
                            </p>
                        </div>
                    </div>
                    <div class="info-box__item">
                        <div class="top-img-text">
                            <img src="<?php bloginfo('template_url'); ?>/img/microsc.svg" alt="">
                            <p class="title-img font-normal">
                                Только современные подходы к диагностике и лечению.
                            </p>
                        </div>
                    </div>
                    <div class="info-box__item">
                        <div class="top-img-text">
                            <img src="<?php bloginfo('template_url'); ?>/img/stars.svg" alt="">
                            <p class="title-img font-normal">
                                Стремление к идеальному качеству услуг.
                            </p>
                        </div>
                    </div>
                    <div class="info-box__item">
                        <div class="top-img-text">
                            <img src="<?php bloginfo('template_url'); ?>/img/medcur.svg" alt="">
                            <p class="title-img font-normal">
                                Постоянное повышение квалификации сотрудников
                            </p>
                        </div>
                    </div>
                </div>
                <div class="gallery">
                    <h3 class="title--small">
                        Галлерея
                    </h3>
                    <div class="gallery__nav">
                        <div data-click="#gallery-1" class="gallery__nav-item text active">Оборудование</div>
                        <div data-click="#gallery-2" class="gallery__nav-item text">Лечебный процесс</div>
                        <div data-click="#gallery-3" class="gallery__nav-item text">Интерьер</div>
                        <div data-click="#gallery-4" class="gallery__nav-item text">Врачи</div>
                    </div>
                    <div id="gallery-1" class="gallery-content show-gallery">
                        <div class="slider">
                            <div class="slick-horizontal">
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal1.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal2.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal3.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal4.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal5.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal6.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal7.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal8.png" class="gallery-content__item" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="gallery-2" class="gallery-content">
                        <div class="slider">
                            <div class="slick-horizontal">
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal1.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal2.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal3.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal4.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal5.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal6.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal7.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal8.png" class="gallery-content__item" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="gallery-3" class="gallery-content">
                        <div class="slider">
                            <div class="slick-horizontal">
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal1.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal2.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal3.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal4.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal5.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal6.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal7.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal8.png" class="gallery-content__item" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="gallery-4" class="gallery-content">
                        <div class="slider">
                            <div class="slick-horizontal">
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal1.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal2.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal3.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal4.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal5.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal6.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal7.png" class="gallery-content__item" alt="">
                                </div>
                                <div class="slick-item">
                                    <img src="<?php bloginfo('template_url'); ?>/img/gal8.png" class="gallery-content__item" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif; ?>
            </div>
        </section>
    </main>


    <img src="<?php bloginfo('template_url'); ?>/img/uil-clock.svg" alt="location">
<?= get_post_meta($post->ID,'address', true) ?>


<?php
get_footer();
