<?php
include_once '../connection.php';
global $conn;

$sql = 'SELECT * FROM menu';
$result = $conn->prepare($sql);
$result->execute();
$row = $result->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="../../lib/css/style.css">
</head>
<body>
<h2 class="title_list_menu">لیست منو ها</h2>
<table class="listmenu">
    <tr>
    <th>ردیف</th>
    <th>نام منو</th>
    <th>حذف</th>
    </tr>
    <?php
    if (!empty($row)) {
    foreach ($row as $value) {
    ?>
    <tr>
        <td><?php echo $value['ID'];?></td>
        <td><?php echo $value['name'];?></td>
        <td><a href="<?php echo 'delete_menu.php?id='.$value['ID'];?>">حذف</a></td>
    </tr>
    <?php } } else {
        echo '<div class="error_msg">منویی در لیست مشاهده نمیکنید!</div>';
    }
        ?>
</table>
</body>
</html>
