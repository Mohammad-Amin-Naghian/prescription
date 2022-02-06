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
    <title>تاریخچه تجویز آزاد</title>
    <link rel="stylesheet" href="../../Uni/lib/css/style.css">
</head>
<body>
<table width="60%" class="history_free">
    <tr>
        <th>کد ملی</th>
        <th>توضیحات</th>
        <th>زمان ثبت</th>
        <th>ویرایش</th>
        <th>حذف</th>
    </tr>
    <?php
    if (isset($_SESSION['username'])) {
    $free_dbs = $conn->prepare('SELECT * FROM prescription WHERE email=?');
    $free_dbs->bindValue(1,$_SESSION['username']);
    $free_dbs = $conn->prepare('SELECT * FROM govahi_tbl');
    $free_dbs->execute();
    $free_row = $free_dbs->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($free_row)) {
    foreach ($free_row as $value_row) {
    ?>
    <tr>
        <td><?php echo $value_row['code_nation'];?></td>
        <td><?php echo $value_row['detail'];?></td>
        <td><?php echo $value_row['time'];?></td>
        <td><a href="<?php echo 'update_govahi_dr.php?updateGovahi='.$value_row['ID'];?>">ویرایش</a></td>
        <td><a href="<?php echo 'delete_dr_govahi.php?id='.$value_row['ID']; ?>">حذف</a></td>
    </tr>
    <?php }
    } else {
        echo '<p class="msg_history_warning">هیج رکوردی برای نمایش وجود ندارد!</p>';
    }
    }?>
</table>
</body>
</html>