<?php
session_start();
if ($_SESSION['username']) {

} else {
    header('location:adminPanel.php?FirstLogin=error');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>پنل مدیریت</title>
    <link rel="stylesheet" href="../../../Uni/lib/css/style.css">
</head>
<body>
<section class="title_sec">
<h2 class="title_manage">سامانه مدیریت نسخه نویسی</h2>
</section>
    <div class="main-panel">
    <a href="dashboard.php?LogmemberDr=ok">پزشکان</a> <br><br>
    <a href="dashboard.php?LogmemberPatinet=ok">بیماران</a> <br><br>
    <a href="dashboard.php?listmenu=ok">لیست منو</a> <br><br>
    <a href="dashboard.php?addmenu=ok">افزودن منو</a> <br><br>
        <a href="dashboard.php?listSlider=ok">لیست اسلایدرها</a> <br><br>
        <a href="dashboard.php?addSlider=ok">افزودن اسلایدرها</a>
        <a href="dashboard.php?addpost=ok">افزودن پست</a>
    <a href="#">پاسخگویی به کاربران</a> <br><br>
</div>

    <?php
    if (isset($_GET['LogmemberDr']) && !empty($_GET['LogmemberDr'])) {
        include_once 'loginmember_dr.php';
    }
    if (isset($_GET['LogmemberPatinet']) && !empty($_GET['LogmemberPatinet'])) {
        include_once 'loginMemeber_patinet.php';
    }
    if (isset($_GET['listmenu']) && !empty($_GET['listmenu'])) {
        include_once 'listmenu.php';
    }
    if (isset($_GET['addmenu']) && !empty($_GET['addmenu'])) {
        include_once 'addmenu.php';
    }
    if (isset($_GET['listSlider']) && !empty($_GET['listSlider'])) {
        include_once 'listSlider.php';
    }
    if (isset($_GET['addSlider']) && !empty($_GET['addSlider'])) {
        include_once 'addSlider.php';
    }
    ?>
<button type="submit" class="btn_exit"><a href="exit_admin.php">خروج</a></button>
</body>
</html>
