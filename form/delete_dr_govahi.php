<?php
include_once 'connection.php';
global $conn;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $delete_dr_free = $conn->prepare('DELETE FROM govahi_tbl WHERE ID=?');
    $delete_dr_free->bindValue(1,$_GET['id']);
    $delete_dr_free->execute();
    if ($delete_dr_free->rowCount()>=1) {
        header('location:history.php?Freehistory=ok');
    }else {
        header('location:freehistory.php');
    }
} else {
    header('location:history.php');
}

?>

