<?php
include_once 'connection.php';
global $conn;
session_start();
if (isset($_POST['btn_test'])) {
    $title_test = $_POST['test_title'];
    $code_nation = $_POST['code_meli'];
    if (isset($_POST['code_meli']) && !empty($title_test) &&
        isset($_POST['test_title']) && !empty($code_nation)) {
        $result40 = $conn->prepare("INSERT INTO test_tbl(title_test,nation_code_test,email) VALUES (?,?,?)");
        $result40->bindValue(1,$title_test);
        $result40->bindValue(2,$code_nation);
        $result40->bindValue(3,$_POST['email_value']);
        $result40->execute();
        $message_success = 'آزمایش برای کدملی '.$_POST['code_meli'].' درج شد';
    } else {
        $message_error = 'همه موارد باید درج گردد';
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
    <title>درحال تجویز آزمایش ...</title>
    <link rel="stylesheet" href="../lib/css/style.css">
</head>
<body style="background-image:linear-gradient(95deg, #9050bf, #7e73bf); ">
<?php
if (!empty($message_success)) {
?>
<p class="show_msg_success_in_test">
    <?php echo @$message_success;?>
</p>
<?php } ?>

<?php
if (!empty($message_error)) {
?>
<p class="show_msg_error_in_test">
    <?php echo @$message_error;?>
</p>
<?php } ?>
<a href="index_dr.php" class="back_test">بازگشت</a>
<div class="form-whole-test">
    <form action="test.php" method="post" enctype="multipart/form-data">
        <label for="کدملی" id="nation_code_in_test">کدملی</label>
        <input type="text" name="code_meli" class="nation_code_in_test" placeholder="کدملی را وارد کنید"><br><br>
        <label for="عنوان خدمت" id="title_in_test">عنوان خدمت</label>
        <input type="text" name="test_title" class="title_in_test">
        <?php
        if (isset($_SESSION['username'])) {
            $result39 = $conn->prepare('SELECT * FROM doctors WHERE email_dr=?');
            $result39->bindValue(1,$_SESSION['username']);
            $result39->execute();
            $rows1 = $result39->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows1 as $value1) {
        ?>
        <img src="img/<?php echo $value1['sign'];?>" alt="">
        <?php } } ?>
        <p class="email_lbl_for_value_test">ایمیل</p>
        <?php
        if (isset($_SESSION['username'])) {
            $email_value = $conn->prepare('SELECT * FROM doctors WHERE email_dr=?');
            $email_value->bindValue(1,$_SESSION['username']);
            $email_value->execute();
            $rows_value = $email_value->fetch(PDO::FETCH_ASSOC);
        ?>
        <input type="email" name="email_value" value="<?php echo $rows_value['email_dr'];?>" class="email_dr_test_value">
        <?php } ?>
        <input type="submit" name="btn_test" class="btn_test" value="ثبت">
    </form>
</div>
</body>
</html>
