<?php
include_once 'connection.php';
global $conn;
if (isset($_GET['id']) && !empty($_GET['id'])) {
$sql = 'DELETE FROM test_tbl WHERE ID = ?';
$delete_dr_test = $conn->prepare($sql);
$delete_dr_test->bindValue(1,$_GET['id']);
$delete_dr_test->execute();
if ($delete_dr_test->rowCount()>=1) {
    header('location:history.php?Testhistory=ok');
} else{
    header('location:testhistory.php');
}
} else {
    header('location:history.php');
}
?>