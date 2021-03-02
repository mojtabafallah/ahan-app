<?php

require_once('../../../wp-config.php');


if (isset($_POST['name'])):
    $products = array('post_type' => 'product');
    $loop = new WP_Query($args);
    if ($loop->have_posts()):
        $loop->the_post();
        global $product;
        $category = get_queried_object();

        $category_id = $category->term_id;

        $category_name = $category->name;

    endif;
var_dump($category_name);
    $products = new WP_Query(array(
        'post_type' => array('product'),
        'post_status' => 'publish',
        'product_cat' => $category_name,
        'posts_per_page' => -1,
        'meta_query' => array(array(
            'key' => '_visibility',
            'value' => array('catalog', 'visible'),
            'compare' => 'IN',
        )),
        'tax_query' => array(array(
            'taxonomy' => 'pa_size',
            'field' => 'slug',
            'terms' => $_POST['name'],
            'operator' => 'IN',
        ))
    ));

    $p_arr = [];
    $p_kol = [];
    if ($products->have_posts()) {
        while ($products->have_posts()) : $products->the_post();
            $product = wc_get_product(get_the_ID());
            $p_arr['id'] = get_the_ID();
            $p_arr['brand'] = array_shift(wc_get_product_terms($id, 'pa_brand', 'name'));
            $p_arr['brand'] = $p_arr['brand']->name;
            $p_arr['zekhamat'] = array_shift(wc_get_product_terms($id, 'pa_zekhamat', 'names'));
            $p_arr['zekhamat'] = $p_arr['zekhamat']->name;
            $p_arr['size'] = array_shift(wc_get_product_terms($id, 'pa_size', 'names'));
            $p_arr['size'] = $p_arr['size']->name;
            $p_arr['vahed'] = array_shift(wc_get_product_terms($id, 'pa_vahed', 'names'));
            $p_arr['vahed'] = $p_arr['vahed']->name;
            $p_arr['load'] = array_shift(wc_get_product_terms($id, 'pa_load', 'names'));
            $p_arr['load'] = $p_arr['load']->name;
            $p_arr['standard'] = array_shift(wc_get_product_terms($id, 'pa_standard', 'names'));
            $p_arr['standard'] = $p_arr['standard']->name;
            $p_arr['height'] = array_shift(wc_get_product_terms($id, 'pa_height', 'names'));
            $p_arr['height'] = $p_arr['height']->name;
            $p_arr['karkhane'] = array_shift(wc_get_product_terms($id, 'pa_karkhane', 'names'));
            $p_arr['karkhane'] = $p_arr['karkhane']->name;
            $p_arr['length'] = array_shift(wc_get_product_terms($id, 'pa_length', 'names'));
            $p_arr['length'] = $p_arr['length']->name;
            $p_arr['scale'] = array_shift(wc_get_product_terms($id, 'pa_scale', 'names'));
            $p_arr['scale'] = $p_arr['scale']->name;
            $p_arr['status'] = array_shift(wc_get_product_terms($id, 'pa_status', 'names'));
            $p_arr['status'] = $p_arr['status']->name;
            $p_arr['type-p'] = array_shift(wc_get_product_terms($id, 'pa_type-p', 'names'));
            $p_arr['type-p'] = $p_arr['type-p']->name;
            $p_arr['width'] = array_shift(wc_get_product_terms($id, 'pa_width', 'names'));
            $p_arr['width'] = $p_arr['width']->name;
            $p_arr['maftolsize'] = array_shift(wc_get_product_terms($id, 'pa_maftolsize', 'names'));
            $p_arr['maftolsize'] = $p_arr['maftolsize']->name;
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

             as $brand => $item) {
        $height = false;
        $karkhane = false;
        $length = false;
        $scale = false;
        $status = false;
        $type = false;
        $width = false;
        $maftolsize = false;
        $zekhamat = false;
        $size = false;
        $vahed = false;
        $load = false;
        $standard = false;
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
            <?php
            foreach ($item as $it) {
                if (isset($it['height'])): $height = true; ?>

                <?php endif;

            }
            if ($height): ?>
                <th class="dis-none">
                    ارتفاع
                </th>
            <?php endif; ?>

            <?php
            foreach ($item as $it) {
                if (isset($it['karkhane'])): $karkhane = true; ?>

                <?php endif;

            }
            if ($karkhane): ?>
                <th class="dis-none">
                    کارخانه
                </th>
            <?php endif; ?>

            <?php
            foreach ($item as $it) {
                if (isset($it['length'])): $length = true; ?>

                <?php endif;

            }
            if ($length): ?>
                <th class="dis-none">
                    طول شاخه
                </th>
            <?php endif; ?>

            <?php
            foreach ($item as $it) {
                if (isset($it['scale'])): $scale = true; ?>

                <?php endif;

            }
            if ($scale): ?>
                <th class="dis-none">
                    ابعاد
                </th>
            <?php endif; ?>

            <?php
            foreach ($item as $it) {
                if (isset($it['status'])): $status = true; ?>

                <?php endif;

            }
            if ($status): ?>
                <th class="dis-none">
                    وضعیت
                </th>
            <?php endif; ?>

            <?php
            foreach ($item as $it) {
                if (isset($it['type-p'])): $type = true; ?>

                <?php endif;

            }
            if ($type): ?>
                <th class="dis-none">
                    نوع
                </th>
            <?php endif; ?>

            <?php
            foreach ($item as $it) {
                if (isset($it['width'])): $width = true; ?>

                <?php endif;

            }
            if ($width): ?>
                <th class="dis-none">
                    عرض
                </th>
            <?php endif; ?>

            <?php
            foreach ($item as $it) {
                if (isset($it['maftolsize'])): $maftolsize = true; ?>

                <?php endif;

            }
            if ($maftolsize): ?>
                <th class="dis-none">
                    سایز مفتول
                </th>
            <?php endif; ?>

            <?php
            foreach ($item as $it) {
                if (isset($it['zekhamat'])): $zekhamat = true; ?>

                <?php endif;

            }
            if ($zekhamat): ?>
                <th class="dis-none">
                    ضخامت
                </th>
            <?php endif; ?>

            <?php
            foreach ($item as $it) {
                if (isset($it['size'])): $size = true; ?>

                <?php endif;

            }
            if ($size): ?>
                <th class="dis-none">
                    سایز
                </th>
            <?php endif; ?>

            <?php
            foreach ($item as $it) {
                if (isset($it['vahed'])): $vahed = true; ?>

                <?php endif;

            }
            if ($vahed): ?>
                <th class="dis-none">
                    واحد
                </th>
            <?php endif; ?>

            <?php
            foreach ($item as $it) {
                if (isset($it['load'])): $load = true; ?>

                <?php endif;

            }
            if ($load): ?>
                <th class="dis-none">
                    محل بارگیری
                </th>
            <?php endif; ?>

            <?php
            foreach ($item as $it) {
                if (isset($it['standard'])): $standard = true; ?>

                <?php endif;
            }
            if ($standard): ?>
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
            elseif ($height) echo "<td>i</td>";
            if (isset($i['karkhane']))
                echo "<td class='dis-none'>" . $i['karkhane'] . "</td>";
            elseif ($karkhane) echo "<td></td>";
            if (isset($i['length']))
                echo "<td class='dis-none'>" . $i['length'] . "</td>";
            elseif ($length) echo "<td></td>";
            if (isset($i['scale']))
                echo "<td class='dis-none'>" . $i['scale'] . "</td>";
            elseif ($scale) echo "<td></td>";
            if (isset($i['status']))
                echo "<td class='dis-none'>" . $i['status'] . "</td>";
            elseif ($status) echo "<td></td>";
            if (isset($i['type-p']))
                echo "<td class='dis-none'>" . $i['type-p'] . "</td>";
            elseif ($type) echo "<td></td>";
            if (isset($i['width']))
                echo "<td class='dis-none'>" . $i['width'] . "</td>";
            elseif ($width) echo "<td></td>";
            if (isset($i['zekhamat']))
                echo "<td class='dis-none'>" . $i['zekhamat'] . "</td>";
            elseif ($zekhamat) echo "<td></td>";
            if (isset($i['size']))
                echo "<td class='dis-none'>" . $i['size'] . "</td>";
            elseif ($size) echo "<td></td>";
            if (isset($i['vahed']))
                echo "<td class='dis-none'>" . $i['vahed'] . "</td>";
            elseif ($vahed) echo "<td></td>";
            if (isset($i['load']))
                echo "<td class='dis-none'>" . $i['load'] . "</td>";
            elseif ($load) echo "<td></td>";
            if (isset($i['standard']))
                echo "<td class='dis-none'>" . $i['standard'] . "</td>";
            elseif ($standard) echo "<td></td>";
            if (isset($i['price']) && $i['price'] != 0)
                echo "<td>" . $i['price'] . "</td>";
            else
                echo "<td>تماس بگیرید</td>";

            echo "<td>" . $i['date'] . "</td>
                              </tr>";
        }

        echo '</table>';


    }
    wp_reset_postdata();


    echo $_POST['name'];
endif;
?>

<?php
wp_footer();