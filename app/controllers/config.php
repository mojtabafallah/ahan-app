<?php

namespace app\controllers;

use app\admin\panel;
use app\controllers\dbcontroller;
use Illuminate\Database\Capsule\Manager as Capsule;

class config
{
    public static function init()
    {

        dbcontroller::connection();

    }


    public static function my_css()
    {
        echo '<style>
        .col-1 {width: 8.33%;}
    .col-2 {width: 16.66%;}
    .col-3 {width: 25%;}
    .col-4 {width: 33.33%;}
    .col-5 {width: 41.66%;}
    .col-6 {width: 50%;}
    .col-7 {width: 58.33%;}
    .col-8 {width: 66.66%;}
    .col-9 {width: 75%;}
    .col-10 {width: 83.33%;}
    .col-11 {width: 91.66%;}
    .col-12 {width: 100%;}
    [class*="col-"] {
        float: right;
        padding: 15px;
    }    
    
  </style>';

    }

    public static function add_menu_admin()
    {
        add_menu_page('تنظیمات پلاگین بیمه', 'تنظیمات پلاگین بیمه', 'manage_options', 'setting_plugin_bime', array(panel::class, 'load_admin_panel'));
        add_submenu_page('setting_plugin_bime', 'وارد کردن اطلاعات', 'اطلاعات', 'manage_options', 'setting_import_data', array(panel::class, 'load_menu_import'));
    }


}