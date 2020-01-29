<div class="appointment appointment-faq flex-block hide-on-mob">
    <img src="<?php bloginfo('template_url'); ?>/img/tablet.png" class="image" alt="">
    <div class="appointment__text">
        <h3 class="title--small">
            Задайте вопрос онлайн
        </h3>
        <div class="appointment-faq__form">
            <form action="">
                <label for="question_name">
                    <input id="question_name" type="text" name="name"
                           placeholder="Имя">
                </label>
                <label for="question_email">
                    <input id="question_email" type="email" name="Email"
                           placeholder="E-mail">
                </label>
                <textarea name="comment" id="question_comment" cols="30" rows="6"
                          placeholder="Напишите ваш вопрос..."></textarea>
                <button id="question_form" type="button" class="button button--primary">
                    Отправить
                </button>
            </form>
        </div>
    </div>
</div>