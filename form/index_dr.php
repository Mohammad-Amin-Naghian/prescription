<?php
session_start();
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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>نسخ الکترونیک</title>
    <link rel="stylesheet" href="../lib/css/style.css" type="text/css">
</head>
<body>
<header>
    <div class="head">
        <img src="../lib/img/output-onlinepngtools.png" alt="لوگو نسخه" width="60px" class="imglogo">
        <p style="font-family: IranNastaliq; font-size: 30px; margin-right: 10px">سامانه ثبت نسخه بیماران</p>
        <img src="../lib/img/profile.png" width="25px" alt="profilelogo" class="profilelogo">
        <?php
        if (isset($_SESSION['username'])) {
            $result8 = $conn->prepare('SELECT * FROM doctors WHERE email_dr = ?');
            $result8->bindValue(1,$_SESSION['username']);
            $result8->execute();
            $row = $result8->fetch(PDO::FETCH_ASSOC);
        ?>
       <span class="show_name_Dr">
            <?php
            echo 'دکتر'.$row['fname'].' '.$row['lname'];
            ?>
        </span>
        <?php
        } else {
            header('location:login_dr.php?First=Login');
        }
        ?>
        <div class="arrow"><i class='fas fa-caret-down'></i>
        <div class="submenu">
            <a href="#profile_edit" class="edition_in_profile">ویرایش پروفایل</a>
            <a href="history.php" class="history_of_prescriptions">تاریخچه تجویز</a>
            <a href="exitdr.php" class="exit_dr">خروج</a>
        </div>
        </div>
    </div>
</header>
<h2 class="guide">پزشک گرامی برای تجویز نسخه روی یکی از گزینه های زیر کلیک نمایید</h2>
<section class="sec">
<div class="fatherimg">
    <img src="../lib/img/drug.png" alt="دارو" class="drugdr">
    <img src="../lib/img/test.png" alt="آزمایش" class="test">
    <img src="../lib/img/ct.png" alt="سی تی" class="ct">
    <img src="../lib/img/medical-prescription.png" alt="نسخه آزاد" class="prescription">
</div>
<div class="fathertxt">
    <p class="adrugdr"><a href="drug.php">دارو</a></p>
    <p class="atest"><a href="test.php">آزمایش</a></p>
    <p class="act"><a href="ct.php">تصویر برداری</a></p>
    <p class="afree"><a href="free.php">آزاد</a></p>
</div>
</section>
</body>
</html>
