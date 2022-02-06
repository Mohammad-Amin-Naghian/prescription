<?php
include_once 'connection.php';
global $conn;
session_start();
if (isset($_SESSION['username'])) {

} else {
    header('location:login_dr.php?First=Login');
}
if (isset($_POST['btn_ct'])) {
    $nationcode = $_POST['code_nation'];
    $titile_ct = $_POST['title_ct'];
    if (isset($_POST['code_nation']) && !empty($nationcode) &&
        isset($_POST['title_ct']) && !empty($titile_ct)) {
        $results = $conn->prepare("INSERT INTO ct_tbl(nation_code_ct,title_ct) VALUES (?,?)");
        $results->bindValue(1, $nationcode);
        $results->bindValue(2, $titile_ct);
        $results->execute();
        $message_success = 'اضافه شد';
    } else {
        $message_error = 'همه موارد را وارد کنید';
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
    <title>درحال تجویز CT Scan ...</title>
    <link rel="stylesheet" href="../../Uni/lib/css/style.css">
</head>
<body style="background-image:linear-gradient(95deg, #9050bf, #7e73bf); ">
<?php
if (!empty($message_success)) {
?>
<p class="show_msg_success_in_ct">
    <?php echo @$message_success;?>
</p>
<?php } ?>

<?php
if (!empty($message_error)) {
?>
<p class="show_msg_error_in_ct">
    <?php echo @$message_error;?>
</p>
<?php } ?>
<a href="index_dr.php" style="color: #cad300" class="back_ct">بازگشت</a>
<div class="form-whole-ct">
    <form action="ct.php" method="post" enctype="multipart/form-data">
        <label for="کدملی"id="code_nation_in_ct">کدملی</label>
        <input type="number" name="code_nation" placeholder="کدملی بیمار را وارد کنید" class="code_nation_in_ct"> <br><br>
        <label for="عنوان خدمت" id="title_ct">عنوان خدمت</label>
        <input type="text" name="title_ct"  class="title_Ct"> <br><br>
        <?php
        if (isset($_SESSION['username'])) {
            $result = $conn->prepare('SELECT * FROM doctors WHERE email_dr=?');
            $result->bindValue(1,$_SESSION['username']);
            $result->execute();
            $row = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($row as $value) {
        ?>
        <img src="img/<?php echo $value['sign'];?>" alt="امضا">
        <?php } } ?>
        <?php
        if (isset($_SESSION['username'])) {
            $email_value = $conn->prepare('SELECT * FROM doctors where email_dr=?');
            $email_value->bindValue(1,$_SESSION['username']);
            $email_value->execute();
            $rows = $email_value->fetch(PDO::FETCH_ASSOC);
        ?>
            <p class="email_lbl_for_value_ct">ایمیل</p>
        <input type="email" name="email_value" value="<?php echo $rows['email_dr'];?>" class="email_dr_ct_value" >
        <?php } ?>
        <input type="submit" name="btn_ct" value="ثبت" class="btn_ct">
    </form>
</div>
</body>
</html>
