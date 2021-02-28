<?php
use app\controllers\dbcontroller;
if (isset($_POST["export"])) {
    switch ($_POST['table']) {
        case "brand":
            $results1 = dbcontroller::get_all_data('brand');
            break;
        case "model":
            $results1 = dbcontroller::get_all_data('model');
            break;
        case "type":
            $results1 = dbcontroller::get_all_data('type');
            break;
        case "use":
            $results1 = dbcontroller::get_all_data('use');
            break;
    }
    $timestamp = time();
    $filename = 'Export_excel_' . $timestamp . '.xls';
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");

    ?>


    <?php if($_POST['table']=="brand"): ?>
    <table id="tab">
        <thead>
        <tr>
            <th >شماره</th>
            <th >نوع وسیله نقلیه</th>
            <th > نام برند</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($results1 as $key) {
            ?>
            <tr>
                <td><?php echo $key->id; ?></td>
                <td><?php echo $key->id_type; ?></td>
                <td><?php echo $key->name; ?></td>
            </tr>

            <?php
        }
        ?>
        </tbody>
    </table>
    <?php endif; ?>

    <?php if($_POST['table']=="model"): ?>
        <table id="tab">
            <thead>
            <tr>
                <th >شماره</th>
                <th >نوع برند</th>
                <th >نام</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($results1 as $key) {
                ?>
                <tr>
                    <td><?php echo $key->id; ?></td>
                    <td><?php echo $key->id_brand; ?></td>
                    <td><?php echo $key->name; ?></td>
                </tr>

                <?php
            }
            ?>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if($_POST['table']=="type"): ?>
        <table id="tab">
            <thead>
            <tr>
                <th >شماره</th>

                <th >نام</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($results1 as $key) {
                ?>
                <tr>
                    <td><?php echo $key->id; ?></td>

                    <td><?php echo $key->name; ?></td>
                </tr>

                <?php
            }
            ?>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if($_POST['table']=="use"): ?>
        <table id="tab">
            <thead>
            <tr>
                <th >شماره</th>
                <th >نوع وسیله نقلیه</th>
                <th >نام</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($results1 as $key) {
                ?>
                <tr>
                    <td><?php echo $key->id; ?></td>
                    <td><?php echo $key->id_type; ?></td>
                    <td><?php echo $key->name; ?></td>
                </tr>

                <?php
            }
            ?>
            </tbody>
        </table>
    <?php endif; ?>






<?php } ?>

<form action="" method="post">
    <select name="table" id="">
        <option value="brand">برند</option>
        <option value="model">تیپ</option>
        <option value="type">نوع وسیله نقلیه</option>
        <option value="use">کاربری</option>
    </select>
    <input type="submit" value="خروجی در اکسل" name="export">
</form>
