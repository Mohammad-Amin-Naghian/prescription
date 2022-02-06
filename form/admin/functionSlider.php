<?php
include_once '../connection.php';

function showSlier() {
global $conn;
$list = $conn->prepare('SELECT * FROM slider');
$list->execute();
if ($list->rowCount()>=1) {
    $row = $list->fetchAll(PDO::FETCH_ASSOC);
    return $row;
} else {
    return false;
}
}




?>

