<?php use app\views\Views;

get_header();?>

<?php  Views::render('slider');?>
<?php  Views::render('container');?>
<?php  Views::render('article-content');?>
<?php  Views::render('container-home');?>

<?php get_footer(); ?>
