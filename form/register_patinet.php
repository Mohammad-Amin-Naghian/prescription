<?php
include_once 'connection.php';
global $conn;
if (isset($_POST['btn_send'])) {
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $fathername = $_POST['fathername'];
    $phone_num = $_POST['num_patiet'];
    $code_meli = $_POST['nation_code'];
    @$gender = $_POST['gender'];
    @$status = $_POST['radio'];
    $insurance = $_POST['insurance'];
    $check = $conn->prepare('SELECT * FROM patinet WHERE pPhonenumber=? AND pCode_nation=?');
    $check->bindValue(1,$phone_num);
    $check->bindValue(2,$code_meli);
    $check->execute();
    if ($check->rowCount()>=1){
        header('location:register_patinet.php?Exist=error');
    } else {
        if (isset($_POST['name']) && !empty($name) &&
            isset($_POST['lname']) && !empty($lname) &&
            isset($_POST['fathername']) && !empty($fathername) &&
            isset($_POST['num_patiet']) && !empty($phone_num) &&
            isset($_POST['nation_code']) && !empty($code_meli) &&
            isset($_POST['gender']) && !empty($gender) &&
            isset($_POST['radio']) && !empty($status) &&
            isset($_POST['insurance']) && !empty($insurance)) {
            $result = $conn->prepare('INSERT INTO patinet(Pname,plname,pfathername,pPhonenumber,pCode_nation,pgender,pcondition,pinsurancetype) VALUES (?,?,?,?,?,?,?,?)');
            $result->bindValue(1, $name);
            $result->bindValue(2, $lname);
            $result->bindValue(3, $fathername);
            $result->bindValue(4, $phone_num);
            $result->bindValue(5, $code_meli);
            $result->bindValue(6, $gender);
            $result->bindValue(7, $status);
            $result->bindValue(8, $insurance);
            $result->execute();
            $message1 = '<p style="color: #004c0e">ثبت نام با موفقیت انجام شد</p>';
        } else {
            $message2 = '<p style="color: brown">پر کردن همه ی موارد الزامی است</p>';
        }
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
    <title>ثبت نام</title>
    <link rel="stylesheet" href="../lib/css/style.css">
</head>
<body bgcolor="#dee2d4">
<?php
if (!empty($message1))  {
    ?>

    <div class="alert-msg-green">
        <?php
        echo @$message1;
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
if (isset($_GET['Exist']) && !empty($_GET['Exist'])) {
?>
<div class="alert-msg-red-pass">
    همچین موردی در دیتابیس وجود دارد
</div>
<?php } ?>
<div class="title_p">ایجاد حساب کاربری بیماران</div>
<div class="form-registeration-patinet">
    <form action="register_patinet.php" method="post">
        <label for="name" id="name_patinet_register">نام</label>
        <input type="text" name="name" placeholder="نام خود را وارد کنید" class="name_patinet_register"> <br><br>
        <label for="lname" id="lastname_patinet_register">نام خانوادگی</label>
        <input type="text" name="lname" placeholder="نام خانوادگی خود را وارد کنید" class="lastname_patinet_register"><br><br>
        <label for="fathername" id="fathername_patinet_register">نام پدر</label>
        <input type="text" name="fathername" placeholder="نام پدر خود را وارد کنید" class="fathername_patinet_register"><br><br>
        <label for="number" id="number_patinet_register">شماره همراه</label>
        <input type="number" name="num_patiet" placeholder="شماره همراه خود را وارد نمایید" class="number_patinet_register"><br><br>
        <label for="code meli" id="nation_codeـpatinet_register">کدملی</label>
        <input type="number" name="nation_code" placeholder="کدملی خود را وارد کنید" class="nation_codeـpatinet_register"><br><br>
        <h4 class="jensiat">جنسیت</h4>
        <div class="sex_type_patinet">
            <label for="male" id="male_patinet">مرد</label>
            <input type="radio" name="gender" value="مرد" class="male_patinet">
            <label for="female" id="female_patinet">زن</label>
            <input type="radio" name="gender" value="زن" class="female_patinet">
        </div>
        <h4 class="vaziat_taahol">وضعیت تاهل</h4>
        <div class="married_patinet">
            <label for="taahol" id="single">مجرد</label>
            <input type="radio" name="radio" value="مجرد" class="single">
            <label for="moteahel" id="married">متاهل</label>
            <input type="radio" name="radio" value="متاهل" class="married">
        </div>
        <label for="insurance_type" id="insurance_type">نوع نسخ خود را مشخص کنید</label>
        <select name="insurance" id="insurance">
            <option value=""></option>
            <option value="تامین اجتماعی">تامین اجتماعی</option>
            <option value="خدمات درمانی">خدمات درمانی</option>
            <option value="ارتش">ارتش</option>
            <option value="ایرانیان">ایرانیان</option>
        </select><br><br>
        <input type="submit" name="btn_send" value="ثبت نام" class="btn_patinet_reg">
        <p class="qlogin_patient">عضو هستید؟<a href="login_patinet.php">وارد شوید</a></p>
    </form>
</div>
</body>
</html>