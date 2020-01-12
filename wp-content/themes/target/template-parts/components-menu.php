<header class="header" id="header" >
    <div class="header-top-area" id="scroolup">
        <!--MAINMENU CONTROL AREA-->
        <div class="mainmenu-area" id="mainmenu-area">
            <div class="mainmenu-area-bg"></div>
            <nav class="navbar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="navbar-header">
                                <a href="<?= get_home_url();?>" class="navbar-brand">
                                    <span class="default-logo">
                                        <img src="<?= get_template_directory_uri(); ?>/img/logo.svg" alt="logo">
                                    </span>
                                </a>
                            </div>
                            <div id="menu-controller">
                                <div id="menu-icon">
                                    <div class="menu-icon-stack" id="menu-icon-stack">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <div class="menu-icon-close" id="menu-icon-close">
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!--END MAINMENU CONTROL AREA END-->
    </div>

    <!--END MAINMENU AREA-->
    <div id="menu-wrapper">
        <div id="menu-content">
            <nav id="main-menu">

                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    'container'      => 'ul'
                ) );
                ?>
            </nav>
        </div>
        <div id="bg-primary" class=""></div>
    </div>
    <div id="white-bar"></div>
    <!--END MAINMENU AREA-->
</header>
