<?php
include_once 'function_update.php';
if (isset($_GET['updateTest']) && !empty($_GET['updateTest'])) {
    $id = $_GET['updateTest'];
    $mem_test = readtest($id);
    $editTest = updatetest($id);
    if ($editTest == true) {
        header('location:history.php?Testhistory=ok');
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
    <title>درحال ویرایش نسخه</title>
    <link rel="stylesheet" href="../../Uni/lib/css/style.css">
</head>
<body style="background-image: linear-gradient(85deg,#0a53be,#00AA88)" >
<div class="form-whole-update-in-test">
    <form method="post">
        <label for="کدملی" id="nation_codeT">کدملی</label>
        <input type="number" name="nation_codeT"  class="nation_codeT" value="<?php echo $mem_test['nation_code_test'];?>" ><br><br>
        <label for="عنوان خدمت" id="title_serviceT">عنوان خدمت</label>
        <input type="text" name="titleT" value="<?php echo $mem_test['title_test'];?>" class="title_serviceT">
        <br><br>
        <input type="submit" name="btn_updateT" class="btn_updateT" value="بروزرسانی">
</body>
</html>
