

<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="modalContactForm"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title"><?php pll_e('Записаться на прием');?></h5>
                <input id="modal_page" type="hidden" name="page">
                <input id="modal_name" type="text" name="name" placeholder="<?php pll_e('Имя');?>">
                <input id="modal_phone" type="text" name="tel" placeholder="<?php pll_e('Телефон');?>" data-required="required" data-mask="+38 (000) 000 00 00">
                <!-- <button id="modal_contact_form" type="button" class="button--primary" data-dismiss="modal">Отправить</button> -->
                <button id="modal_contact_form" type="button" class="button--primary"><?php pll_e('Отправить');?></button>
                <div id="modal_contact_form_thank"><?php pll_e('Спасибо, Ваша заявка отправлена.');?></div>
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
                <h5 class="modal-title my-modal-h"><?php pll_e('Оставьте заявку и мы свяжемся в течении дня');?></h5>
                <input class="modal_page" type="hidden" name="page">
                <input class="modal_height" type="text" name="height" placeholder="Рост">
                <input class="modal_weight" type="text" name="weight" placeholder="Вес">
                <input class="modal_pils" type="text" name="pils" placeholder="Схема лечения">
                <!--
                                <label for="upload_file" class="upload_file_button">Загрузить файл</label>
                                <input type="file" id="upload_file">
                -->
                <input class="modal_phone" type="text" name="tel" placeholder="Телефон" data-required="required" data-mask="+38 (000) 000 00 00">
                <button type="button" class="button--primary send-button modal_contact_form" id="form_chemical"><?php pll_e('Отправить');?></button>
                <div class="modal_contact_form_thank"><?php pll_e('Спасибо, Ваша заявка отправлена.');?></div>
                <p class="my-modal-p"><?php pll_e('Не знаете схему лечения? Оставьте заявку и мы подберем для Вас индивидуальный курс лечения.');?></p>
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
                <h5 class="modal-title my-modal-h"><?php pll_e('Напишите ваш вопрос химиотерапевту');?></h5>
                <input class="modal_page" type="hidden" name="page">
                <input class="modal_name" type="text" name="name" placeholder="Имя">
                <input class="modal_email" type="text" name="email" placeholder="E-mail">
                <input class="modal_phone" type="text" name="tel" placeholder="Телефон" data-required="required" data-mask="+38 (000) 000 00 00">
                <textarea class="modal_message"  name="message" placeholder="Ваш вопрос"></textarea>
                <button  type="button" class="button--primary send-button modal_contact_form"><?php pll_e('Отправить');?></button>
                <div class="modal_contact_form_thank"><?php pll_e('Спасибо, Ваша заявка отправлена.');?></div>
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
                <h5 class="modal-title my-modal-h"><?php pll_e('Запись на прием');?></h5>
                <input class="modal_page" type="hidden" name="page">
                <input class="modal_name" type="text" name="name" placeholder="<?php pll_e('ФИО');?>">
                <input class="modal_phone" type="text" name="tel" placeholder="<?php pll_e('Телефон');?>" data-required="required" data-mask="+38 (000) 000 00 00">
                <input class="modal_date" type="text" name="date" placeholder="<?php pll_e('Желаемая дата приема');?>">
                <textarea class="modal_message" name="message" placeholder="<?php pll_e('Комментарий');?>"></textarea>
                <button type="button" class="button--primary send-button modal_contact_form"><?php pll_e('Отправить');?></button>
                <div class="modal_contact_form_thank"><?php pll_e('Спасибо, Ваша заявка отправлена.');?></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCommentForm" tabindex="-1" role="dialog" aria-labelledby="modalCommentForm"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="close footer-modal-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-modal">
                            <h5 class="modal-title my-modal-h"><?php pll_e('Оставить отзыв');?></h5>
                            <div class="comments__form comments__form--modal">
                                <?php $comments_form_modal = array(
                                    'label_submit' => 'Отправить',
                                    'comment_notes_after' => '',
                                    'comment_field' => '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="'.pll__('Комментарий').'"></textarea>',
                                    'fields' => array(
                                        'author' => '<label for="author"><input id="author" name="author" placeholder="'.pll__('Имя').'*" type="text" value="" size="30"></label>',
                                        'email' => '<label for="email"><input id="email" name="email" placeholder="'.pll__('E-mail').'*" type="text" value="" size="30"></label>',
                                        'rating'  => ''
                                    )
                                );
                                comment_form( $comments_form_modal ); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-pc">
                        <div class="modal-comment-img">
                            <img src="<?= get_template_directory_uri(); ?>/img/tablet.png" alt="Clinic Target">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>