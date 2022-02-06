<?php
include_once '../connection.php';
global $conn;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $sql = 'DELETE  FROM menu WHERE ID=?';
    $result = $conn->prepare($sql);
    $result->bindValue(1,$_GET['id']);
    $result->execute();
    if ($result->rowCount()>=1) {
        header('location:dashboard.php?listmenu=ok');
    } else {
        header('location:listmenu.php');
    }
} else {
    header('location:dashboard.php');
}


?>