<?php
session_start();
require('../config/router.php');
require(SITE_API_CONFIG);
$name = trim($_POST['name']);
$devicename =  trim($_POST['devicename']);
$idcategory = trim($_POST['idcategory']);
$idsupplier = trim($_POST['idsupplier']);
$inpimg = trim($_POST['inpimg']);

if ($name = 'insert') {
    $sql_Insert_device = "INSERT INTO t_device (device_name, id_category, id_supplier, img,create_datetime) VALUES ('$devicename', $idcategory, $idsupplier,'$inpimg', CURRENT_TIMESTAMP())";
    $result_Insert = mysqli_query($connect, $sql_Insert_device) or die("lỗi truy vấn");

    if (!$result_Insert) {
        echo false;
    } else {
        echo true;
    }
    mysqli_close($connect);
}
?>