<footer>
    <div class="container-fluid bg-dgray pt-md-5">


        <div class="container">

            <div class="row d-flex justify-content-around">
                <div class="col-md-3 border-seperator text-center"><img class="img-fluid"
                                                                        style="    float: right;    width: 80%;"
                                                                        src="<?php bloginfo('template_url'); ?>/assets/images/5.png"
                                                                        alt=""></div>
                <div class="col-md-6  card-deck border-seperator">
                    <div class="card bg-dgray border-0">
                        <div class=" card-body" id="footer-information">
                            <p class="card-text yelow h6 font-weight-bold">ساعت کاری:</p>
                            <p class="card-text text-white">شنبه تا
                                چهارشنبه................................................. ۱۷ - ۸:۳۰</p>
                            <p class="card-text text-white">
                                پنجشنبه............................................................. ۱۳ - ۸:۳۰</p>
                            <p class="card-text yelow h6 font-weight-bold">تماس:</p>
                            <p class="card-text text-white">
                                تهران....................................................................... ۱۸۳۶</p>
                            <p class="card-text text-white">شهرستان
                                ...................................................... ۶۶۹۱۱۰۰۷ <span
                                        class="yelow">۰۲۱ </span></p>
                            <p class="card-text yelow h6 font-weight-bold">آدرس:</p>
                            <p class="card-text text-white">تهران-کارگر شمالی- خیابان نصرت پلاک۳۳-ساختمان آهن اپ</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center"><img class="img-fluid"
                                                       src="<?php bloginfo('template_url'); ?>/assets/images/3.png"
                                                       alt="">
                </div>
            </div>
            <div class=" pt-md-5 mr-md-4" id="social-media">
                <ul class="row d-flex justify-content-center p-0 m-0">
                    <li><a href="https://t.me/AhanApp" class="text-white"><i
                                    class="fab fa-twitter bg-yelow p-2 h1 rounded-circle"></i></a>
                    </li>
                    <li><a href="" class="text-white"><i class="fa fa-telegram bg-yelow p-2 h1 rounded-circle"></i></a>
                    </li>
                    <li><a href="" class="text-white"><i
                                    class="fab fa-instagram bg-yelow p-2 h1 rounded-circle"></i></a>
                    </li>
                    <li><a href="" class="text-white"><i class="fab fa-linkedin-in bg-yelow p-2 h1 rounded-circle"></i></a>
                    </li>
                    <li><a href="" class="text-white"><i style="    font-size: 25px;
    line-height: 1.3;" class="fa fa-video-camera bg-yelow p-2 h1 rounded-circle"></i></a>
                    </li>
                    <li><a href="" class="text-white"><i
                                    class="fab fa-facebook-f bg-yelow p-2 h1 rounded-circle"></i></a>
                    </li>

                </ul>


            </div>
            <div class="col-md-12 text-sm-center pb-5">
                <p class="text-white font1" style="    font-size: 15px;">
                    تمامی حقوق این وبسایت متعلق به شرکت آهن اپ میباشد
                </p>
            </div>
        </div>


    </div>


</footer>

<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.slim.min.js ?>"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery-3.3.1.min.js ?> "></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/popper.min.js ?> "></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/bootstrap.min.js ?> "></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/custome.js ?> "></script>
<script src='https://unpkg.com/jalali-moment/dist/jalali-moment.browser.js'></script>


<script type="text/javascript">
    $( document ).ready(function() {
        var formdata = new FormData();
        var name = jQuery(this).val();
        var catname = jQuery("#cate_name").text();

            formdata.append('category', catname);
            formdata.append('name', "");



        var request = jQuery.ajax({
            type: 'post',
            url: 'http://localhost:81/ahanapp/wp-content/themes/Ahanapp/getdata.php',
            data: formdata,
            processData: false,
            contentType: false,
            success: function (response) {
                jQuery('#table')
                    .empty()
                    .append(response);
            },
        });

    });

    jQuery('.chkfilter').change(function () {
        var formdata = new FormData();
        var name = jQuery(this).val();
        var catname = jQuery("#cate_name").text();


        if (this.checked) {
            formdata.append('category', catname);
            formdata.append('name', name);
        } else {
            formdata.append('category', catname);
            formdata.append('name', "");
        }


        var request = jQuery.ajax({
            type: 'post',
            url: 'http://localhost:81/ahanapp/wp-content/themes/Ahanapp/getdata.php',
            data: formdata,
            processData: false,
            contentType: false,
            success: function (response) {
                jQuery('#table')
                    .empty()
                    .append(response);
            },
        });
        jQuery('#table')
            .empty()
    });

    jQuery('.chkzekhamat').change(function () {
        var formdata = new FormData();
        var name = jQuery(this).val();
        var catname = jQuery("#cate_name").text();


        if (this.checked) {
            formdata.append('category', catname);
            formdata.append('zekhamat', name);
        } else {
            formdata.append('category', catname);
            formdata.append('zekhamat', "");
        }


        var request = jQuery.ajax({
            type: 'post',
            url: 'http://localhost:81/ahanapp/wp-content/themes/Ahanapp/getdata.php',
            data: formdata,
            processData: false,
            contentType: false,
            success: function (response) {
                jQuery('#table')
                    .empty()
                    .append(response);
            },
        });
        jQuery('#table')
            .empty()
    });


    jQuery('.chkmaftol').change(function () {
        var formdata = new FormData();
        var name = jQuery(this).val();
        var catname = jQuery("#cate_name").text();


        if (this.checked) {
            formdata.append('category', catname);
            formdata.append('maftol', name);
        } else {
            formdata.append('category', catname);
            formdata.append('maftol', "");
        }


        var request = jQuery.ajax({
            type: 'post',
            url: 'http://localhost:81/ahanapp/wp-content/themes/Ahanapp/getdata.php',
            data: formdata,
            processData: false,
            contentType: false,
            success: function (response) {
                jQuery('#table')
                    .empty()
                    .append(response);
            },
        });
        jQuery('#table')
            .empty()
    });


    jQuery('.chkscale').change(function () {
        var formdata = new FormData();
        var name = jQuery(this).val();
        var catname = jQuery("#cate_name").text();


        if (this.checked) {
            formdata.append('category', catname);
            formdata.append('scale', name);
        } else {
            formdata.append('category', catname);
            formdata.append('scale', "");
        }


        var request = jQuery.ajax({
            type: 'post',
            url: 'http://localhost:81/ahanapp/wp-content/themes/Ahanapp/getdata.php',
            data: formdata,
            processData: false,
            contentType: false,
            success: function (response) {
                jQuery('#table')
                    .empty()
                    .append(response);
            },
        });
        jQuery('#table')
            .empty()
    });


    jQuery('.chkstandard').change(function () {
        var formdata = new FormData();
        var name = jQuery(this).val();
        var catname = jQuery("#cate_name").text();


        if (this.checked) {
            formdata.append('category', catname);
            formdata.append('standard', name);
        } else {
            formdata.append('category', catname);
            formdata.append('standard', "");
        }


        var request = jQuery.ajax({
            type: 'post',
            url: 'http://localhost:81/ahanapp/wp-content/themes/Ahanapp/getdata.php',
            data: formdata,
            processData: false,
            contentType: false,
            success: function (response) {
                jQuery('#table')
                    .empty()
                    .append(response);
            },
        });
        jQuery('#table')
            .empty()
    });
</script>
<?php wp_footer(); ?>
</body>

</html>