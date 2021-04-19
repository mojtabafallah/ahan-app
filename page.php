<?php
get_header() ?>
<?php
$filter = "";
if (isset($_POST['btn_filter'])) {
    $filter = $_POST['btn_filter'];
} ?>

<?php
$args = array('post_type' => 'product');
$loop = new WP_Query($args);
if ($loop->have_posts()):
    $loop->the_post();
    global $product;
    $category = get_queried_object();

    $category_id = $category->term_id;

    $category_name = $category->name;

endif;


$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'ignore_sticky_posts' => 1,
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'term_id', //This is optional, as it defaults to 'term_id'
            'terms' => $category_id,
            'operator' => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
        ),
        array(
            'taxonomy' => 'product_visibility',
            'field' => 'slug',
            'terms' => 'exclude-from-catalog', // Possibly 'exclude-from-search' too
            'operator' => 'NOT IN'
        )
    )
);
$products = new WP_Query($args);
$arr_size = [];
$arr_zekhamat = [];
$arr_sizemaftol = [];
$arr_scale = [];
$arr_standard = [];
if ($products->have_posts()):
    while ($products->have_posts()):
        $products->the_post();

        global $product;

        $item = array_shift(wc_get_product_terms($product->id, 'pa_size', 'name'));
        if (!empty($item)) {
            $arr_size[] = $item;
        }

        $item = array_shift(wc_get_product_terms($product->id, 'pa_zekhamat', 'name'));
        if (!empty($item)) {
            $arr_zekhamat[] = $item;
        }
        $item = array_shift(wc_get_product_terms($product->id, 'pa_maftolsize', 'name'));
        if (!empty($item)) {
            $arr_sizemaftol[] = $item;
        }
        $item = array_shift(wc_get_product_terms($product->id, 'pa_scale', 'name'));
        if (!empty($item)) {
            $arr_scale[] = $item;
        }
        $item = array_shift(wc_get_product_terms($product->id, 'pa_standard', 'name'));
        if (!empty($item)) {
            $arr_standard[] = $item;
        }
    endwhile;

endif;


$flag = false;


foreach ($arr_size as $obj) {
    $arr_size1 [] = $obj->name;
}
if (!is_null($arr_size1)) {
    $arr_size1 = array_unique($arr_size1);


    $attributes_filter = "<details><summary>سایز</summary>";
    foreach ($arr_size1 as $size) {
        if (!is_null($size))
            $attributes_filter .= '<input type="checkbox" class="chkfilter" value="' . $size . '"/> <label for="size-' . $size . '">' . $size . '</label>';

    }
    $attributes_filter .= '</details>';
}

foreach ($arr_zekhamat as $obj) {
    $arr_zekhamat1 [] = $obj->name;
}
if (!is_null($arr_zekhamat1)) {
    $arr_zekhamat1 = array_unique($arr_zekhamat1);


    $attributes_filter .= "<details><summary>ضخامت</summary>";
    foreach ($arr_zekhamat1 as $zekhamat) {
        if (!is_null($zekhamat))
            $attributes_filter .= '<input type="checkbox" class="chkzekhamat" value="' . $zekhamat . '"/> <label for="zekhamat-' . $zekhamat . '">' . $zekhamat . '</label>';

    }
    $attributes_filter .= '</details>';
}

foreach ($arr_sizemaftol as $obj) {
    $arr_sizemaftol1 [] = $obj->name;
}
if (!is_null($arr_sizemaftol1)) {
    $arr_sizemaftol1 = array_unique($arr_sizemaftol1);


    $attributes_filter .= "<details><summary>سایز مفتول</summary>";
    foreach ($arr_sizemaftol1 as $maftol) {
        if (!is_null($maftol))
            $attributes_filter .= '<input type="checkbox" class="chkmaftol" value="' . $maftol . '"/> <label for="maftol-' . $maftol . '">' . $maftol . '</label>';

    }
    $attributes_filter .= '</details>';
}

foreach ($arr_scale as $obj) {
    $arr_scale1 [] = $obj->name;
}
if (!is_null($arr_scale1)) {
    $arr_scale1 = array_unique($arr_scale1);


    $attributes_filter .= "<details><summary>ابعاد</summary>";
    foreach ($arr_scale1 as $scale) {
        if (!is_null($scale))
            $attributes_filter .= '<input type="checkbox" class="chkscale" value="' . $scale . '"/> <label for="scale-' . $scale . '">' . $scale . '</label>';

    }
    $attributes_filter .= '</details>';
}

foreach ($arr_standard as $obj) {
    $arr_standard1 [] = $obj->name;
}
if (!is_null($arr_standard1)) {
    $arr_standard1 = array_unique($arr_standard1);


    $attributes_filter .= "<details><summary>استاندارد</summary>";
    foreach ($arr_standard1 as $standard) {
        if (!is_null($standard))
            $attributes_filter .= '<input type="checkbox" class="chkstandard" value="' . $standard . '"/> <label for="standard-' . $standard . '">' . $standard . '</label>';

    }
    $attributes_filter .= '</details>';
}

$thumbnail_id = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true);
$image = wp_get_attachment_url($thumbnail_id);
?>

<div class="container pt-5 pb-5">


    <div class="row ltr">

        <div class="col-sm-9">
            <div class="row mr-0 ml-0 border-gray ltr" id="introduce">


                <div class="col-md-3 pt-2 fakeimg">
                    <?php if ($image): ?>
                        <img class="img-fluid border-gray" src="<?php echo $image; ?>" alt="">
                    <?php endif; ?>
                </div>

                <div class="col-md-9">
                    <p id="cate_name" class="h5 font-weight-bold yelow"><?php echo $category_name ?></p>

                    <p class="jojo">
                        <?php echo get_term_meta($category->term_id, 'des_top', true); ?>
                    </p>

                    <button type="button" id="jojobtn" class="btn bg-yelow text-white">
                        نمایش بیشتر
                    </button>

                </div>
            </div>
        </div>

        <div class="col-sm-3">

            <div class="slidbar" id="filter">
                <div class="header-slider bg-yelow text-white p-2">
                    <i class="fas fa-filter h6"></i> فیلتر ها
                </div>
                <ul>
                    <?php echo $attributes_filter; ?>
                </ul>
            </div>

        </div>
        <div class="container">
            <div class="col-sm-12">

                <div class=" p-3 mt-3" id="table">


                </div>

            </div>
        </div>


    </div>
</div>

<script>
    jQuery('#jojobtn').click(function () {
        jQuery('.jojo').toggleClass('active')
    });
</script>

<?php get_footer(); ?>
