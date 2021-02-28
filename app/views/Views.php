<?php

namespace app\views;
use function Composer\Autoload\includeFile;

class Views
{
    public static function render($file_name)
    {
        include 'part/'.$file_name. '.php' ;
    }
    public static function render_admin($file_name)
    {

        include PATHPLUGIN. 'app/views/admin/'. $file_name . '.php';

    }
}