<?php
include_once 'connection.php';
global $conn;
session_start();
if (isset($_SESSION['username'])) {

} else {
    header('location:login_dr.php?First=Login');
}
if (isset($_POST['btn_nation'])) {
    $code_nation = $_POST['nation_patinet'];
    $name_drug = $_POST['name_drug'];
    $count = $_POST['txt_count_drug'];
    $consumption_date = $_POST['consumption_drug_date'];
    $consumption_m = $_POST['consumption_m'];
    $explain = $_POST['tozihat'];
    $email_v = $_POST['email_value'];
    if ($email_v == null) {
        echo 'empty';
    } else {
        if (isset($_POST['nation_patinet']) && !empty($code_nation) &&
            isset($_POST['name_drug']) && !empty($name_drug) &&
            isset($_POST['txt_count_drug']) && !empty($count) &&
            isset($_POST['consumption_drug_date']) && !empty($consumption_date) &&
            isset($_POST['consumption_m']) && !empty($consumption_m) &&
            isset($_POST['consumption_m']) && !empty($consumption_m)) {
            $result38 = $conn->prepare('INSERT INTO prescription(DrugName,Consumption,consumption_mm,counts,detail,nameAndFamily,email) VALUES(?,?,?,?,?,?,?)');
            $result38->bindValue(1,$name_drug);
            $result38->bindValue(2,$consumption_date);
            $result38->bindValue(3,$consumption_m);
            $result38->bindValue(4,$count);
            $result38->bindValue(5,$explain);
            $result38->bindValue(6,$code_nation);
            $result38->bindValue(7,$email_v);
            $result38->execute();
            $message_success = 'اقلام درج شد';
        } else {
            $message_error = 'همه ی موارد را وارد نکردید';
        }
    }

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta chars
          et="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>درحال تجویز دارو...</title>
    <link rel="stylesheet" href="../lib/css/style.css">
</head>
<body style="background-image: linear-gradient(98deg, #b6b3ff, #548ec8); background-size:cover;">
<?php
if (!empty($message_success)) {
?>
<p class="show_msg_success_in_drug">
    <?php
    echo @$message_success;
    ?>
</p>
<?php } ?>

<?php
if (!empty($message_error)) {
?>
<p class="show_msg_error_in_drug">
    <?php
    echo @$message_error;
    ?>
</p>
<?php } ?>
<a href="index_dr.php" class="back_drug">بازگشت</a>
<div class="form-whole-drug">
    <form action="drug.php" method="post" enctype="multipart/form-data">
        <label for="کدملی" id="lbl_nationCode_patinet">کدملی</label>
        <input type="text" placeholder="کد ملی بیمار را وارد کنید " name="nation_patinet" autocomplete="off" class="txt_nationCode_patinet">

        <br><br>
        <label for="نام دارو" id="name_drug">نام دارو</label>
        <input type="text" name="name_drug" placeholder="نام دارو را وارد کنید" autocomplete="off" class="txt_name_drug">
        <label for="تعداد" id="count_drug">تعداد</label>
        <input type="number" name="txt_count_drug" placeholder="تعداد دارو را وارد کنید" autocomplete="off" class="txt_count_drug">

        <br><br>
        <label for="زمان مصرف" id="consumption_drug_date">زمان مصرف</label>
        <input type="text" name="consumption_drug_date" placeholder="زمان مصرف دارو کی باشد؟" autocomplete="off" class="txt_consumption_drug_date">
        <label for="مقادیر مصرف" id="consumption_m">مقادیر مصرف</label>
        <input type="text" name="consumption_m" placeholder="مقدار مصرف دارو چقدر باشد؟" autocomplete="off" class="txt_consumption_m">
        <label for="توضیحات" class="explain_drug">توضیحات</label>
        <textarea name="tozihat" id="explain" cols="30" rows="5"></textarea>
        <?php
        if (isset($_SESSION['username'])) {
            $resulto = $conn->prepare('SELECT * FROM doctors WHERE email_dr=?');
            $resulto->bindValue(1,$_SESSION['username']);
            $resulto->execute();
            $row = $resulto->fetchAll(PDO::FETCH_ASSOC);
            foreach ($row as $value){
        ?>
        <img src="img/<?php echo $value['sign'];?>" alt="signature" width="100px" height="50px">
        <?php } } ?>
        <?php
        if (isset($_SESSION['username'])) {
            $show_email_input = $conn->prepare('SELECT * FROM doctors WHERE email_dr=?');
            $show_email_input->bindValue(1,$_SESSION['username']);
            $show_email_input->execute();
            $fetch_email_dr = $show_email_input->fetch(PDO::FETCH_ASSOC);
        ?>
        <p class="email_lbl_for_value">ایمیل</p>

        <input type="email" name="email_value" value="<?php echo $fetch_email_dr['email_dr'];?>" class="email_dr_drug_value" >
        <?php } ?>
        <input type="submit" name="btn_nation" class="btn_check_nation" value="ثبت">
</div>
</div>
</body>
</html>