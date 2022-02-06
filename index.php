<?php
include_once 'form/connection.php';
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
    <title>صفحه اصلی | نسخه نویسی</title>
    <link rel="stylesheet" href="../Uni/lib/css/style.css" type="text/css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index.php">صفحه اصلی</a></li>
            <?php
            foreach ($row as $value) {
            ?>
            <li>
                <a href="#"><?php echo $value['name'];?></a>
            </li>
            <?php } ?>
        </ul>
    </nav>
</header>
<h2 class="greeting">به سامانه نسخه نویسی الکترونیک خوش آمدید</h2>
<div class="doctor">
    <img src="lib/img/drlogin.png" alt="ورود پزشک" width="100px">
    <form action="form/login_dr.php" method="post">
    <button name="login" type="submit" class="doctor_btn_login">ورود پزشکان</button>
    </form>
    <form action="../Uni/form/register_dr.php" method="post">
    <button name="register" type="submit" class="doctor_btn_register">ثبت نام پزشکان</button>
    </form>
</div>
<div class="patient">
    <img src="lib/img/patinet.png" alt="ورود بیماران" width="100px">
    <form action="form/login_patinet.php" method="post">
    <button name="login" type="submit" class="patient_btn_login">ورود بیماران</button>
    </form>
    <form action="form/register_patinet.php" method="post">
    <button name="register" type="submit" class="patient_btn_register">ثبت نام بیماران</button>
    </form>
</div>
</body>
</html>