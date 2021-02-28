<div class="slider-mainIndex">

    <?php
    $img_slider = ot_get_option('img_slider', false);
    $text_slider = ot_get_option('text_slider', false);
    $text_btn_slider = ot_get_option('text_btn_slider', false);
    $link_btn_slider = ot_get_option('link_btn_slider', false);
    ?>

    <?php if ($img_slider != false): ?>
        <img src="<?php echo $img_slider ?>" alt=""/>
    <?php endif; ?>
    <div class="content-slid">

        <img src="<?php echo \app\controllers\Assets::image('logo-orginal.png') ?>" alt=""/>
        <strong>
            <?php if ($text_slider != false) {
                echo $text_slider;
            } ?></strong>
        <a href="<?php if($link_btn_slider != false) echo $link_btn_slider?>">
            <button><?php if($text_btn_slider !=false) echo $text_btn_slider?></button>
        </a>
    </div>
</div>