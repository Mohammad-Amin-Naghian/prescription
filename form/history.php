<?php
include_once 'connection.php';
global $conn;
session_start();
if (isset($_SESSION['username'])) {

} else {
    header('location:login_dr.php?First=Login');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../lib/css/style.css">
    <title>تازیخچه تجویز</title>
</head>
<body>
<header>
    <nav class="father_in_history">
        <ul class="menu_in_history">
            <li><a href="<?php echo 'history.php?Drughistory=ok'?>">دارو</a></li>
            <li><a href="<?php echo 'history.php?Testhistory=ok'?>">آزمایش</a></li>
            <li><a href="<?php echo 'history.php?CThistory=ok'?>">تصویربرداری</a></li>
            <li><a href="<?php echo 'history.php?Freehistory=ok'?>">آزاد</a></li>
        </ul>
    </nav>
</header>
<section class="wrrap-main">
    <section class="wrrap">
        <?php
        if (isset($_GET['Drughistory']) && !empty($_GET['Drughistory'])) {
           include_once '../../Uni/form/drughistory.php';
        }
        if (isset($_GET['Testhistory']) && !empty($_GET['Testhistory'])) {
            include_once '../../Uni/form/testhistory.php';
        }
        if (isset($_GET['CThistory']) && !empty($_GET['CThistory'])) {
            include_once '../../Uni/form/cthistory.php';
        }
        if (isset($_GET['Freehistory']) && !empty($_GET['Freehistory'])) {
            include_once '../../Uni/form/freehistory.php';
        }
        if (isset($_GET['updateRequest']) && !empty($_GET['updateRequest'])) {
            include_once '../../Uni/form/update_form_ct.php';
        }
        if (isset($_GET['updatedrug']) && !empty($_GET['updatedrug'])) {
            include_once '../../Uni/form/update_form_drug.php';
        }
        if (isset($_GET['updateTest']) && !empty($_GET['updateTest'])) {
            include_once '../../Uni/form/update_form_test.php';
        }
        if (isset($_GET['updateGovahi']) && !empty($_GET['updateGovahi'])) {
            include_once '../../Uni/form/update_govahi_dr.php';
        }
        ?>
    </section>
</section>
</body>
</html>
