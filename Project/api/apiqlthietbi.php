<?php
session_start();
require('../config/router.php');
require(SITE_API_CONFIG);
$name = isset($_POST['name']) ? trim($_POST['name']) : '';

$data = array();

if ($name == 'select') {
    $id_device = isset($_POST['id_device']) ? trim($_POST['id_device']) : '';
    $sql_select = "SELECT td.id, td.device_name, td.id_category, tc.category_name, td.id_supplier, ts.supplier_name, td.img FROM t_category tc INNER JOIN t_device td ON tc.id = td.id_category INNER JOIN t_supplier ts on ts.id = td.id_supplier WHERE td.id=$id_device";
    $result_select = mysqli_query($connect, $sql_select) or die("lỗi truy vấn select");

    while ($row = $result_select->fetch_assoc()) {
        $data[count($data)] = $row;
    }
    header('Content-Type: application/json');
    echo (json_encode($data));
    mysqli_close($connect);
}

if ($name == 'insert') {
    $devicename =  isset($_POST['devicename']) ? trim($_POST['devicename']) : '';
    $idcategory = isset($_POST['idcategory']) ? trim($_POST['idcategory']) : '';
    $idsupplier = isset($_POST['idsupplier']) ?  trim($_POST['idsupplier']) : '';
    $inpimg = isset($_POST['inpimg']) ? trim($_POST['inpimg']) : '';
    $sql_Insert_device = "INSERT INTO t_device (device_name, id_category, id_supplier, img,create_datetime) VALUES ('$devicename', $idcategory, $idsupplier,'$inpimg', CURRENT_TIMESTAMP())";
    $result_Insert = mysqli_query($connect, $sql_Insert_device) or die("lỗi truy vấn insert");

    if (!$result_Insert) {
        echo false;
    } else {
        echo true;
    }
    mysqli_close($connect);
}

if ($name == 'update') {
    $deviceId = isset($_POST['deviceId']) ? trim($_POST['deviceId']) : '';
    $devicename =  isset($_POST['devicename']) ? trim($_POST['devicename']) : '';
    $idcategory = isset($_POST['idcategory']) ? trim($_POST['idcategory']) : '';
    $idsupplier = isset($_POST['idsupplier']) ?  trim($_POST['idsupplier']) : '';
    $inpimg = isset($_POST['inpimg']) ? trim($_POST['inpimg']) : '';

    $sql_Update_device = "UPDATE t_device SET device_name='$devicename', id_category=$idcategory, id_supplier=$idsupplier, img='$inpimg', update_datetime=CURRENT_TIMESTAMP() WHERE id=$deviceId";
    $result_Update = mysqli_query($connect, $sql_Update_device) or die("lỗi truy vấn update");

    if (!$result_Update) {
        echo false;
    } else {
        echo true;
    }
    mysqli_close($connect);
}

if ($name == 'delete') {
    $id_device = isset($_POST['id_device']) ? trim($_POST['id_device']) : '';

    $sql_delete_device = "UPDATE t_device SET del_flg=1,  update_datetime=CURRENT_TIMESTAMP() WHERE id=$id_device";
    $result_Delete = mysqli_query($connect, $sql_delete_device) or die("lỗi truy vấn delete");

    if (!$result_Delete) {
        echo false;
    } else {
        echo true;
    }
    
    mysqli_close($connect);
}
