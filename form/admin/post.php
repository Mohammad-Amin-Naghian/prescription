<?php
include_once '../connection.php';
global $conn;
if (isset($_POST['btn_post'])) {
    $files = $_FILES['files'];
    $file_name = $files['name'];
    $sql = 'INSERT INTO post(title_post,explain_post,pic_post,category_post) VALUES (?,?,?,?)';
    $result_post = $conn->prepare($sql);
    $result_post->bindValue(1,$_POST['title']);
    $result_post->bindValue(2,$_POST['content']);
    $result_post->bindValue(3,$_POST['sell']);


    $explode = explode('.',$file_name);
    $end = end($explode);
    if (in_array($end,['jpg','png','jpeg'])) {
        $newName = 'post_'.rand(1,5565).'.'.$end;
        move_uploaded_file($files['tmp_name'],__DIR__.DIRECTORY_SEPARATOR.'../img'.DIRECTORY_SEPARATOR.$newName);
        $result_post->bindValue(4,$newName);
        $result_post->execute();
        echo '<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" ></button>
    پست با موفقیت اضافه شد
  </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" ></button>
    پسوند نامعتبر
  </div>';
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
    <link rel="stylesheet" href="../../bootstrap-5.1.1-dist/css/bootstrap.min.css">
    <script src="../../bootstrap-5.1.1-dist/css/bootstrap.rtl.css"></script>
    <script src="../../bootstrap-5.1.1-dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <title>افزودن پست</title>
    <link rel="stylesheet" href="../../lib/css/style.css">
</head>
<body style="overflow-y: scroll">
<div class="container p-3 mt-3">
    <div class="col-sm-8 col-sm-offset-4">

    <div class="card">
        <form method="post" enctype="multipart/form-data">
        <div class="card-header bg-primary p-3 text-center text-light">افزدون پست</div>
        <div class="card-body">
            <div class="mb-3 mt-3">
                <label for="عنوان پست">عنوان پست</label><br><br>
                <input type="text" class="form-control" placeholder="عنوان پست را وارد کنید" name="title">
            </div>
            <div class="mb-3">
                <label for="عنوان پست">توضیحات</label><br><br>
                <textarea class="form-control ckeditor" rows="5" id="comment" name="content"></textarea>
            </div>
            <label for="sel1" class="form-label">Select list (select one):</label>
            <select class="form-select" id="sel1" name="sell">
                <option value="هک">هک</option>
                <option value="برنامه نویسی">برنامه نویسی</option>
                <option value="امنیت">امنیت</option>
                <option value="گرافیک">گرافیک</option>
            </select>
            <br><br>
            <div class="mb-3">
                <label for="formFile" class="form-label">انتخاب کنید</label><br><br>
                <input class="form-control" type="file" id="formFile" name="files">
            </div>
            <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-block text-light" name="btn_post">ارسال</button>
            </div>
        </div>
        </form>
    </div>
    </div>
</div>
</body>
</html>