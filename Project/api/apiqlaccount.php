<?php
session_start();
require('../config/router.php');
require(SITE_API_CONFIG);
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$data = array();

if ($name == 'select') {
    $id_account = isset($_POST['id_account']) ? trim($_POST['id_account']) : '';

    $sql_select = "SELECT * FROM t_account WHERE id=$id_account";
    $result_select = mysqli_query($connect, $sql_select) or die("lỗi truy vấn select");
    while ($row = $result_select->fetch_assoc()) {
        $data[count($data)] = $row;
    }
    header('Content-Type: application/json');
    echo (json_encode($data));
    mysqli_close($connect);
}


if ($name == 'insert') {
    $user_name =  isset($_POST['user_name']) ? trim($_POST['user_name']) : '';
    $pass = isset($_POST['pass']) ? trim($_POST['pass']) : '';
    $email = isset($_POST['email']) ?  trim($_POST['email']) : '';
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';
    $inpimg = isset($_POST['inpimg']) ? trim($_POST['inpimg']) : '';

    $sql_Insert_account = "INSERT INTO t_account (user_name, password, email, address, avatar, create_datetime) VALUES ('$user_name', '$pass', '$email','$address','$inpimg', CURRENT_TIMESTAMP())";
    $result_Insert = mysqli_query($connect, $sql_Insert_account) or die("lỗi truy vấn insert");

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
    $info = isset($_POST['info']) ? trim($_POST['info']) : '';

    $sql_Update_device = "UPDATE t_account SET user_name='$devicename', id_category=$idcategory, id_supplier=$idsupplier, img='$inpimg', info='$info', update_datetime=CURRENT_TIMESTAMP() WHERE id=$deviceId";
    $result_Update = mysqli_query($connect, $sql_Update_device) or die("lỗi truy vấn update");

    if (!$result_Update) {
        echo false;
    } else {
        echo true;
    }
    mysqli_close($connect);
}

if ($name == 'upd_admin') {
    $admin_flg = isset($_POST['admin_flg']) ? trim($_POST['admin_flg']) : '';
    $id_account = isset($_POST['id_account']) ? trim($_POST['id_account']) : '';

    $sql_Update_device = "UPDATE t_account SET admin_flg = $admin_flg, update_datetime=CURRENT_TIMESTAMP() WHERE id=$id_account";
    $result_Update = mysqli_query($connect, $sql_Update_device) or die("lỗi truy vấn update");

    mysqli_close($connect);
}


if ($name == 'delete') {
    $id_account = isset($_POST['id_account']) ? trim($_POST['id_account']) : '';

    $sql_delete_device = "UPDATE t_account SET del_flg=1, update_datetime=CURRENT_TIMESTAMP() WHERE id=$id_account";
    $result_Delete = mysqli_query($connect, $sql_delete_device) or die("lỗi truy vấn delete");

    if (!$result_Delete) {
        echo false;
    } else {
        echo true;
    }

    mysqli_close($connect);
}

if ($name == 'check') {
    $user_name = isset($_POST['user_name']) ? trim($_POST['user_name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    $sql_select = "SELECT * FROM t_account WHERE user_name = '$user_name' OR email ='$email'";
    $result_select = mysqli_query($connect, $sql_select) or die("lỗi truy vấn select");

    if ($result_select->num_rows > 0) {
        echo true;
    } else {
        echo false;
    }
    mysqli_close($connect);
}
