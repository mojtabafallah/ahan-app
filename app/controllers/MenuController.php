<?php

namespace app\controllers;
use app\admin\panel;


class MenuController
{


    public static function my_menu_pages()
    {
        add_menu_page('تنظیمات قالب', 'تنظیمات قالب', 'manage_options', 'setting_theme', array(panel::class, 'load_admin_panel'));
        add_submenu_page('setting_theme', 'تنظیمات منو اصلی', 'منو', 'manage_options', 'setting_menu', array(panel::class, 'load_menu_panel'));
        add_submenu_page('setting_theme', 'تنظیمات اسلایدر', 'اسلایدر', 'manage_options', 'setting_slider');
    }

}