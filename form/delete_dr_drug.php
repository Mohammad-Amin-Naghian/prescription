<?php
include_once 'connection.php';
global $conn;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $delete_drug = $conn->prepare('DELETE FROM prescription WHERE ID=?');
    $delete_drug->bindValue(1,$_GET['id']);
    $delete_drug->execute();
    if ($delete_drug->rowCount()>=1) {
        header('location:history.php?Drughistory=ok');
    } else {
        header("location:drughistory.php");
    }
} else {
    header('location:history.php');
}

?>