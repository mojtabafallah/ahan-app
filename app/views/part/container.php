<?php
$content_tab1 = ot_get_option('content_tab1', false);
$content_tab2 = ot_get_option('content_tab2', false);
$content_tab3 = ot_get_option('content_tab3', false);
$content_tab4 = ot_get_option('content_tab4', false);
$link_tab1=ot_get_option('link_tab1', false);
$link_tab2=ot_get_option('link_tab2', false);
$link_tab3=ot_get_option('link_tab3', false);
$link_tab4=ot_get_option('link_tab4', false);

$description=ot_get_option('description', false);
?>
<div class="container">
    <div class="services">
        <div id="tabs">
            <ul>
                <li>
                    <a href="#tabs-1"><img src="<?php echo \app\controllers\Assets::image('table(1).png')?>" alt="" /> ارسال به سراسر کشور
                    </a>
                </li>
                <li>
                    <a href="#tabs-2"><img src="<?php echo \app\controllers\Assets::image('table(1).png')?>" alt="" /> جداول وزنی
                    </a>
                </li>
                <li>
                    <a href="#tabs-3"><img src="<?php echo \app\controllers\Assets::image('table(1).png')?>" alt="" /> ارائه فاکتور رسمی
                    </a>
                </li>
                <li>
                    <a href="#tabs-4"><img src="<?php echo \app\controllers\Assets::image('table(1).png')?>" alt="" />مشاوره رایگان
                    </a>
                </li>
            </ul>
            <div id="tabs-1">
              <?php if($content_tab1 != false) echo $content_tab1?>
                <a href="<?php if($link_tab1 != false) echo $link_tab1?>"><button>بیشتر</button></a>
            </div>
            <div id="tabs-2">
                <?php if($content_tab2 != false) echo $content_tab2?>
                <a href="<?php if($link_tab2 != false) echo $link_tab2?>"><button>بیشتر</button></a>
            </div>
            <div id="tabs-3">
                <?php if($content_tab3 != false) echo $content_tab3?>
                <a href="<?php if($link_tab3 != false) echo $link_tab3?>"><button>بیشتر</button></a>
            </div>
            <div id="tabs-4">
                <?php if($content_tab4 != false) echo $content_tab4?>
                <a href="<?php if($link_tab4 != false) echo $link_tab4?>"><button>بیشتر</button></a>
            </div>
        </div>
    </div>

    <div id="accordion">
        <span></span>
        <span></span>
        <h3 class="ui-state-activee" id="title-sra">
            <i class="fa fa-chevron-down"></i> توضیحات
        </h3>
        <div>
            <?php if($description != false) echo $description?>
        </div>
    </div>
</div>