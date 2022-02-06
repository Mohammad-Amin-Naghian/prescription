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
    <title></title>
    <link rel="stylesheet" href="../lib/css/style.css">
</head>
<body>
<div class="tbl_over_flow">
    <table cellpadding="10px" cellspacing="20px" border="1px solid black" class="tbl_see_drug">
        <tr>
            <th>نام دارو</th>
            <th>تعداد</th>
            <th>زمان مصرف</th>
            <th>مقادیر مصرف</th>
            <th>توضیحات</th>
            <th>زمان و ساعت</th>

        </tr>
        <?php
        if (isset($_SESSION['nationCode'])) {
            $see_drug = $conn->prepare('SELECT * FROM prescription WHERE nameAndFamily=?');
            $see_drug->bindValue(1,$_SESSION['nationCode']);
            $see_drug->execute();
            $rows = $see_drug->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $values) {
        ?>
        <tr>
            <td><?php echo $values['DrugName'];?></td>
            <td><?php echo $values['counts'];?></td>
            <td><?php echo $values['Consumption'];?></td>
            <td><?php echo $values['consumption_mm'];?></td>
            <td><?php echo $values['detail'];?></td>
            <td><?php echo $values['time_register'];?></td>

        </tr>
        <?php }
        }?>
    </table>
</div>
</body>
</html>

