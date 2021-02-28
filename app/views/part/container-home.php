<div class="container--home">
    <div class="content-logo">
        <?php     $brands = ot_get_option( 'brands', array() ); ?>

        <?php foreach ($brands as $brand):?>
        <div class="col-app">
            <img src=" <?php echo $brand['image'] ?>" alt="" />
        </div>
        <?php endforeach;?>

    </div>
</div>