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
<table cellspacing="20px" cellpadding="10px" border="1px solid black" class="tbl_see_Test">
    <tr>
   <th>عنوان خدمت</th>
   <th>کدملی</th>
   <th>زمان و ساعت</th>
    </tr>
    <?php
    if (isset($_SESSION['nationCode'])) {
        $see_Test = $conn->prepare('SELECT * FROM test_tbl,doctors WHERE nation_code_test=?');
        $see_Test->bindValue(1,$_SESSION['nationCode']);
        $see_Test->execute();
        $rows1 = $see_Test->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows1 as $values1) {
    ?>
    <tr>
        <td><?php echo $values1['title_test'];?></td>
        <td><?php echo $values1['nation_code_test'];?></td>
        <td><?php echo $values1['time_test'];?></td>

    </tr>
    <?php }
    }
    ?>
</table>
</body>
</html>
