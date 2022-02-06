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
    <title>مشاهده ct</title>
    <link rel="stylesheet" href="../lib/css/style.css">
</head>
<body>
<table cellpadding="0px" cellspacing="0px" border="1px solid black" class="tbl_see_ct">
    <tr>
        <th>کدملی</th>
        <th>عنوان خدمت</th>
        <th>زمان و ساعت</th>
    </tr>
    <?php
    if (isset($_SESSION['nationCode'])) {
        $see_CT = $conn->prepare('SELECT * FROM ct_tbl WHERE nation_code_ct=?');
        $see_CT->bindValue(1,$_SESSION['nationCode']);
        $see_CT->execute();
        $rows = $see_CT->fetch(PDO::FETCH_ASSOC);
        foreach ($rows as $values) {
    ?>
    <tr>
        <td><?php echo $values['nation_code_ct'];?></td>
        <td><?php echo $values['title_ct'];?></td>
        <td><?php echo $values['time_ct'];?></td>
    </tr>
    <?php }
    }
    ?>
</table>
</body>
</html>
