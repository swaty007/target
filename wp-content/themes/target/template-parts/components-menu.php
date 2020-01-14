<header>
    <div class="header__content">
        <div class="wrapper flex-block">
            <div class="header__item header--address">
                <div class="item__address">
                    <img src="assets/images/uil-clock.svg" alt="">
                    Киев, п-р Воздухофлотский 71/3
                </div>
                <div class="item__address">
                    <img src="assets/images/uil-map-marker.svg" alt="">
                    Пн-Пт с 08:00 до 17:00
                    <a href="" target="_blank" class="link">
                        Как добраться
                    </a>
                </div>
            </div>
            <div class="header__item header--phones flex-block">
                <a href="tel:+380443392221">+38 (044) 339 2221</a>
                <a href="tel:+380506967311">+38 (050) 696 7311</a>
                <a href="tel:+380982334019">+38 (098) 233 4019</a>
            </div>
            <button type="button" class="button button--secondary button--green text--14">
                Записаться на прием
            </button>
        </div>
    </div>
</header>

<nav class="nav nav--transparent">
    <div class="wrapper flex-block">
        <img class="logo" src="assets/images/logo.svg" alt="">
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


                <ul class="nav__list flex-block">
                    <li class="nav__item">
                        <a href="" class="nav__link">
                            Главная
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="" class="nav__link">
                            О клинике
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="" class="nav__link">Услуги</a>
                        <ul class="nav__item">
                            <li class="nav__item">
                                <a href="" class="nav__link">Блог</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav__item">
                        <div class="nav__link link--menu">
                            Услуги
                            <img src="assets/images/fe-arrow-down.svg" alt="">
                        </div>
                        <div class="link__menu">
                            <div class="link__menu-item menu--treatment">
                                Лечение рака
                                <img src="assets/images/fe-arrow-down-green.svg" class="hide-on-mob" alt="">
                                <img src="assets/images/fe-arrow-down.svg" class="show-on-mob" alt="">
                                <div class="menu-item--treatment">
                                    <a href="" class="treatment__name">
                                        Рак легких
                                    </a>
                                    <a href="" class="treatment__name">
                                        Рак желудка
                                    </a>
                                </div>
                            </div>
                            <div class="link__menu-item">
                                Услуга 1
                            </div>
                        </div>
                    </li>
                    <li class="nav__item">
                        <a href="" class="nav__link">
                            Врачи
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="" class="nav__link">
                            Методы лечения
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="" class="nav__link">
                            Пациентам/Блог
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="" class="nav__link">
                            Контакты
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="nav--mobile">
            <div class="nav--mobile__phones">
                <a href="tel:+380443392221">+38 (044) 339 2221</a>
                <img src="assets/images/fe-arrow-down.svg" class="open-mob" alt="">
                <div class="mobile__phones">
                    <a href="tel:+380506967311">+38 (050) 696 7311</a>
                    <a href="tel:+380982334019">+38 (098) 233 4019</a>
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
