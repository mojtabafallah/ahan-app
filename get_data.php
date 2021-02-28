<?php

require_once('../../../wp-config.php');
//echo do_shortcode('[ninja_tables id="9453"]');

$filter = $_POST['name'];

$filter=str_replace('\\','',$filter);
$pos=strpos($filter,']');
substr($filter,0,$pos+1);
echo $filter;


if (isset($_POST['name'])):


  //      echo do_shortcode($filter);

    //echo do_shortcode('[ninja_tables id="9453"]');
endif;

wp_footer();


