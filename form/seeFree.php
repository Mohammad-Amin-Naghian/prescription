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
    <title>Document</title>
    <link rel="stylesheet" href="../lib/css/style.css">
</head>
<body>
<table cellspacing="0" cellpadding="1" border="1" class="tbl_see_free">
    <tr>
    <th>کدملی</th>
    <th>توضیحات</th>
    <th>تاریخ</th>

    </tr>
    <?php
    if (isset($_SESSION['nationCode'])) {
        $see_free = $conn->prepare('SELECT * FROM govahi_tbl,doctors WHERE code_nation=?');
        $see_free->bindValue(1,$_SESSION['nationCode']);
        $see_free->execute();
        $rows = $see_free->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $values) {
    ?>
    <tr>
        <td><?php echo $values['code_nation'];?></td>
        <td><?php echo $values['detail'];?></td>
        <td><?php echo $values['time'];?></td>
    </tr>
    <?php }
    }
    ?>
</table>
</body>
</html>
