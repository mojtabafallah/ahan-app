<?php

namespace app\admin;
use app\views\Views;

class panel
{
    public static function load_admin_panel()
    {
        Views::render_admin('main');
    }

    public static function load_menu_import()
    {


    }

}