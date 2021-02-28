<div class="article-content">
    <div class="container--home">
        <?php
        $recent_posts = wp_get_recent_posts( 4 );
        foreach( $recent_posts as $post ):

        ?>
        <div class="col-12 col-md-6 col-md-4 col-lg-3">
            <div class="article">
                <a href="<?php echo  get_permalink($post["ID"])?>">
                    <div class="article-header">

                        <img src="  <?php echo get_the_post_thumbnail_url( $post["ID"] )?>" alt="" />
                    </div>
                    <div class="article-figure">
                        <strong><?php echo esc_attr($post["post_title"])?></strong>
                        <p>
                            <?php echo get_the_excerpt( $post["ID"])?>
                        </p>
                        <button>
                            بیشتر بخوانید <i class="fa fa-angle-left"></i>
                        </button>
                    </div>
                </a>
            </div>
        </div>
        <?php  endforeach; ?>
    </div>
</div>