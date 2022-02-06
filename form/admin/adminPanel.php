<?php
session_start();
if (isset($_POST['btn_admin'])) {
    $_SESSION['username'] = $_POST['username'];
   $username = $_POST['username'];
   $pass = $_POST['password'];
   if ($username == 'admin' && $pass == 123) {

       header('location:dashboard.php');
   } else {
       header('location:adminPanel.php?Login=error');
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
    <title>صفحه مدیریت | دفترچه تلفن</title>
    <link rel="stylesheet" href="../../../Uni/lib/css/style.css">
</head>
<body bgcolor="#e1e1d9">
<?php
if (isset($_GET['Login']) && !empty($_GET['Login'])) {
?>
<div class="login_error_msg1">
    نام کاربری یا رمز عبور اشتباه است
</div>
<?php } ?>
<?php
if (isset($_GET['FirstLogin']) && !empty($_GET['FirstLogin'])) {
?>
<div class="login_error_msg2">
    ادمین محترم نام کاربری و رمزعبور را وارد نکردید
</div>
<?php } ?>
<div class="form-admin">
<form method="post">
    <p id="username_admin">نام کاربری</p><br>
    <input type="text" class="username_admin" placeholder="نام کاربری را وارد کنید" name="username"> <br><br>
    <p id="password_admin">رمز عبور</p> <br>
    <input type="password" class="password_admin" name="password" placeholder="رمزعبور را وارد کنید"> <br><br>
    <input type="submit" name="btn_admin" class="btn_admin" value="ورود ">
</form>
</div>
</body>
</html>
