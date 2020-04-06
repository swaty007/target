<?php the_post();?>
<?php if (have_rows('dropdown_seo')):?>
    <div class="content-toggle content-toggle--top">
        <?php $count = 0; while (have_rows('dropdown_seo')): the_row();?>
            <div class="content-toggle__item">
                <div class="toggle-item__header <?= ($count === 0) ? 'active' : '';?>">
                    <p class="text">
                        <?= get_sub_field('title') ?>
                    </p>
                </div>

                <div class="toggle-item__body" <?= ($count === 0) ? 'style="display: block"' : '';?>>
                    <div class="section--large-text">
                        <?= get_sub_field('text') ?>
                    </div>
                </div>
            </div>
        <?php $count++; endwhile;?>
    </div>
<?php endif;?>