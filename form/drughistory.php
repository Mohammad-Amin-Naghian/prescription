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
    <title>تاریخچه دارو</title>
</head>
<body>
<table width="70%" class="history_of_drugs">
    <tr>
        <th>نام دارو</th>
        <th>زمان مصرف</th>
        <th>مقدار مصرف</th>
        <th>تعداد</th>
        <th>جزئیات</th>
        <th>کدملی</th>
        <th>زمان ثبت</th>
        <th>ویرایش</th>
        <th>حذف</th>
    </tr>
    
    <?php
    if (isset($_SESSION['username'])) {
    $drug_dbs = $conn->prepare('SELECT * FROM prescription WHERE email=?');
    $drug_dbs->bindValue(1,$_SESSION['username']);
    $drug_dbs->execute();
    $row_drug = $drug_dbs->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($row_drug)) {
    foreach ($row_drug as $value_drug) {
    ?>
    <tr>
        <td><?php echo $value_drug['DrugName'];?></td>
        <td><?php echo $value_drug['Consumption'];?></td>
        <td><?php echo $value_drug['consumption_mm'];?></td>
        <td><?php echo $value_drug['counts'];?></td>
        <td><?php echo $value_drug['detail'];?></td>
        <td><?php echo $value_drug['nameAndFamily'];?></td>
        <td><?php echo $value_drug['time_register'];?></td>
        <td><a href="<?php echo 'update_form_drug.php?updatedrug='.$value_drug['ID']?>">ویرایش</a></td>
        <td><a href="<?php echo 'delete_dr_drug.php?id='.$value_drug['ID'];?>">حذف</a></td>
    </tr>
    <?php  }
    } else {
        echo '<p class="msg_history_warning">هیج رکوردی برای نمایش وجود ندارد!</p>';
    }
    }?>
</table>
</body>
</html>
