<?php
session_start();
include_once 'connection.php';
global $conn;
if (isset($_POST['btn_login'])) {
    $result2 = $conn->prepare('SELECT * FROM doctors WHERE email_dr=? AND pass_dr =?');
    $result2 ->bindValue(1,$_POST['email']);
    $result2 ->bindValue(2,md5($_POST['pass']));
    $result2 ->execute();
    $row = $result2->fetch(PDO::FETCH_ASSOC);
    if ($result2->rowCount()>=1) {
        $_SESSION['username'] = $_POST['email'];
        $_SESSION['password'] = $_POST['pass'];
        if (!empty($_POST["check_dr"])) {
            setcookie("Email",$_POST['email'],time()+(24*60*60));
            setcookie("Password",md5($_POST['pass']),time()+(24 * 60 * 60));
        } else {
            setcookie("Email","");
            setcookie("Password","");
        }
    $result3 = $conn->prepare('INSERT INTO log_drtbl(IP,drname,code_log,MedicalCode_log,phone_log,detaillog) VALUES (?,?,?,?,?,?)');
    $result3->bindValue(1,$_SERVER['REMOTE_ADDR']);
    $result3->bindValue(2,$row['fname'].' '.$row['lname']);
    $result3->bindValue(3,$row['code_meli']);
    $result3->bindValue(4,$row['medical_number']);
    $result3->bindValue(5,$row['phonedoctor']);
    $result3->bindValue(6,'کاربر به پنل خود لاگین کرد');
    $result3->execute();
        header('location:index_dr.php');
    } else {
        header('location:login_dr.php?Login=error');
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
    <link rel="stylesheet" href="../lib/css/style.css">
    <title>ورود</title>
</head>
<body class="background-login">

<img src="../lib/img/formlogindr.png" alt="لوگوی ورود" width="140px" class="logo-dr">
<div class="form-login-doctors">
    <?php
    if (isset($_GET['Login']) && !empty($_GET['Login'])) {
        ?>
        <div class="login_error_msg">
            یوزرنیم یا پسورد اشتباه است
        </div>
    <?php } ?>
    <?php
    if (isset($_GET['First']) && !empty($_GET['First'])) {
        ?>
        <div class="login_error_msg">
            کاربرگرامی نام کاربری و رمز عبور را وارد کنید:)
        </div>
    <?php } ?>

    <form action="login_dr.php" method="post">
        <label for="email" id="email_dr_login">ایمیل</label>
        <input type="email" name="email" placeholder="ایمیل خود را وارد کنید" class="email_dr_login" value="<?php if (isset($_COOKIE["Email"])) {echo $_COOKIE["Email"];} ?>"><br><br>
        <label for="password" id="pass_dr_login">رمز عبور</label>
        <input type="password" name="pass" placeholder="رمز عبور خود را وارد کنید" class="pass_dr_login" value="<?php if (isset($_COOKIE["Password"])) {echo $_COOKIE["Password"];} ?>"><br><br>
        <label for="rememberme" id="remeber_dr">مرا به خاطر بسپار</label>
        <input type="checkbox" name="check_dr" class="remeber_dr" value="<?php if (isset($_COOKIE["Password"])) {echo 'checked';} ?>">
        <input type="submit" value="ورود" name="btn_login" class="btn_dr_log">
        <div class="qregister">
        <p>عضو نیستید؟<a href="register_dr.php">ثبت نام کنید</a></p>
        </div>
    </form>
</div>
</body>
</html>
