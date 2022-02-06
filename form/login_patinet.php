<?php
session_start();
include_once 'connection.php';
global $conn;
if (isset($_POST['btn_login'])) {
    $result3 = $conn->prepare('SELECT * FROM patinet WHERE pPhonenumber=? AND pCode_nation=?');
    $result3->bindValue(1,$_POST['username']);
    $result3->bindValue(2,$_POST['password']);
    $result3->execute();
    $row = $result3->fetch(PDO::FETCH_ASSOC);
    if ($result3->rowCount()>=1) {
        $_SESSION['mobile'] = $_POST['username'];
        $_SESSION['nationCode'] = $_POST['password'];
        if (!empty($_POST['check_patinet'])){
            setcookie('mobile',$_POST['username'],time()+(24*60*60));
            setcookie('code_meli',$_POST['password'],time()+(24*60*60));
        } else {
            setcookie('mobile','');
            setcookie('password','');
        }
        $result4 = $conn->prepare('INSERT INTO log_patinet_tbk(IP,patinet_name,code_log_p,insurance_log,phone_log_p,details_log) VALUES (?,?,?,?,?,?)');
        $result4->bindValue(1,$_SERVER['REMOTE_ADDR']);
        $result4->bindValue(2,$row['Pname'].' '.$row['plname']);
        $result4->bindValue(3,$row['pCode_nation']);
        $result4->bindValue(4,$row['pinsurancetype']);
        $result4->bindValue(5,$row['pPhonenumber']);
        $result4->bindValue(6,'بیمار وارد سایت شد');
        $result4->execute();
        header('location:index_patinet.php');
    } else {
        $message = '<p style="color: #64050e;">شماره تماس یا کدملی اشتباه است</p>';
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
    <title>ورود</title>
    <link rel="stylesheet" href="../lib/css/style.css">
</head>
<body class="login-background">
<div class="form-login-patinet">
    <?php
    if (!empty($message)) {
    ?>
    <div class="login_error_msg_patinet">
        <?php echo $message;?>
    </div>
    <?php } ?>
    <form action="login_patinet.php" method="post">
        <label for="username" id="username_patinet_login">شماره موبایل</label>
        <input type="number" name="username" placeholder="شماره موبایل را وارد کنید" class="username_patinet_login" value="<?php if (isset($_COOKIE['mobile'])) {echo $_COOKIE['mobile'];} ?>"> <br><br>
        <label for="password" id="password_patinet_login">کدملی</label>
        <input type="number" name="password" placeholder="کد ملی خود را وارد کنید" class="password_patinet_login" value="<?php if (isset($_COOKIE['code_meli'])){echo $_COOKIE['code_meli'];}?>"><br><br>
        <label for="rememberme" id="#remember_p">مرا به خاطر بسپار</label>
        <input type="checkbox" name="check_patinet" class="check_p_class" value="<?php if (isset($_COOKIE['code_meli'])) {echo 'checked';} ?>" >
        <input type="submit" name="btn_login" class="btn_patinet_log" value="ورود">
        <p class="qregister_patinet">عضو نیستید؟<a href="register_patinet.php">ثبت نام کنید</a></p>
    </form>
</div>
</body>
</html>