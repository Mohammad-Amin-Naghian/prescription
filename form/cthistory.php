<?php
include_once 'connection.php';
global $conn;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../lib/css/style.css">
    <title>تاریخچه تجویز سی تی اسکن</title>
</head>
<body>
<table  width="60%" class="history_ct">
    <tr>
        <th>کدملی</th>
        <th>عنوان خدمت</th>
        <th>زمان ثبت</th>
        <th>ویرایش</th>
        <th>حذف</th>
    </tr>
    <?php
    if (isset($_SESSION['username'])) {
    $show_ct = $conn->prepare('SELECT * FROM prescription WHERE email=?');
    $show_ct->bindValue(1,$_SESSION['username']);
    $show_ct = $conn->prepare("SELECT * FROM ct_tbl");
    $show_ct->execute();
    $row_ct = $show_ct->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($row_ct)){
    foreach ($row_ct as $value_ct) {
    ?>
    <tr>
        <td><?php echo $value_ct['nation_code_ct'].'<br>';?></td>
        <td><?php echo $value_ct['title_ct'].'<br>';?></td>
        <td><?php echo $value_ct['time_ct'].'<br>';?></td>
        <td><a href="<?php echo 'update_form_ct.php?updateRequest='.$value_ct['ID'];?>">ویرایش</a></td>
        <td><a href="<?php echo 'delete_dr_ct.php?id='.$value_ct['ID'];?>" >حذف</a></td>
    </tr>
    <?php }
    } else {
        echo '<p class="msg_history_warning">هیج رکوردی برای نمایش وجود ندارد!</p>';
    }
    }?>
</table>
</body>
</html>
