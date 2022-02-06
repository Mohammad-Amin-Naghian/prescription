<?php
include_once 'function_update.php';
if (isset($_GET['updatedrug']) && !empty($_GET['updatedrug'])) {
    $id = $_GET['updatedrug'];
    $read_drug = readdrug($id);
    $editDrug = updatedrug($id);
    if ($editDrug == true) {
        header('location:history.php?Drughistory=ok');
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
    <title>درحال تجویز نسخه</title>
    <link rel="stylesheet" href="../../Uni/lib/css/style.css">
</head>
<body style="background-image: linear-gradient(85deg,#0a53be,#00AA88)">
<div class="form-whole-drug-edit">
    <form method="post">
        <label for="کدملی" id="nation_code_drug_edit" >کدملی</label>
        <input type="text" name="nation_code" value="<?php echo $read_drug['nameAndFamily'];?>" class="nation_code_drug_edit" autocomplete="off" > <br><br>
        <label for="نام دارو" id="name_drug_for_edit" >نام دارو</label>
        <input type="text" name="name_drug" value="<?php echo $read_drug['DrugName']; ?>" class="name_drug_for_edit" autocomplete="off" ><br><br>
        <label for="تعداد" id="count_drug_edit">تعداد</label>
        <input type="number" class="count_drug_edit" name="count_in_drug" value="<?php echo $read_drug['counts'];?>"><br><br>
        <label for="تعداد" id="consumption_time">زمان مصرف</label>
        <input type="text" name="consumption_time" class="consumption_time" value="<?php echo $read_drug['Consumption']; ?>"<br><br>
        <label for="مقادیر مصرف" id="consumption_some">مقادیر مصرف</label>
        <input type="text" name="consumption_some" class="consumption_some" value="<?php echo $read_drug['consumption_mm']; ?>"><br><br>
        <label for="توضیحات" id="explain_edit" >توضیحات</label>
        <textarea name="tozihat" id="explain_edition" cols="30" rows="5"><?php echo $read_drug['detail'];?></textarea>
        <input type="submit" name="btn_edit_drug" class="btn_update_drug" value="بروزرسانی">
    </form>
</div>
</body>
</html>