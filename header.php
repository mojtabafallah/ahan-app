<?php use app\controllers\Assets;?>
<html lang="fa">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>اپ آهن</title>
    <link rel="stylesheet" href="<?php echo Assets::css('bootstrap-rtl.min.css')?> " />
    <link rel="stylesheet" href="<?php echo Assets::css('owl.carousel.min.css')?>" />
    <link rel="stylesheet" href="<?php echo Assets::css('owl.theme.default.min.css')?>" />
    <link rel="stylesheet" href="<?php echo Assets::css('font-awesome.min.css')?>" />
    <link rel="stylesheet" href="<?php echo Assets::css('fontawesome.min.css')?>" />
    <link rel="stylesheet" href="<?php echo Assets::css('flickity-docs.css')?>" />
    <link rel="stylesheet" href="<?php echo Assets::css('jquery.sidr.bare.css')?>" />
    <link rel="stylesheet" href="<?php echo Assets::css('swiper-bundle.min.css')?>" />
    <link rel="stylesheet" href="<?php echo Assets::css('style.css')?>" />
    <link rel="stylesheet" href="<?php echo Assets::css('responsive.css')?>" />
    <link rel="stylesheet" href="<?php echo Assets::css('table.css')?>" />
    <?php wp_head();?>
</head>

<body>
<div class="col-12 col-content">
    <div class="contentt">
        <div class="content">
            <div class="container--header">
                <header>
                    <div class="col-12">
                        <div class="header">
                            <div class="logo">
                                <img src="<?php echo Assets::image('logo.png')?>" alt="logo" />
                            </div>
                            <div class="content-header-left">
                                <a href="tel:02166911007">
                                    <div class="phone">
                                        <i class="fa fa-phone"></i> <b>٠٢١</b>٩١٩١٩١٩
                                    </div>
                                </a>
                                <div class="border-heigth"></div>
                                <form>
                                    <input type="text" name="" id="" />
                                    <button><img src="<?php echo Assets::image('loupe.png')?>" alt="" /></button>
                                </form>
                            </div>
                        </div>
                        <div class="menu d-none d-md-block">

                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'my-custom-menu',
                                'container_class' => 'custom-menu-class' ) );
                            ?>
                        </div>
                        <div class="menu-mobile d-block d-md-none">
                            <button class="btn-oppen-menu">
                                <i class="fa fa-bars"></i> فهرست دسته بندی ها
                            </button>
                            <ul>
                                <li><a href="#">تیرآهن</a></li>
                                <li><a href="#">تیرآهن</a></li>
                                <li><a href="#">تیرآهن</a></li>
                                <li class="megamenu">
                                    <a>تیرآهن <i class="fa fa-sort-down"></i></a>
                                    <ul>
                                        <li><a href="#">تست</a></li>
                                        <li><a href="#">تست</a></li>
                                        <li><a href="#">تست</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">تیرآهن</a></li>
                                <li><a href="#">تیرآهن</a></li>
                                <li><a href="#">تیرآهن</a></li>
                                <li><a href="#">تیرآهن</a></li>
                                <li><a href="#">تیرآهن</a></li>
                                <button>بستن فهرست</button>
                            </ul>
                        </div>
                    </div>
                </header>
            </div>