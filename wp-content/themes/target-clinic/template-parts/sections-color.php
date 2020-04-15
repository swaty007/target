<?php
$color = get_post_meta($post->ID, 'h1_color', true);
if (!empty($color)):?>
    <style>
        h1, h1 + * {
            color: <?=$color;?>!important;
        }
    </style>
<?php endif;?>
