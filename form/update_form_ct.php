<?php
include_once 'function_update.php';
if (isset($_GET['updateRequest']) && !empty($_GET['updateRequest'])) {
    $id = $_GET['updateRequest'];
    $member = readct($id);
    $edit = updatect($id);
    if ($edit == true) {
        header('location:history.php?CThistory=ok');
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../Uni/lib/css/style.css">
    <title>درحال ویرایش نسخه</title>
</head>
<body>
<div class="form-whole-update-in-ct">
<form method="post">
    <label for="کدملی" id="nation_code">کدملی</label>
    <input type="number" name="nation_code"  class="nation_code" value="<?php echo $member['nation_code_ct']; ?>" ><br><br>
    <label for="عنوان خدمت" id="title_service">عنوان خدمت</label>
    <input type="text" name="title"  class="title_service" value="<?php echo $member['title_ct'];?>">
    <br><br>
    <input type="submit" name="btn_update" class="btn_update" value="بروزرسانی">
</form>
</div>
</body>
</html>

