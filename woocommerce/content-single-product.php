<?php use app\views\Views;

get_header(); ?>

    <div class="container--header">
        <div class="col-12">
            <?php
            // The tax query
            $tax_query[] = array(
                'taxonomy' => 'product_visibility',
                'field' => 'name',
                'terms' => 'featured',
                'operator' => 'IN', // or 'NOT IN' to exclude feature products
            );

            $args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
            );

            $loop = new WP_Query($args);

            if ($loop->have_posts()):
                $loop->the_post();
                global $product;
                ?>
                <div class="product-content">
                    <div class="product-title">
                        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($loop->post->ID), 'single-post-thumbnail'); ?>
                        <img src="<?php echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>" alt="">
                        <h2><?php echo the_title(); ?></h2>
                    </div>


                    <div>

                        <?php
                        $product_description = get_post($loop->post)->post_excerpt;
                        echo $product_description;

                        ?>


                    </div>

                    <div class="content-table">
                        <?php
                        $atts = wc_get_attribute_taxonomies();

                        $attributes = $product->get_attributes();

                        ?>

                        <table>
                            <tr>
                                <th>کد محصوص</th>
                                <?php foreach ($atts as $att): ?>
                                    <th><?php echo $att->attribute_label ?></th>
                                <?php endforeach; ?>

                            </tr>
                            <tr>
                                <td><?php echo $loop->post->ID ?></td>
                                <?php
                                foreach ($attributes

                                         as $attribute) {
                                    if ($attribute['is_taxonomy']) {
                                        $values = wc_get_product_terms($product->id, $attribute['name'], array('fields' => 'names'));
                                        foreach ($values

                                                 as $value):
                                            ?>
                                            <td><?php echo $value; ?></td>
                                        <?php endforeach; ?>
                                        <?php
                                    }
                                }
                                ?>
                            </tr>
                        </table>
                    </div>
                    <div class="title-bar">
                        <strong>نمودار قیمت</strong>
                    </div>
                    <?php echo  the_content()?>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php get_footer(); ?>