<?php
include_once 'connection.php';
if(isset($_POST['btn_dr_register'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $fathername = $_POST['fathername'];
    $nation_code = $_POST['meli'];
    $phone_number_dr = $_POST['number'];
    $medical_number = $_POST['MEnumber'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $repass = $_POST['ConfirmPass'];
    @$status = $_POST['radio'];
    $result = $conn->prepare("INSERT INTO doctors SET fname = ?,lname = ?,fathername = ?,code_meli = ?,phonedoctor =?,medical_number = ?,email_dr =?,pass_dr = ?,confirm_pass_dr = ?,genderDr = ?");
    $result ->bindValue(1,$fname);
    $result ->bindValue(2,$lname);
    $result ->bindValue(3,$fathername);
    $result ->bindValue(4,$nation_code);
    $result ->bindValue(5,$phone_number_dr);
    $result ->bindValue(6,$medical_number);
    $result ->bindValue(7,$email);
    $result ->bindValue(8,$pass);
    $result ->bindValue(9,$repass);
    $result ->bindValue(10,$status);
    $result->execute();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ثبت نام</title>
    <link rel="stylesheet" href="../../lib/css/style.css" type="text/css">
</head>
<body bgcolor="#d6d6d6">
<?php
if (!empty($message1)) {
?>

<div class="alert-msg-green">
    <?php
    /*var_dump(@$message1);*/
    ?>
</div>
<?php
}
?>
<?php
if (!empty($message2)) {
?>
<div class="alert-msg-red">
    <?php
    echo @$message2;
    ?>
</div>
<?php } ?>
<?php
if (!empty($message3)) {
?>
<div class="alert-msg-red-pass">
    <?php
    echo @$message3;
    ?>
</div>
<?php } ?>
<section class="form-whole-register">
<div class="title">ایجاد حساب کاربری جدید</div>
<div class="form-registeration-dr">
<form action="register.php" method="post" enctype="multipart/form-data">
    <label for="name" id="name">نام</label>
    <input type="text" name="fname" placeholder="نام خود را وارد کنید" class="name"><br><br>
    <label for="lname" id="lastname">نام خانوادگی</label>
    <input type="text" name="lname" placeholder="نام خانوادگی خود را وارد کنید" class="lastname"> <br><br>
    <label for="fathername" id="fathername">نام پدر</label>
    <input type="text" name="fathername" placeholder="نام پدر را وارد کنید" class="fathername"> <br><br>
    <label for="nationcode" id="nation_code">کدملی</label>
    <input type="number" name="meli" placeholder="کدملی خود را وارد کنید" class="meli_code"><br><br>
    <label for="phonenumber" id="phonenumber">شماره همراه</label>
    <input type="text" name="number" placeholder="شماره همراه خود را وارد کنید" class="phonenumber"> <br><br>
    <label for="menumber" id="medical_number">شماره نظام پزشکی</label>
    <input type="text" name="MEnumber" placeholder="شماره نظام پزشکی را وارد کنید" class="medical_number"><br><br>
    <label for="email" id="email">ایمیل</label>
    <input type="email" name="email" placeholder="ایمیل خود را وارد کنید" class="email"><br><br>
    <label for="password" id="pass_dr">رمز عبور</label>
    <input type="password" name="password"placeholder="رمز عبور مورد نظر را وارد کنید" class="pass_dr"><br><br>
    <label for="repass" id="pass_repeat">تکرار رمز عبور</label>
    <input type="password" name="ConfirmPass" placeholder="تکرار رمز عبور را وارد کنید" class="pass_repeat"><br><br>
    <h4>وضعیت تاهل</h4>
    <div class="sex_type">
        <label for="male" id="male">مرد</label>
        <input type="radio" name="radio" value="مرد" class="male">
        <label for="female" id="female">زن</label>
        <input type="radio" name="radio" value="زن" class="female">
    </div>
    <label for="ax" id="ax_label">عکس از امضا خود بگیرید</label>
    <input type="file" name="files" class="file_sign">
    <input type="submit" name="btn_dr_register" value="ثبت نام" class="btn_dr_reg">
    <p class="qlogin">عضو هستید؟<a href="../doctors/login.php">وارد شوید</a></p>
</form>
</div>
</section>
</body>
</html>