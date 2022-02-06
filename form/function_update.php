<?php
include_once 'connection.php';

function readct($id) {
global $conn;
$sql = 'SELECT * FROM ct_tbl WHERE ID=?';
$result = $conn->prepare($sql);
$result->bindValue(1,$id);
$result->execute();
if ($result->rowCount()>=1) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row;
} else {
    return false;
}
}
function updatect($id) {
    global $conn;
    if (isset($_POST['btn_update'])) {
        $sql = 'UPDATE ct_tbl SET nation_code_ct=?, title_ct=? WHERE ID=? ';
        $update_result = $conn->prepare($sql);
        $update_result->bindValue(1,$_POST['nation_code']);
        $update_result->bindValue(2, $_POST['title']);
        $update_result->bindValue(3,$id);
        $update_result->execute();
        if ($update_result->rowCount()>=1) {
            return $update_result;
        } else {
            return false;
        }
    }

}
function readdrug($id) {
    global $conn;
$sql = 'SELECT * FROM prescription WHERE ID = ?';
$readdrug = $conn->prepare($sql);
$readdrug->bindValue(1,$id);
$readdrug->execute();
if ($readdrug->rowCount()>=1) {
    $row = $readdrug->fetch(PDO::FETCH_ASSOC);
    return $row;
} else {
    return false;
}
}
function updatedrug($id) {
    global $conn;
    if (isset($_POST['btn_edit_drug'])) {
        $update_drug = $conn->prepare("UPDATE prescription SET DrugName=?,Consumption=?,consumption_mm=?,counts=?,detail=?,nameAndFamily=? WHERE ID=?");
        $update_drug->bindValue(1, $_POST['name_drug']);
        $update_drug->bindValue(2, $_POST['consumption_time']);
        $update_drug->bindValue(3, $_POST['consumption_some']);
        $update_drug->bindValue(4, $_POST['count_in_drug']);
        $update_drug->bindValue(5, $_POST['tozihat']);
        $update_drug->bindValue(6, $_POST['nation_code']);
        $update_drug->bindValue(7, $id);
        $update_drug->execute();
        if ($update_drug->rowCount() >= 1) {
            return $update_drug;
        } else {
            return false;
        }
    }
}
function readtest($id) {
    global $conn;
    $sql = 'SELECT * FROM test_tbl WHERE ID=?';
    $readtest_dr = $conn->prepare($sql);
    $readtest_dr->bindValue(1,$id);
    $readtest_dr->execute();
    if ($readtest_dr->rowCount()>=1) {
        $row = $readtest_dr->fetch(PDO::FETCH_ASSOC);
        return $row;
    } else {
        return false;
    }
}
function updatetest($id) {
    global $conn;
    if (isset($_POST['btn_updateT'])) {
        $sql = 'UPDATE test_tbl SET title_test = ? , nation_code_test=? WHERE ID=?';
        $update_dr_test = $conn->prepare($sql);
        $update_dr_test->bindValue(1, $_POST['titleT']);
        $update_dr_test->bindValue(2, $_POST['nation_codeT']);
        $update_dr_test->bindValue(3,$id);
        $update_dr_test->execute();
        if ($update_dr_test->rowCount()>= 1) {
            return $update_dr_test;
        } else {
            return false;
        }
    }
}
function readFree($id) {
    global $conn;
    $sql = 'SELECT * FROM govahi_tbl WHERE ID=?';
    $READFree = $conn->prepare($sql);
    $READFree->bindValue(1,$id);
    $READFree->execute();
    if ($READFree->rowCount()>=1) {
        $row = $READFree->fetch(PDO::FETCH_ASSOC);
        return $row;
    } else {
        return false;
    }
}
function updateFree($id) {
    global $conn;
    if (isset($_POST['btn_free_edit'])) {
        $sql = 'UPDATE govahi_tbl SET code_nation=?, detail=?,time=? WHERE ID=?';
        $update_free = $conn->prepare($sql);
        $update_free->bindValue(1, $_POST['nation_code_edit']);
        $update_free->bindValue(2, $_POST['govahi_edit']);
        $update_free->bindValue(3, $_POST['date_edit']);
        $update_free->bindValue(4, $id);
        $update_free->execute();
        if ($update_free->rowCount()>= 1) {
            return $update_free;
        } else {
            return false;
        }
    }
}
?>
