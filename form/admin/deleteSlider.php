<?php
include_once '../connection.php';
global $conn;
$id = $_GET['id'];
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $sql = 'DELETE FROM slider WHERE ID=?';
        $result = $conn->prepare($sql);
        $result->bindValue(1,$id);
        $result->execute();
        if($result->rowCount()>=1) {
            header('location:dashboard.php?listSlider=ok');
        } else {
            header('location:listSlider.php');
        }
    } else {
        header('location:dashboard.php');
    }

?>