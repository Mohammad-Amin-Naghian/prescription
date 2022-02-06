<?php
include_once '../connection.php';
global $conn;
if (isset($_POST['btn_upload'])) {
    $sql = 'INSERT INTO slider(slidername) VALUES (?)';
    $result = $conn->prepare($sql);
    $files = $_FILES['file_upload'];
    $fileName = $files['name'];
    $explode = explode('.',$fileName);
    $end = end($explode);
    $newName = 'slider_';
    if ($fileName) {
        if (in_array($end,['jpg','png','jpeg'])) {
            $GLOBALS['newName'] = 'slider_' . rand(25, 980) . '.' . $end;
            move_uploaded_file($files['tmp_name'], 'slider/' . $newName);
            $result->bindValue(1, $newName);
            $result->execute();
            header('location:dashboard.php?addSlider=success');
        } else {
            header('location:dashboard.php?addSlider=error');

        }
    } else {
        header('location:dashboard.php?addSlider=no');
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <?php
    if (isset($_GET['addSlider']) && !empty($_GET['addSlider'])) {
        if ($_GET['addSlider']=='success') {
            echo '<div class="success_msg1">عکس با موفقیت اضافه گردید</div>';
        }
    }
    if (isset($_GET['addSlider']) && !empty($_GET['addSlider'])) {
        if ($_GET['addSlider']=='error') {
            echo '<div class="error_msg1">فایل ارسالی جز پسوندهای عکس نمی باشد</div>';
        }
    }
    if (isset($_GET['addSlider']) && !empty($_GET['addSlider'])) {
        if ($_GET['addSlider']=='no') {
            echo '<div class="error_msg1">برای افزودن عکس دکمه انتخاب را بزنید</div>';
        }
    }
    ?>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../lib/css/style.css">
</head>
<body>
<div class="form-whole-addslider">
    <form method="post" enctype="multipart/form-data">
    <p class="lbl_ax">عکس مورد نظر را انتخاب کنید</p>
    <input type="file" name="file_upload" class="file_upload"><br>
    <input type="submit" value="ارسال عکس" name="btn_upload" class="btn_upload">
    </form>
</div>
</body>
</html>
