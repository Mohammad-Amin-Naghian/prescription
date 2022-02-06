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
    <title>صفحه بیماران</title>
    <link rel="stylesheet" href="../lib/css/style.css">
</head>
<body>
<header>
    <div class="background-header">
        <p>سامانه نسخه الکترونیک مراجعین</p>
    </div>
    <img src="../lib/img/panelPatinet.png" alt="پنل بیمار" width="28px" class="img-patinet-logo">
    <div class="arrow-panel-patinet"><i class='fas fa-caret-down'></i>
        <div class="sub-patinet">
            <a href="#profile" class="edition_in_profile_patinet">ویرایش پروفایل</a>

            <a href="exitp.php" class="exit_patinet">خروج</a>
        </div>
    </div>
    <?php
    if (isset($_SESSION['mobile'])) {
        $result9 = $conn->prepare('SELECT * FROM patinet WHERE pPhonenumber = ?');
        $result9->bindValue(1,$_SESSION['mobile']);
        $result9->execute();
        $row1 = $result9->fetch(PDO::FETCH_ASSOC);
    ?>
    <span class="patinet_name">
        <?php
        echo $row1['Pname'].' '.$row1['plname'];
        ?>
    </span>
    <?php
    } else {
        header("location:login_patinet.php");
    }
    ?>
</header>
<div class="tajziha">

    <span class="see_drug_index"><a href="<?php echo 'index_patinet.php?SeeDrug=ok'?>">مشاهده دارو</a></span>
    <span class="see_test_index"><a href="<?php echo 'index_patinet.php?SeeTest=ok'?>">مشاهده آزمایش</a></span>
    <span class="see_ct_index"><a href="<?php echo 'index_patinet.php?SeeCT=ok'?>">مشاهده CT Scan</a></span>
    <span class="see_free_index"><a href="<?php echo 'index_patinet.php?SeeFree=ok'?>">مشاهده نسخه آزاد</a></span>
</div>
<section class="wrrap-main">
    <section class="wrrap">
        <?php
        if (isset($_GET['SeeDrug']) && !empty($_GET['SeeDrug'])) {
            include_once '../../Uni/form/seeDrug.php';
        }
        if (isset($_GET['SeeTest']) && !empty($_GET['SeeTest'])) {
            include_once '../../Uni/form/seeTest.php';
        }
        if (isset($_GET['SeeCT']) && !empty($_GET['SeeCT'])) {
            include_once '../../Uni/form/seeCT.php';
        }
        if (isset($_GET['SeeFree']) && !empty($_GET['SeeFree'])) {
            include_once '../../Uni/form/seeFree.php';
        }
        ?>
    </section>
</section>
</body>
</html>