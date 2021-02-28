<?php
include ('constants.php');
require_once 'vendor/autoload.php';
use app\controllers\MenuController;
use app\controllers\dbcontroller;

add_action('after_switch_theme', 'action_after_setup_theme');
add_action('admin_menu', array(MenuController::class, 'my_menu_pages'));



function wpb_custom_new_menu() {
    register_nav_menu('my-custom-menu',__( 'بالا در سر صفحه' ));
}
add_action( 'init', 'wpb_custom_new_menu' );
add_theme_support( 'post-thumbnails' );




function action_after_setup_theme()
{
    dbcontroller::connection();
}

add_action('admin_head', 'my_custom_css');

function open_media()
{
    wp_enqueue_media(  );
}
add_action('admin_enqueue_scripts','open_media');
function my_custom_css()
{
    echo '<style>
 
  </style>';
}


function my_ajax_works_and_im_positive() {
    return true;
}

add_filter( 'give_test_ajax_works', 'my_ajax_works_and_im_positive' );



function misha_add_term_fields( $taxonomy ) {
  //  wp_editor('test','test')
    echo '
<hr>
<div class="form-field">
	<label for="misha-text">متن آیتم اول</labe>	<input type="text" name="name_item_top1" id="misha-text" />
	<p>توضیحاتی که در بالای لیست قیمت نمایش داده میشود./p>

	</div> <hr>';
}

add_action( 'product_cat_edit_form_fields', 'misha_edit_term_fields', 10, 2 );


function misha_edit_term_fields( $term, $taxonomy ) {

    $value = get_term_meta( $term->term_id, 'name_item_top1', true );
    $value1 = get_term_meta( $term->term_id, 'image_product1', true );
    $value2 = get_term_meta( $term->term_id, 'link_item_top1', true );

    echo '<tr class="form-field">
	<th>
		<label for="misha-text">آیتم اول</label>
	</th>
	<td>    
		<input name="name_item_top1" id="misha-text" type="text" value="' . esc_attr( $value ) .'" />
		<p class="description">متن ایتم اول را ویرایش کنید</p>
		
		<input name="image_product1" id="image_product1" type="text" value="' . esc_attr( $value1 ) .'" />
		<p class="description">عکس ایتم اول را ویرایش کنید</p>
		 <p><a href="#" id="btn_upload_category1" class="button button-secondary">انتخاب عکس </a></p>
		
		<input name="link_product1" id="misha-text" type="text" value="' . esc_attr( $value2 ) .'" />
		<p class="description">لینک ایتم اول را ویرایش کنید</p>
	</td>
	</tr>';

}

add_action( 'created_product_cat', 'misha_save_term_fields' );
add_action( 'edited_product_cat', 'misha_save_term_fields' );

function misha_save_term_fields( $term_id ) {

    update_term_meta(
        $term_id,
        'name_item_top1',
        sanitize_text_field( $_POST[ 'name_item_top1' ] )
    );

    update_term_meta(
        $term_id,
        'image_product1',
        sanitize_text_field( $_POST[ 'image_product1' ] )
    );

    update_term_meta(
        $term_id,
        'link_item_top1',
        sanitize_text_field( $_POST[ 'link_product1' ] )
    );

}