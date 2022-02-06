<?php
include_once 'connection.php';
global $conn;
session_start();
if (isset($_SESSION['username'])) {

} else {
    header('location:login_dr.php?First=Login');
}
if (isset($_POST['btn_free'])) {
    if (isset($_POST['nation_code']) && !empty($_POST['nation_code']) && isset($_POST['govahi']) && !empty($_POST['govahi']) && isset($_POST['date']) && !empty($_POST['date'])) {
         $result = $conn->prepare("INSERT INTO govahi_tbl(code_nation,detail,time) VALUES (?,?,?)");
         $result->bindValue(1,$_POST['nation_code']);
         $result->bindValue(2,$_POST['govahi']);
         $result->bindValue(3,$_POST['date']);
         $result->execute();
         $message_success = 'گواهی صادر شد';
    } else {
        $message_error = 'همه موارد را پر کنید';
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
    <title>درحال نوشتن گواهی | نسخه آزاد ...</title>
    <link rel="stylesheet" href="../lib/css/style.css">
</head>
<body>
<a href="../form/index_dr.php" class="back_free">بازگشت</a>
<?php
if (!empty($message_success)) {
?>
<p class="show_msg_success_in_free">
    <?php echo @$message_success;?>
</p>
<?php } ?>

<?php
if (!empty($message_error)) {
?>
<p class="show_msg_error_in_free">
    <?php echo @$message_error;?>
</p>
<?php } ?>
<div class="form-whole-free">
    <form action="free.php" method="post">
        <?php
        if (isset($_SESSION['username'])){
        $namedr = $conn->prepare("SELECT * FROM doctors WHERE email_dr=?");
        $namedr->bindValue(1,$_SESSION['username']);
        $namedr->execute();
        $namerow = $namedr->fetchAll(PDO::FETCH_ASSOC);
        foreach ($namerow as $value_name) {
        ?>
        <p class="name_in_free">
            <?php echo $value_name['fname'].' '.$value_name['lname'];?>
        </p>
        <?php } } ?>
        <?php
        if (isset($_SESSION['username'])) {
        $Menumber = $conn->prepare("SELECT * FROM doctors WHERE email_dr=?");
        $Menumber->bindValue(1,$_SESSION['username']);
        $Menumber->execute();
        $codeRow = $Menumber->fetchAll(PDO::FETCH_ASSOC);
        foreach ($codeRow as $value_row) {

        ?>
        <p class="menumber_in_free">
            کد نظام پزشکی :
            <?php echo $value_row['medical_number'] ?>
        </p>
        <?php } } ?>
        <label for="کدملی"id="lbl_nationCode_free">کدملی</label>
        <input type="text" name="nation_code" placeholder="کدملی را وارد کنید" class="txt_nationCode_free">
        <br><br>
        <textarea name="govahi" id="govahi" cols="75" rows="25" style="outline: none;"></textarea> <br><br>
        <label for="تاریخ" id="date">تاریخ</label>
        <input type="date"name="date" class="date"> <br> <br>
        <?php
        if (isset($_SESSION['username'])) {
            $res = $conn->prepare("SELECT * FROM doctors WHERE email_dr=?");
            $res->bindValue(1,$_SESSION['username']);
            $res->execute();
            $row = $res->fetchAll(PDO::FETCH_ASSOC);
            foreach ($row as $value) {
        ?>
        <img src="img/<?php echo $value['sign'];?>" alt="امضا">
        <?php } } ?>
        <?php
        if (isset($_SESSION['username'])) {
            $email_value = $conn->prepare('SELECT * FROM doctors WHERE email_dr=?');
            $email_value->bindValue(1,$_SESSION['username']);
            $email_value->execute();
            $rows = $email_value->fetch(PDO::FETCH_ASSOC);
        ?>
        <input type="email" name="email_value" value="<?php echo $rows['email_dr'];?>" class="email_dr_free_value">
        <?php } ?>
        <input type="submit" value="ثبت" name="btn_free" class="btn_free">
    </form>
</div>
</div>
</body>
</html>