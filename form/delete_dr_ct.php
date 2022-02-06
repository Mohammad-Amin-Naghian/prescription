<?php
include_once 'connection.php';
global $conn;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $result = $conn->prepare("DELETE FROM ct_tbl WHERE ID=?");
    $result->bindValue(1,$_GET['id']);
    $result->execute();
    if ($result->rowCount()>=1) {
        header('location:history.php?CThistory=ok');
    } else {
        header('location:cthistory.php');
    }
} else {
    header('location:history.php');
}
?>