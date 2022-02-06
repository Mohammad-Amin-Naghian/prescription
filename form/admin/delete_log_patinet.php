<?php
include_once '../connection.php';
global $conn;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $delete_dr = $conn->prepare('DELETE  FROM log_patinet_tbk WHERE ID=?');
    $delete_dr->bindValue(1,$_GET['id']);
    $delete_dr->execute();
    if ($delete_dr->rowCount()>=1) {
        header('location:dashboard.php?LogmemberPatinet=ok');
    } else {
        header('location:loginMemeber_patinet.php');
    }
} else {
    header('location:dashboard.php');
}


?>