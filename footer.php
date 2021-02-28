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
<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery-3.5.1.min.js ?> "></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/popper.min.js ?> "></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/bootstrap.min.js ?> "></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/custome.js ?> "></script>
<script src='https://unpkg.com/jalali-moment/dist/jalali-moment.browser.js'></script>


<script type="text/javascript">
    $('.chkfilter').change(function () {
        var name = $(this).val();
        var kol = $('#kol').val();

        if (this.checked) {
            var request = $.ajax({
                type: 'post',
                url: '/wp-content/themes/Ahanapp/getdata.php',
                data: {name: name},
                success: function (response) {

                    $('#table')
                        .empty()
                        .append(response);
                },


            });

            $('#table')
                .empty()
        } else {
            $.ajax({
                type: 'post',
                url: '/wp-content/themes/Ahanapp/getdata.php',
                data: {name: kol},
                success: function (response) {
                    $('#table')
                        .empty()
                        .append(response);
                },
                error: function (req, err) {
                    console.log('my message' + err);
                }

            });
            $('#table')
                .empty();
        }
    });

    $('#table tr').each(function () {
        var customerId = $(this).find("td:last").html();

        let persianDate = moment(customerId).locale('fa').format('YYYY/M/D');
        $(this).find("td:last").empty();
        $(this).find("td:last").append(persianDate);

    });
    var brand = "";
    $('#table tr').each(function () {
        brand = $(this).find("td").eq(5).html();

        console.log($(this).closest('h3').next().find('.table_title').html());


    });


</script>
<?php wp_footer(); ?>
</body>

</html>