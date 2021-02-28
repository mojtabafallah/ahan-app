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
if ($products->have_posts()):
    while ($products->have_posts()):
        $products->the_post();

        global $product;

        $arr_size[] = array_shift(woocommerce_get_product_terms($product->id, 'pa_size', 'names'));
        $arr_zekhamat[] = array_shift(woocommerce_get_product_terms($product->id, 'pa_zekhamat', 'names'));

    endwhile;

endif;

$attributes_filter = "<details><summary>سایز</summary>";
$arr_size = array_unique($arr_size);
foreach ($arr_size as $size) {
    $attributes_filter .= '<input type="checkbox" id="size-' . $size . '"/> <label for="size-' . $size . '">';

}
$attributes_filter .= '</details>';

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
                    <p class="h5 font-weight-bold yelow"><?php echo $category_name ?></p>

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




                <?php
                // var_dump($category->description);

                echo do_shortcode($category->description);

                $args = [
                    'post_type' => 'product',
                    'product_cat' => $category_name,
                    'posts_per_page' => -1,
                ];
                $products = new WP_Query($args);

                $p_arr = [];
                $p_kol = [];
                if ($products->have_posts()) {
                    while ($products->have_posts()) : $products->the_post();
                        $product = wc_get_product(get_the_ID());
                        $p_arr['id'] = get_the_ID();
                        $p_arr['brand'] = array_shift(woocommerce_get_product_terms($id, 'pa_brand', 'names'));
                        $p_arr['zekhamat'] = array_shift(woocommerce_get_product_terms($id, 'pa_zekhamat', 'names'));
                        $p_arr['size'] = array_shift(woocommerce_get_product_terms($id, 'pa_size', 'names'));
                        $p_arr['vahed'] = array_shift(woocommerce_get_product_terms($id, 'pa_vahed', 'names'));
                        $p_arr['load'] = array_shift(woocommerce_get_product_terms($id, 'pa_load', 'names'));
                        $p_arr['standard'] = array_shift(woocommerce_get_product_terms($id, 'pa_standard', 'names'));
                        $p_arr['height'] = array_shift(woocommerce_get_product_terms($id, 'pa_height', 'names'));
                        $p_arr['karkhane'] = array_shift(woocommerce_get_product_terms($id, 'pa_karkhane', 'names'));
                        $p_arr['length'] = array_shift(woocommerce_get_product_terms($id, 'pa_length', 'names'));
                        $p_arr['scale'] = array_shift(woocommerce_get_product_terms($id, 'pa_scale', 'names'));
                        $p_arr['status'] = array_shift(woocommerce_get_product_terms($id, 'pa_status', 'names'));
                        $p_arr['type-p'] = array_shift(woocommerce_get_product_terms($id, 'pa_type-p', 'names'));
                        $p_arr['width'] = array_shift(woocommerce_get_product_terms($id, 'pa_width', 'names'));
                        $p_arr['maftolsize'] = array_shift(woocommerce_get_product_terms($id, 'pa_maftolsize', 'names'));
                        $p_arr['date'] = get_the_date();
                        $p_arr['name'] = get_the_title();
                        $p_arr['price'] = $product->get_price();

                        $p_kol[] = $p_arr;
                    endwhile;
                } else {
                    echo __('محصولی یافت نشد');
                }
                $price = array();

                foreach ($p_kol as $key => $row) {
                    $price[$key] = $row['zekhamat'];
                }
                array_multisort($price, SORT_DESC, $p_kol);

                $group = array();

                foreach ($p_kol as $value) {

                    $group[$value['brand']][] = $value;
                }
                foreach ($group

                as $brand => $item)
                {
                echo '<h1>' . $brand . '</h1>';
                ?>
                <table style="border-collapse: collapse; border: solid 1px black">
                    <tr>
                        <th>
                            نام
                        </th>
                        <th class="dis-none">
                            برند
                        </th>
                        <?php if (isset($item[0]['height'])): ?>
                            <th class="dis-none">
                                ارتفاع
                            </th>
                        <?php endif; ?>
                        <?php if (isset($item[0]['karkhane'])): ?>
                            <th class="dis-none">
                                کارخانه
                            </th>
                        <?php endif; ?>
                        <?php if (isset($item[0]['length'])): ?>
                            <th class="dis-none">
                                طول شاخه
                            </th>
                        <?php endif; ?>
                        <?php if (isset($item[0]['scale'])): ?>
                            <th class="dis-none">
                                ابعاد
                            </th>
                        <?php endif; ?>
                        <?php if (isset($item[0]['status'])): ?>
                            <th class="dis-none">
                                وضعیت
                            </th>
                        <?php endif; ?>
                        <?php if (isset($item[0]['type-p'])): ?>
                            <th class="dis-none">
                                نوع
                            </th>
                        <?php endif; ?>
                        <?php if (isset($item[0]['width'])): ?>
                            <th class="dis-none">
                                عرض
                            </th>
                        <?php endif; ?>
                        <?php if (isset($item[0]['maftolsize'])): ?>
                            <th class="dis-none">
                                سایز مفتول
                            </th>
                        <?php endif; ?>
                        <?php if (isset($item[0]['zekhamat'])): ?>
                            <th class="dis-none">
                                ضخامت
                            </th>
                        <?php endif; ?>
                        <?php if (isset($item[0]['size'])): ?>
                            <th class="dis-none">
                                سایز
                            </th>
                        <?php endif; ?>
                        <?php if (isset($item[0]['vahed'])): ?>
                            <th class="dis-none">
                                واحد
                            </th>
                        <?php endif; ?>
                        <?php if (isset($item[0]['load'])): ?>
                            <th class="dis-none">
                                محل بارگیری
                            </th>
                        <?php endif; ?>
                        <?php if (isset($item[0]['standard'])): ?>
                            <th class="dis-none">
                                استاندارد
                            </th>
                        <?php endif; ?>
                        <th>
                            قیمت (تومان)
                        </th>

                        <th>
                            تاریخ به روز رسانی
                        </th>
                    </tr>
                    <?php
                    foreach ($item as $i) {
                        echo "<tr><td> <a href=" . get_permalink() . ">" . $i['name'] . "</a></td>
                                  <td class='dis-none'>" . $i['brand'] . "</td>";
                        if (isset($i['height']))
                            echo "<td class='dis-none'>" . $i['height'] . "</td>";
                        if (isset($i['karkhane']))
                            echo "<td class='dis-none'>" . $i['karkhane'] . "</td>";
                        if (isset($i['length']))
                            echo "<td class='dis-none'>" . $i['length'] . "</td>";
                        if (isset($i['scale']))
                            echo "<td class='dis-none'>" . $i['scale'] . "</td>";
                        if (isset($i['status']))
                            echo "<td class='dis-none'>" . $i['status'] . "</td>";
                        if (isset($i['type-p']))
                            echo "<td class='dis-none'>" . $i['type-p'] . "</td>";
                        if (isset($i['width']))
                            echo "<td class='dis-none'>" . $i['width'] . "</td>";
                        if (isset($i['zekhamat']))
                            echo "<td class='dis-none'>" . $i['zekhamat'] . "</td>";
                        if (isset($i['size']))
                            echo "<td class='dis-none'>" . $i['size'] . "</td>";
                        if (isset($i['vahed']))
                            echo "<td class='dis-none'>" . $i['vahed'] . "</td>";
                        if (isset($i['load']))
                            echo "<td class='dis-none'>" . $i['load'] . "</td>";
                        if (isset($i['standard']))
                            echo "<td class='dis-none'>" . $i['standard'] . "</td>";
                        if (isset($i['price']) && $i['price'] != 0)
                            echo "<td>" . $i['price'] . "</td>";
                        else
                            echo "<td>تماس بگیرید</td>";

                        echo "<td>" . $i['date'] . "</td>
                              </tr>";
                    }

                    echo '</table>';


                    }
                    wp_reset_postdata(); ?>


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
