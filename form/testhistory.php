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
    <title>تاریخچه تجویز آزمایش</title>
    <link rel="stylesheet" href="../../Uni/lib/css/style.css">
</head>
<body>
<table width="40%" class="test_history">
    <tr>
        <th>عنوان خدمت</th>
        <th>کدملی</th>
        <th>زمان ثبت</th>
        <th>ویرایش</th>
        <th>حذف</th>
    </tr>
    <?php
    if (isset($_SESSION['username'])) {
    $test_dbs = $conn->prepare('SELECT * FROM test_tbl WHERE email=?');
    $test_dbs->bindValue(1,$_SESSION['username']);
    $test_dbs->execute();
    $row_test = $test_dbs->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($row_test)) {
    foreach ($row_test as $value_test) {
    ?>
    <tr>
        <td><?php echo $value_test['title_test'];?></td>
        <td><?php echo $value_test['nation_code_test'];?></td>
        <td><?php echo $value_test['time_test'];?></td>
        <td><a href="<?php echo 'update_form_test.php?updateTest='.$value_test['ID'];?>">ویرایش</a></td>
        <td><a href="<?php echo 'delete_dr_test.php?id='.$value_test['ID'];?>">حذف</a></td>
    </tr>
    <?php }
    } else {
        echo '<p class="msg_history_warning">هیج رکوردی برای نمایش وجود ندارد!</p>';
    }
    }?>
</table>
</body>
</html>
