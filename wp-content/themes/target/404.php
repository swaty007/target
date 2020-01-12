<?php
get_header('short'); ?>
<section class="not-found">
    <div class="container">
        <h1 class="main-title not-found__title">Страница не найдена!</h1>
        <p class="main-text">К сожалению, запрашиваемая Вами страница, не найдена.</p><p class="main-text">Вероятно, она была удалена автором.</p>
        <a href="/" class="brand-btn brand-btn--noarrow not-found__brand-btn">Вернуться на главную</a>
        <img src="<?php bloginfo('template_url'); ?>/img/404/404.svg" alt="" class="not-found__img">
    </div>
</section>
<?php get_footer();
?>