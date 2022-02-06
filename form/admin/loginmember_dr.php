<?php
include_once '../connection.php';
global $conn;

$list_dr = $conn->prepare('SELECT * FROM log_drtbl');
$list_dr->execute();
$row = $list_dr->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>مدیریت پزشک</title>
    <link rel="stylesheet" href="../../lib/css/style.css">
</head>
<body>
<div class="wrap-get">
<h2 class="dr_title_admin">لیست پزشکان</h2>
<table class="tbl_admin1" width="70%">
    <tr>
        <th>Ip</th>
        <th>نام و نام خانوادگی</th>
        <th>کدملی</th>
        <th>نظام پزشکی</th>
        <th>شماره تماس</th>
        <th>زمان ورود</th>
        <th>جزئیات</th>
        <th>حذف</th>
    </tr>
    <?php
    foreach ($row as $value) {
    ?>
    <tr>
        <td><?php echo $value['IP']; ?></td>
        <td><?php echo $value['drname']; ?></td>
        <td><?php echo $value['code_log'] ?></td>
        <td><?php echo $value['MedicalCode_log'];?></td>
        <td><?php echo $value['phone_log'];?></td>
        <td><?php echo $value['time'];?></td>
        <td><?php echo $value['detaillog'];?></td>
        <td><a href="<?php echo 'delete_log_dr.php?id='.$value['ID'];?>">حذف</a></td>
    </tr>
    <?php } ?>
</table>
</div>
</body>
</html>
