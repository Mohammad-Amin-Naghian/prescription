<?php
include_once '../connection.php';
global $conn;
if (isset($_POST['btn_menu'])) {
    $sql = 'INSERT INTO menu(name) VALUES (?)';
    $result = $conn->prepare($sql);
    $result->bindValue(1,$_POST['menu_name']);
    $result->execute();
    $msg_success = 'منو به لیست منوها اضافه گردید';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../lib/css/style.css">
</head>
<body>
<?php
if (!empty($msg_success)) {
?>
<div class="success_msg"><p><?php echo @$msg_success;?></p></div>
<?php } ?>
<form method="post">
    <h2 style="font-family: 'B Titr'" class="add_title">اضافه کردن منو</h2>
    <p id="name_menu">نام منو</p>
    <input type="text" name="menu_name" class="name_menu" placeholder="منو را اضافه کنید">
    <input type="submit" name="btn_menu" class="btn_menu" value="افزودن منو">
</form>
</body>
</html>