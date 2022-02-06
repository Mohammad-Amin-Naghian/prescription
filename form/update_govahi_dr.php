<?php
include_once 'function_update.php';
if (isset($_GET['updateGovahi']) && !empty($_GET['updateGovahi'])) {
    $id = $_GET['updateGovahi'];
    $mem_free = readFree($id);
    $editFree = updateFree($id);
    if ($editFree == true) {
        header('location:history.php?Freehistory=ok');
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

<div class="form-whole-free">
    <form method="post">
        <?php
        include_once 'connection.php';
        global $conn;
        $namedr = $conn->prepare("SELECT * FROM doctors");
        $namedr->execute();
        $namerow = $namedr->fetch(PDO::FETCH_ASSOC);
        ?>
        <p class="name_in_free">
            <?php echo $namerow['fname'].' '.$namerow['lname'];?>
        </p>
        <?php
        $Menumber = $conn->prepare("SELECT * FROM doctors");
        $Menumber->execute();
        $codeRow = $Menumber->fetch(PDO::FETCH_ASSOC);
        ?>
        <p class="menumber_in_free">
            کد نظام پزشکی :
            <?php echo $codeRow['medical_number'] ?>
        </p>
        <label for="کدملی"id="lbl_nationCode_free">کدملی</label>
        <input type="text" name="nation_code_edit" value="<?php echo $mem_free['code_nation'];?>" class="txt_nationCode_free">
        <br><br>
        <textarea name="govahi_edit" id="govahi" cols="75" rows="25" style="outline: none;"><?php echo $mem_free['detail']; ?></textarea> <br><br>
        <label for="تاریخ" id="date">تاریخ</label>
        <input type="date"name="date_edit" value="<?php echo $mem_free['time'];?>" class="date"> <br> <br>
        <input type="submit" value="بروزرسانی" name="btn_free_edit" class="btn_free">
    </form>
</div>
</div>
</body>
</html>