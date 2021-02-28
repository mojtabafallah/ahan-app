<?php

namespace  app\controllers;
class Assets
{

    public static function css($file_name_css)
    {
        return  THEME_URI.'/assets/css/'. $file_name_css;
    }

    public static function image($file_name_image)
    {

        return  THEME_URI.'/assets/images/'. $file_name_image;
    }

    public static function js($file_name_js)
    {
        return  THEME_URI.'/assets/js/'. $file_name_js;
    }

}

